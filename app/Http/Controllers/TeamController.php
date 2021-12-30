<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    //
    public function list(){
        //

        $t = Team::all();

        return view('admin.team.list')->with('t',$t);
    }

    public function create(){
        //
        return view('admin.team.create');
    }

    public function post_create(Request $request){
        //
        $validate=Validator::make($request->all(),[
            'file' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        if( $validate->fails()){
            Alert::warning('Choose Avatar');
            return redirect()->back();
        }
        $data = [
            't_name' =>$request->name,
            't_info' =>$request->info
        ];

        $getImg=$request->file('file');

        if($getImg){
            $newImg = 'usr_'.  Auth::user()->id . '_' . Str::random(10) .'.'.$getImg->getClientOriginalExtension();
            $getImg->move(storage_path('app/public/team'),$newImg);
            $data['t_avt']= $newImg;
            if(Team::create($data)){
                Alert::success('Create Successfully!');
                return redirect()->back();

            }
        }
    }
    public function update($t_id){
        //
        $t=Team::where('t_id',$t_id)->get();


        return view('admin.team.update')->with('t',$t);
    }

    public function post_update(Request $request,$t_id){
        //
        $validate=Validator::make($request->all(),[
            'file' => 'image|mimes:jpeg,png,jpg'
        ]);
        if( $validate->fails()){
            Alert::warning('Choose Avatar');
            return redirect()->back();
        }
        $data = [
            't_name' =>$request->name,
            't_info' =>$request->info
        ];

        $getImg=$request->file('file');

        if($getImg){
            $newImg = 'usr_'.  Auth::user()->id . '_' . Str::random(10) .'.'.$getImg->getClientOriginalExtension();
            $getImg->move(storage_path('app/public/team'),$newImg);
            $data['t_avt']= $newImg;
            if(Team::where('t_id',$t_id)->update($data)){
                Alert::success('Update Successfully!');
                return redirect()->back();

            }
        }else{
            if(Team::where('t_id',$t_id)->update($data)){
                Alert::success('Update Successfully!');
                return redirect()->back();

            }
        }
    }

    public function delete($t_id){
        //

        if( Team::where('t_id',$t_id)->delete()){
            Alert::success('Delete Successfully');
        }else Alert::warning(' does not exist');

        return redirect()->back();
    }

}
