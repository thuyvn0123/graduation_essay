<?php

namespace App\Http\Controllers;


use App\Models\ImageProduct;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function list(){
        $u = User::all();
        return view('admin.user.list')->with('u',$u);
    }

    public function grant(Request $request,$id){
        $data = [
            'level' => $request->$id
        ];
        if(User::where('id',$id)->update($data)){
            Alert::success('Cấp quyền thành công');
            return redirect()->back();
        }else{
            Alert::error('Có lỗi xảy ra');
            return redirect()->back();
        }

    }
}
