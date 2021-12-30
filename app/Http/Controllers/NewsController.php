<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
class NewsController extends Controller
{
    //
    public function create(){
        return view('admin.news.create');
    }
    public function post_create(Request $request){
        $validate=Validator::make($request->all(),[
            'file' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        if( $validate->fails()){
            Alert::warning('Please input integer to Quantity and Price');
            return redirect()
            ->back();
        }
        $data=[
            'n_title' => $request->title,
            'n_desc' => $request->desc,
            'n_content' => $request->content,
            'n_author' => $request->author,

        ];
        $getImg=$request->file('file');

        if($getImg){
            $newImg = 'usr_'.  Auth::user()->id . '_' . Str::random(10) .'.'.$getImg->getClientOriginalExtension();
            $getImg->move(storage_path('app/public/news'),$newImg);
            $data['n_thumbnail']= $newImg;
            if(News::create($data)){
                Alert::success('Create Successfully!');
                return redirect()->back();

            }
        }
    }
    public function list(){
        //

        $n = News::all();

        return view('admin.news.list')->with('n',$n);
    }


    public function update($n_id){
        //
        $n=News::where('n_id',$n_id)->get();

        return view('admin.news.update')->with('n',$n);
    }

    public function post_update(Request $request, $n_id){
        $validate=Validator::make($request->all(),[
            'file' => 'image|mimes:jpeg,png,jpg'
        ]);
        if( $validate->fails()){
            Alert::warning('Please input integer to Quantity and Price');
            return redirect()
            ->back();
        }
        $data=[
            'n_title' => $request->title,
            'n_desc' => $request->desc,
            'n_content' => $request->content,
            'n_author' =>$request->author
        ];
        $getImg=$request->file('file');

        if($getImg){
            $newImg = 'usr_'.  Auth::user()->id . '_' . Str::random(10) .'.'.$getImg->getClientOriginalExtension();
            $getImg->move(storage_path('app/public/news'),$newImg);
            $data['n_thumbnail']= $newImg;
            if(News::where('n_id',$n_id)->update($data)){
                Alert::success('Update Successfully!');
                return redirect()->back();

            }
        }
        else{
            if(News::where('n_id',$n_id)->update($data)){
                Alert::success('Update Successfully!');
                return redirect()->back();
            }
        }
    }

    public function delete($n_id){
        //

        if( News::where('n_id',$n_id)->delete()){
            Alert::success('Delete Successfully');
        }else Alert::warning('This news does not exist');

        return redirect()->back();
    }

}
