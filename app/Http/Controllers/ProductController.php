<?php

namespace App\Http\Controllers;

use App\Models\ImageProduct;
use Illuminate\Http\Request;
use App\Models\RoomSpace;
use App\Models\TypeProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    public function get_type(Request $request){

        $data=$request->all();
        if($data['action']){
            $output='';
            if ($data['action']=='rp') {
                $get_tp = TypeProduct::where('rp_id',$data['id'])->get();
                foreach ($get_tp as $tp) {
                    $output='<option value="'.$tp->tp_id.'">'.$tp->tp_name.'</option>';
                    echo $output;
                }
            }

        }


    }

    public function create(){
        $rp=RoomSpace::all();

        return view('admin.product.create')->with('rp',$rp);
    }

    public function post_create(Request $request){
        //

        $validate1=Validator::make($request->all(),[
            'quanttity' => 'integer:11',
            'price' => 'integer:11',
        ]);
        $validate2=Validator::make($request->all(),[
            'rp' => 'required ',
            'tp' => 'required ',
        ]);
        if( $validate1->fails()){
            Alert::warning('Please input integer to Quantity and Price');
            return redirect()
            ->back();
        }
        if( $validate2->fails()){
            Alert::warning('Please choose Room Space and Type Product!');
            return redirect()
            ->back();
        }
        $data=[
            'p_name' => $request->name,
            'rp_id' => $request->rp,
            'tp_id' => $request->tp,
            'p_price' => $request->price,
            'p_quantity' => $request->quantity,
            'p_desc' => $request->desc,
            'p_size' => $request->size,
            'p_collection' => $request->collection,

        ];
        $validate3=Validator::make($request->all(),[
            'file' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        if( $validate3->fails()){
            Alert::warning('Please choose jpeg,png,jpg file');
            return redirect()
            ->back();
        }
        $getImg=$request->file('file');

        if($getImg){
            $newImg = 'usr_'.  Auth::user()->id . '_' . Str::random(10) .'.'.$getImg->getClientOriginalExtension();
            $getImg->move(storage_path('app/public/product'),$newImg);
            $data['p_img']= $newImg;
            if(Product::create($data)){
                Alert::success('Create Successfully!');
                $re = Product::latest('p_id')->first('p_id');
                return redirect('/dashboard/product/images/'.$re->p_id);
            }
        }
    }

    public function list(){
        //

        $p = Product::join('room_space','products.rp_id', '=','room_space.rp_id')
                            ->join('type_products', 'type_products.tp_id', '=', 'products.tp_id')->get();
        return view('admin.product.list')->with('p',$p);
    }


    public function update($p_id){
        //
        $p=Product::where('p_id',$p_id)->get();
        $rp=RoomSpace::all();


        return view('admin.product.update')->with('p',$p)->with('p_id',$p_id)->with('rp',$rp);
    }

    public function post_update(Request $request, $p_id){
        //

        $validate1=Validator::make($request->all(),[
            'quanttity' => 'integer:11',
            'price' => 'integer:11',
        ]);
        $validate2=Validator::make($request->all(),[
            'rp' => 'required ',
            'tp' => 'required ',
        ]);
        if( $validate1->fails()){
            Alert::warning('Please input integer to Quantity and Price');
            return redirect()
            ->back();
        }
        if( $validate2->fails()){
            Alert::warning('Please choose Room Space and Type Product!');
            return redirect()
            ->back();
        }
        $data=[
            'p_name' => $request->name,
            'rp_id' => $request->rp,
            'tp_id' => $request->tp,
            'p_price' => $request->price,
            'p_quantity' => $request->quantity,
            'p_desc' => $request->desc,
            'p_size' => $request->size,
            'p_collection' => $request->collection,

        ];
        $validate3=Validator::make($request->all(),[
            'file' => 'image|mimes:jpeg,png,jpg'
        ]);
        if( $validate3->fails()){
            Alert::warning('Please choose jpeg,png,jpg file');
            return redirect()
            ->back();
        }
        $getImg=$request->file('file');

        if($getImg){
            $newImg = 'usr_'.  Auth::user()->id . '_' . Str::random(10) .'.'.$getImg->getClientOriginalExtension();
            $getImg->move(storage_path('app/public/product'),$newImg);
            $data['p_img']= $newImg;
            if(Product::where('p_id',$p_id)->update($data)){
                Alert::success('Update Successfully!');
                return redirect()->back();

            }
        }else{
            if(Product::where('p_id',$p_id)->update($data)){
                Alert::success('Update Successfully!');
                return redirect()->back();

            }
        }
    }

    public function images($p_id){
        $ip=ImageProduct::where('p_id',$p_id)->get();
        $p=Product::where('p_id',$p_id)->get();

        return view('admin.product.images')->with('p_id',$p_id)->with('ip',$ip)->with('p',$p);
    }


    public function post_images(Request $request,$p_id){

        $get_img=$request->file('image');
        $data=[
            'p_id' => $p_id,
        ];

        foreach((array)$get_img as $key => $value){
            $newImg = 'usr_'.  Auth::user()->id . '_' . Str::random(10) .'.'.$value->getClientOriginalExtension();
            $value->move(storage_path('app/public/product'),$newImg);
            $data['ip_img'] = $newImg;
            ImageProduct::create($data);
        }

        return redirect()->back();
    }
    public function delete_img($ip_id){
        //
        if( ImageProduct::where('ip_id',$ip_id)->delete()){
            Alert::success('Delete Successfully');
        }else Alert::warning('Image does not exist');

        return back();
    }
    public function delete($p_id){
        //
        if( Product::find($p_id)->delete()){
            Alert::success('Delete Successfully');
        }else Alert::warning('product does not exist');

        return redirect('dashboard/product/list');
    }


}
