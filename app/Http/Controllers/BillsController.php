<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\ImageProduct;
use Illuminate\Http\Request;
use App\Models\RoomSpace;
use App\Models\TypeProduct;
use App\Models\Product;
use App\Models\Province;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Ward;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class BillsController extends Controller
{
    //
    public function checkout(Request $request){
        $prov = Province::find($request->province);
        $dist = District::find($request->district);
        $ward = Ward::find($request->ward);


        $cart = Cart::where('id',Auth::user()->id)->get();
        $c = Cart::where('id',Auth::user()->id)->get();
        $total = 0;
        foreach($c as $c){
            $total += $c->c_price;
        }
        // dd($dist->name);

        // dd($total);
        if( $prov ==null  || $dist == null  || $ward == null ){
            Alert::warning('Vui lòng chọn địa chỉ');
            return redirect()->back();
        }
        $data = [
            'id' =>Auth::user()->id,
            'b_id' => 'ZEN_' . Str::random(10),
            'b_method' => 'COD',
            'b_total' => $total,
            'b_status'=>'Đặt hàng',
            'b_name' => $request->name,
            'b_company' => $request->company,
            'b_email' => Auth::user()->email,
            'b_phone' =>$request->phone,
            'b_address' =>  $prov->name .  ", " . $dist->name .  ", " . $ward->name .  ", " . $request->address
        ];


// dd($data);
        if(Bill::create($data)){

            foreach($cart as $cart){
                $p=Product::find($cart->p_id);

                $bd = [
                    'bd_name' => $p->p_name,
                    'p_id' => $cart->p_id,
                    'bd_img' =>$p->p_img,
                    'bd_quantity' => $cart->c_quantity,
                    'bd_price' => $cart->c_price,
                    'b_id' =>$data['b_id']
                ];
                // dd($bd);
                BillDetail::create($bd);
                Product::where('p_id',$cart->p_id)->update(['p_quantity' => $p->p_quantity - $cart->c_quantity,]);
            }
            Cart::where('id',Auth::user()->id)->delete();
            $details = [


                'content' => 'Your order  has been placed',
                'href' => $data['b_id'],

            ];



            Mail::to(Auth::user()->email)->send(new \App\Mail\Bill($details));
            Alert::success("Đặt hàng thành công!"," Theo dõi Email của bạn đê kiểm tra tình trạng đơn hàng");
            return redirect()->back();
        }
    }

    public function paypal(Request $request){
        $prov = Province::find($request->province);
        $dist = District::find($request->district);
        $ward = Ward::find($request->ward);

        $cart = Cart::where('id',Auth::user()->id)->get();
        $data = [
            'id' =>Auth::user()->id,
            'b_id' => 'ZEN_' . Str::random(10),
            'b_method' => 'PayPal:' . $request->methodID,
            'b_total' => $request->total,
            'b_status'=>'Thanh toán',
            'b_name' => $request->name,
            'b_company' => $request->company,
            'b_email' => Auth::user()->email,
            'b_phone' =>$request->phone,
            'b_address' =>  $prov->name .  ", " . $dist->name .  ", " . $ward->name .  ", " . $request->address
        ];
        if(Bill::create($data)){

            foreach($cart as $cart){
                $p=Product::find($cart->p_id);

                $bd = [
                    'bd_name' => $p->p_name,
                    'p_id' => $cart->p_id,
                    'bd_img' =>$p->p_img,
                    'bd_quantity' => $cart->c_quantity,
                    'bd_price' => $cart->c_price,
                    'b_id' =>$data['b_id']
                ];
                // dd($bd);
                BillDetail::create($bd);
                Product::where('p_id',$cart->p_id)->update(['p_quantity' => $p->p_quantity - $cart->c_quantity,]);
            }
            Cart::where('id',Auth::user()->id)->delete();
            $details = [


                'content' => 'Your order has been placed and paid by Paypal',
                'href' => $data['b_id'],

            ];



            Mail::to(Auth::user()->email)->send(new \App\Mail\Bill($details));
            Alert::success("Đặt hàng thành công!"," Theo dõi Email của bạn đê kiểm tra tình trạng đơn hàng");
        }
    }


    public function list(){
        $b = Bill::all();
        // dd($b);
        return view('admin.bill.list')->with('b',$b);
    }

    public function change_status(Request $request, $b_id){
        $data=[
            'b_status' => $request->status,
        ];
        if($request->status == 'Xử lý'){
            $details = [


                'content' => 'Your order is pending',
                'href' => $b_id,

            ];
        }elseif($request->status == 'Xử lý'){
            $details = [
                'content' => 'Your order is being shipped',
                'href' => $b_id,

            ];
        }elseif($request->status == 'Hoàn thành'){
            $details = [
                'content' => 'Your order is complete',
                'href' => $b_id,

            ];
        }else{
            $details = null;
        }

        Bill::where('b_id',$b_id)->update($data);

        if($details != null){
            Mail::to(Auth::user()->email)->send(new \App\Mail\Bill($details));
        }
        return redirect()->back();
    }

    public function bill_detail($b_id){
        $bd = BillDetail::where('b_id',$b_id)->get();
        $total = 0;
        $bd1 = BillDetail::where('b_id',$b_id)->get();

        foreach($bd1 as $bd1){
            $total += $bd1->bd_price;
        }
        return view('admin.bill.detail')->with('bd',$bd)->with('b_id',$b_id)->with('total',$total);
    }

}
