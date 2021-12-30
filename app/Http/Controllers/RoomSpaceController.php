<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomSpace;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class RoomSpaceController extends Controller
{
    //
    public function create(){
        //
        return view('admin.room_space.create');
    }

    public function post_create(Request $request){
        //
        $validate=Validator::make($request->all(),[
            'name' => 'required',
        ]);
        if( $validate->fails()){
            Alert::warning('');
            return redirect()->back();
        }

        if(RoomSpace::create([
            'rp_name' => $request->name,
        ]))  Alert::success('Create Successfully');
        else Alert::error('Something Went Wrong!');


        return redirect()->back();
    }

    public function update($rp_id){
        //
        $rp=RoomSpace::where('rp_id',$rp_id)->get();

        return view('admin.room_space.update')->with('rp',$rp)->with('rp_id',$rp_id);
    }

    public function post_update(Request $request ,$rp_id){

        $validate=Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if( $validate->fails()){
            Alert::warning('');
            return redirect()->back();
        }

        if(RoomSpace::where('rp_id',$rp_id)->update([
            'rp_name' => $request->name,
        ]))  Alert::success('Update Successfully');
        else Alert::error('Something Went Wrong!');

        return redirect()->back();


    }

    public function list(){
        //

        $rp = RoomSpace::all();

        return view('admin.room_space.list')->with('rp',$rp);
    }

    public function delete($rp_id){
        //

        if( RoomSpace::where('rp_id',$rp_id)->delete()){
            Alert::success('Delete Successfully');
        }else Alert::warning('product does not exist');

        return redirect('dashboard/room_space/list');
    }


}
