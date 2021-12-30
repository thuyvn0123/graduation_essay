<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageProduct;
use App\Models\RoomSpace;
use App\Models\TypeProduct;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    //
    public function add_to_cart($p_id){
        $p=Product::where('p_id',$p_id)->first();
        $c=Cart::where('p_id',$p_id)->where('id',Auth::user()->id)->get()->toArray();
        $data = [
            'p_id' => $p_id,
            'id' => Auth::user()->id,
            'c_price' => $p->p_price
        ];

        if($p->p_quantity=='0'){
            Alert::warning('Sản phẩm đã hết, Liên hệ ShowRoom để đặt hàng');
            return redirect()->back();
        }else{
            if($c != null){
                Alert::warning('Sản phẩm đã có trong giỏ hàng của bạn');
                return redirect()->back();
            }
            elseif(Cart::create($data)){
                Alert::success('Thêm vào giỏ hàng thành công!!');
                return redirect()->back();
            }
        }

    }
    public function buy_now($p_id){
        $p=Product::where('p_id',$p_id)->first();
        $c=Cart::where('p_id',$p_id)->where('id',Auth::user()->id)->get()->toArray();
        // dd($c);

        $data = [
            'p_id' => $p_id,
            'id' => Auth::user()->id,
            'c_price' => $p->p_price

        ];

        if($p->p_quantity=='0'){
            Alert::warning('Sản phẩm đã hết, Liên hệ ShowRoom để đặt hàng');
            return redirect()->back();
        }else{
            if($c != null){
                Cart::where('p_id',$p_id)->where('id',Auth::user()->id)->update(['c_quantity' => ($c[0]['c_quantity'] + 1),'c_price' =>  $p->p_price * ($c[0]['c_quantity'] + 1),]);
                return redirect('/cart');
            }
            elseif(Cart::create($data)){
                // Alert::success('Thêm vào giỏ hàng thành công!!');
                return redirect('/cart');
            }
        }



    }
}
