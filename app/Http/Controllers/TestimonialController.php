<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    //
    public function list(){
        //

        $tt = Testimonial::all();

        return view('admin.testimonial.list')->with('tt',$tt);
    }

    public function create(){
        //
        return view('admin.testimonial.create');
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
            'tt_name' =>$request->name,
            'tt_comment' =>$request->comment
        ];

        $getImg=$request->file('file');

        if($getImg){
            $newImg = 'usr_'.  Auth::user()->id . '_' . Str::random(10) .'.'.$getImg->getClientOriginalExtension();
            $getImg->move(storage_path('app/public/testimonial'),$newImg);
            $data['tt_avt']= $newImg;
            if(Testimonial::create($data)){
                Alert::success('Create Successfully!');
                return redirect()->back();

            }
        }
    }
    public function update($tt_id){
        //
        $tt=Testimonial::where('tt_id',$tt_id)->get();


        return view('admin.testimonial.update')->with('tt',$tt);
    }

    public function post_update(Request $request,$tt_id){
        //
        $validate=Validator::make($request->all(),[
            'file' => 'image|mimes:jpeg,png,jpg'
        ]);
        if( $validate->fails()){
            Alert::warning('Choose Avatar');
            return redirect()->back();
        }
        $data = [
            'tt_name' =>$request->name,
            'tt_comment' =>$request->comment
        ];

        $getImg=$request->file('file');

        if($getImg){
            $newImg = 'usr_'.  Auth::user()->id . '_' . Str::random(10) .'.'.$getImg->getClientOriginalExtension();
            $getImg->move(storage_path('app/public/testimonial'),$newImg);
            $data['tt_avt']= $newImg;
            if(Testimonial::where('tt_id',$tt_id)->update($data)){
                Alert::success('Update Successfully!');
                return redirect()->back();

            }
        }else{
            if(Testimonial::where('tt_id',$tt_id)->update($data)){
                Alert::success('Update Successfully!');
                return redirect()->back();

            }
        }
    }

    public function delete($tt_id){
        //

        if( Testimonial::where('tt_id',$tt_id)->delete()){
            Alert::success('Delete Successfully');
        }else Alert::warning(' does not exist');

        return redirect()->back();
    }

}
