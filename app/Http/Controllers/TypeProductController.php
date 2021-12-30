<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomSpace;
use App\Models\TypeProduct;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class TypeProductController extends Controller
{
    //
    public function create(){
        $rp=RoomSpace::all();

        return view('admin.type_product.create')->with('rp',$rp);
    }

    public function post_create(Request $request){
        //
        $validate=Validator::make($request->all(),[
            'name' => 'required',
            'rp' => 'required'
        ]);
        if( $validate->fails()){
            Alert::warning('Please choose room space!');
            return redirect()->back();
        }

        if(TypeProduct::create([
            'tp_name' => $request->name,
            'rp_id' => $request->rp,
        ]))  Alert::success('Create Successfully');
        else Alert::error('Something Went Wrong!');


        return redirect()->back();
    }



    public function update($tp_id){
        $rp=RoomSpace::all();

        $tp=TypeProduct::where('tp_id',$tp_id)->get();

        return view('admin.type_product.update')->with('rp',$rp)->with('tp_id',$tp_id)->with('tp',$tp);
    }

    public function post_update(Request $request ,$tp_id){

        $validate=Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if( $validate->fails()){
            Alert::warning('');
            return redirect()->back();
        }

        if(TypeProduct::where('tp_id',$tp_id)->update([
            'tp_name' => $request->name,
            'rp_id' => $request->rp,
        ]))  Alert::success('Update Successfully');
        else Alert::error('Something Went Wrong!');

        return redirect()->back();


    }


    public function list(){
        //

        $tp = TypeProduct::join('room_space', 'type_products.rp_id', '=', 'room_space.rp_id')->get();
        return view('admin.type_product.list')->with('tp',$tp);
    }

    public function delete($tp_id){
        //

        if( TypeProduct::where('tp_id',$tp_id)->delete()){
            Alert::success('Delete Successfully');
        }else Alert::warning(' does not exist');

        return redirect()->back();
    }
}
