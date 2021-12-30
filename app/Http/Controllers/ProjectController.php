<?php

namespace App\Http\Controllers;

use App\Models\ImageProject;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    //
    public function create(){
        return view('admin.project.create');
    }

    public function post_create(Request $request){
        $validate=Validator::make($request->all(),[
            'file' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        if( $validate->fails()){
            Alert::warning('Please choose image thumbnail');
            return redirect()
            ->back();
        }
        $data=[
            'pr_title' => $request->title,
            'pr_location' => $request->location,
            'pr_brand' => $request->brand,
            'pr_style' => $request->style,
            'pr_desc' => $request->desc,
        ];
        $getImg=$request->file('file');

        if($getImg){
            $newImg = 'usr_'.  Auth::user()->id . '_' . Str::random(10) .'.'.$getImg->getClientOriginalExtension();
            $getImg->move(storage_path('app/public/project'),$newImg);
            $data['pr_thumbnail']= $newImg;
            if(Project::create($data)){
                Alert::success('Create Successfully!');
                $re = Project::latest('pr_id')->first('pr_id');
                return redirect('/dashboard/project/images/'.$re->pr_id);

            }
        }
    }
    public function images($pr_id){
        $ipr=ImageProject::where('pr_id',$pr_id)->get();
        $pr=Project::where('pr_id',$pr_id)->get();

        return view('admin.project.images')->with('pr_id',$pr_id)->with('ipr',$ipr)->with('pr',$pr);
    }


    public function post_images(Request $request,$pr_id){

        $get_img=$request->file('image');
        $data=[
            'pr_id' => $pr_id,
        ];

        foreach((array)$get_img as $key => $value){
            $newImg = 'usr_'.  Auth::user()->id . '_' . Str::random(10) .'.'.$value->getClientOriginalExtension();
            $value->move(storage_path('app/public/project'),$newImg);
            $data['ipr_img'] = $newImg;
            ImageProject::create($data);
        }

        return redirect()->back();
    }
    public function delete_img($ipr_id){
        //
        if( ImageProject::where('ipr_id',$ipr_id)->delete()){
            Alert::success('Delete Successfully');
        }else Alert::warning('Image does not exist');

        return back();
    }

    public function list(){
        //

        $pr = Project::all();

        return view('admin.project.list')->with('pr',$pr);
    }


    public function update($pr_id){
        //
        $pr=Project::where('pr_id',$pr_id)->get();

        return view('admin.project.update')->with('pr',$pr);
    }

    public function post_update(Request $request, $pr_id){
        $validate=Validator::make($request->all(),[
            'file' => 'image|mimes:jpeg,png,jpg'
        ]);
        if( $validate->fails()){
            Alert::warning('Plese choose image');
            return redirect()
            ->back();
        }
        $data=[
            'pr_title' => $request->title,
            'pr_location' => $request->location,
            'pr_brand' => $request->brand,
            'pr_style' => $request->style,
            'pr_desc' => $request->desc,
        ];
        $getImg=$request->file('file');

        if($getImg){
            $newImg = 'usr_'.  Auth::user()->id . '_' . Str::random(10) .'.'.$getImg->getClientOriginalExtension();
            $getImg->move(storage_path('app/public/project'),$newImg);
            $data['pr_thumbnail']= $newImg;
            if(Project::where('pr_id',$pr_id)->update($data)){
                Alert::success('Update Successfully!');
                return redirect()->back();

            }
        }
        else{
            if(Project::where('pr_id',$pr_id)->update($data)){
                Alert::success('Update Successfully!');
                return redirect()->back();
            }
        }
    }

    public function delete($pr_id){
        //

        if( Project::where('pr_id',$pr_id)->delete()){
            Alert::success('Delete Successfully');
        }else Alert::warning('This news does not exist');

        return redirect()->back();
    }
}
