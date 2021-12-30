<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Product;
use App\Models\RoomSpace;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\TypeProduct;
use App\Models\ImageProduct;
use App\Models\ImageProject;
use App\Models\News;
use App\ProductSimilarity;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Botchat;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\Immutable;
use PhpParser\Node\Expr\FuncCall;

class ShowDataController extends Controller
{
    //
    public function index(){
        $pr = Project::all() ->sortByDesc('pr_id')->take(6);
        $p = Product::all()->sortByDesc('p_id')->take(12);
        $tt = Testimonial::all();

        return view('index')->with('pr',$pr)->with('p',$p)->with('tt',$tt);

    }
    public function about(){

        $t = Team::all();

        return view('about')->with('t',$t);
    }
    public function product(){
        $rp = RoomSpace::all();
        $p = Product::all()->sortByDesc('p_id');
        return view('products')->with('p',$p)->with('rp',$rp);
    }
    public function product_rp($rp_id){
        $rp = RoomSpace::all();
        $tp = TypeProduct::where('rp_id',$rp_id)->get();
        $p = Product::all()->where('rp_id',$rp_id)->sortByDesc('p_id');
        return view('products',compact('rp', 'p' , 'tp'));
    }

    public function get_product(Request $request,$rp_id){

        $data=$request->all();



        $p = Product::all()->where('tp_id',$data['id'])->sortByDesc('p_id');


        foreach($p as $p){
            echo '
            <a href="/products/detail/'.$p->p_id.'">
            <div  class="flipper col-md-4">
                <img src="/storage/product/'. $p->p_img.'" alt="" class="thumbnail " >
                <div class="featured-products-title">
                    <p>'.$p->p_name.'</p>
                </div>
                <div class="featured-products-title">
                    <b><p>'. number_format($p->p_price,0,',','.').'<span>đ</span></p></b>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="/buy-now/'.$p->p_id.'"><button class="btn btn-primary mx-2" style="width:7rem;margin-top:0rem;">Mua Ngay</button></a>
                    <a href="/add-to-cart/'.$p->p_id.'"><button class="btn btn-foreign mx-2" style="width:10rem;margin-top:0rem;">Thêm Giỏ Hàng</button></a>
                </div>

            </div>
            </a>';

        }

    }

    public function product_detail($p_id){
        $p = Product::where('p_id',$p_id)->get();
        $img = ImageProduct::all()->where('p_id',$p_id);
        $i_sl = ImageProduct::all()->where('p_id',$p_id);

        $p1  = Product::get()->toJson(JSON_PRETTY_PRINT);

        // $products        = json_decode(file_get_contents(storage_path('data/products-data.json')));
        $products       = json_decode($p1);

        $selectedId      = $p_id;

        // $selectedProduct = $products[0];
        $selectedProduct  = Product::where('p_id',$p_id)->first()->toArray();
        // dd($selectedProduct);

        $selectedProducts = array_filter($products, function ($product) use ($selectedId) {
            return $product->p_id === $selectedId;
        });

        if (count($selectedProducts)) {

            $selectedProduct = $selectedProducts[array_keys($selectedProducts)[0]];

        }



        $productSimilarity = new ProductSimilarity($products);

        $similarityMatrix  = $productSimilarity->calculateSimilarityMatrix();

        $products          = $productSimilarity->getProductsSortedBySimularity($selectedId, $similarityMatrix);

        return view('product',compact('selectedId', 'selectedProduct', 'products','p','img','i_sl'));
    }



    public function Recomment($p_id) {
        $p  = Product::get()->toJson(JSON_PRETTY_PRINT);

        // $products        = json_decode(file_get_contents(storage_path('data/products-data.json')));
        $products       = json_decode($p);

        $selectedId      = $p_id;

        // $selectedProduct = $products[0];
        $selectedProduct  = Product::where('p_id',$p_id)->first()->toArray();
        // dd($selectedProduct);

        $selectedProducts = array_filter($products, function ($product) use ($selectedId) {
            return $product->p_id === $selectedId;
        });

        if (count($selectedProducts)) {

            $selectedProduct = $selectedProducts[array_keys($selectedProducts)[0]];

        }



        $productSimilarity = new ProductSimilarity($products);

        $similarityMatrix  = $productSimilarity->calculateSimilarityMatrix();

        $products          = $productSimilarity->getProductsSortedBySimularity($selectedId, $similarityMatrix);



        return view('product', compact('selectedId', 'selectedProduct', 'products'));
    }

    public function projects(){

        $pr = Project::all()->sortByDesc('pr_id');
        return view('projects',compact('pr'));
    }

    public function project_detail($pr_id){

        $pr = Project::where('pr_id',$pr_id)->get();
        $ipr = ImageProject::all()->where('pr_id',$pr_id);


        return view('project',compact('pr','ipr'));
    }

    public function news(){

        $n = News::all()->sortByDesc('n_id');
        return view('news',compact('n'));
    }

    public function news_detail($n_id){

        $n = News::where('n_id',$n_id)->get();

        return view('news_d',compact('n'));
    }

    public function cart(){
        $prov=Province::orderby('matp','desc')->get();
        $c1 = Cart::where('id',Auth::user()->id)
        ->join('products','products.p_id', '=','carts.p_id')->get();
        $c = Cart::where('id',Auth::user()->id)
        ->join('products','products.p_id', '=','carts.p_id')->get();

        foreach($c1 as $c1){
            if ($c1->p_quantity == 0 ){
                Cart::where('p_id',$c1->p_id)->delete();
            }
        }

        return view('cart',compact('c','prov'));

    }

    public function add_qt(Request $request,$c_id){
        // dd($request->all());
        $c = Cart::where('c_id',$c_id)->first();
        $p = Product::where('p_id',$c->p_id)->first();
        if($c->c_quantity < $p->p_quantity){
            Cart::where('c_id',$c_id)->update(['c_quantity' => ($request->id + 1) , 'c_price' => $request->price + $p->p_price]);
            $c_qty = Cart::where('c_id',$c_id)->get();
            // dd($c_qty);
            foreach($c_qty as $c_qty){
                echo $c_qty->c_quantity;
                echo '<input type="hidden" class="id" value="'.$c_qty->c_quantity.'">';
                echo '<input type="hidden" class="fullprice" value="'.$c_qty->c_price.'">';

            }
        }else{
            echo $request->id;
            echo '<input type="hidden" class="id" value="'.$request->id.'">';
            echo '<input type="hidden" class="fullprice" value="'.$request->price.'">';
        }

    }

    public function minus_qt(Request $request,$c_id){
        $c = Cart::where('c_id',$c_id)->first();
        $p = Product::where('p_id',$c->p_id)->first();
        if($c->c_quantity >1){
            Cart::where('c_id',$c_id)->update(['c_quantity' => ($request->id - 1) , 'c_price' => $request->price - $p->p_price]);
            $c_qty = Cart::where('c_id',$c_id)->get();
            // dd($c_qty);
            foreach($c_qty as $c_qty){
                echo $c_qty->c_quantity;
                echo '<input type="hidden" class="id" value="'.$c_qty->c_quantity.'">';
                echo '<input type="hidden" class="fullprice" value="'.$c_qty->c_price.'">';

            }
        }else{
            echo $request->id;
            echo '<input type="hidden" class="id" value="'.$request->id.'">';
            echo '<input type="hidden" class="fullprice" value="'.$request->price.'">';
        }


    }

    public function change(Request $request){
        // dd($request->all());
        $c = Cart::where('id',$request->id)->get();
        $total = 0;
        foreach($c as $c){
            $total += $c->c_price;
        }

        response($total) ;

    }
    // public function tax(Request $request){
    //     // dd($request->all());
    //     $c = Cart::where('id',$request->id)->get();
    //     $total = 0;
    //     foreach($c as $c){
    //         $total += $c->c_price;
    //     }

    //     echo $total/100;

    // }
    public function total(Request $request){
        // dd($request->all());
        // $c = Cart::where('id',$request->id)->get();
        // $total = 0;
        // foreach($c as $c){
        //     $total += $c->c_price;
        // }

        // return $total ;

    }

    public function remove(Request $request){
        Cart::where('c_id',$request->id)->delete();
    }

    public function live_search(Request $request){


        if ($request->ajax()) {
                $p_l = Product::where('p_name', 'LIKE', '%' . $request->search . '%')->get();

                $pr_l = Project::where('pr_title', 'LIKE', '%' . $request->search . '%')->get();

                $n_l = News::where('n_title', 'LIKE', '%' . $request->search . '%')->get();
                if($request->search != null){
                    echo '
                    <div class="col-4" >
                        <h4>Sản Phẩm</h4>';
                        if ($p_l) {
                            foreach ($p_l as  $p_l) {
                                echo '<li><a href="/products/detail/'.$p_l->p_id . '" style="color:white">' .$p_l->p_name. '</a></li>';
                            }
                        }
                    echo '</div>';
                    echo '
                    <div class="col-4" >
                        <h4>Tin Tức</h4>';
                        if ($n_l) {
                            foreach ($n_l as  $n_l) {
                                echo '<li><a href="/news/detail/'.$n_l->n_id . '" style="color:white">' .$n_l->n_title. '</a></li>';
                            }
                        }
                    echo '</div>';
                    echo '
                    <div class="col-4" >
                        <h4>Dự Án</h4>';
                        if ($pr_l) {
                            foreach ($pr_l as  $pr_l) {
                                echo '<li><a href="/projects/detail/'.$pr_l->pr_id . '" style="color:white">' .$pr_l->pr_title. '</a></li>';
                            }
                        }
                    echo '</div>';

                }


        }
    }

    public function get_address(Request $request){

        $data=$request->all();
        if($data['action']){
            $output='';
            if ($data['action']=='province') {
                $get_district = District::where('matp',$data['id'])->get();
                echo '<option>--Quận/Huyện--</option>';
                foreach ($get_district as $district) {
                    $output='<option value="'.$district->maqh.'">'.$district->name.'</option>';
                    echo $output;
                }
            }
            if ($data['action']=='district') {
                $get_ward = Ward::where('maqh',$data['id'])->get();
                echo '<option>--Xã/Phường--</option>';
                foreach ($get_ward as $ward) {
                    $output =  '<option value="'.$ward->xaid.'">'.$ward->name.'</option>';
                    echo $output;
                }
            }
        }


    }

    public function search(Request $request){
        $p = Product::where('p_name', 'LIKE', '%' . $request->search . '%')->get();

        $pr = Project::where('pr_title', 'LIKE', '%' . $request->search . '%')->get();

        $n = News::where('n_title', 'LIKE', '%' . $request->search . '%')->get();
        $count = $pr->count() + $p->count() + $n->count();

        $key = $request->search;
        return view('search',compact('p','pr','n','key','count'));
    }

    public function history(){
        $b = Bill::where('id',Auth::user()->id)->get();
        return view("profile.history",compact('b'));
    }

    public function history_detail($b_id){
        $bd = BillDetail::where('b_id',$b_id)->get();
        $total = 0;
        $bd1 = BillDetail::where('b_id',$b_id)->get();

        foreach($bd1 as $bd1){
            $total += $bd1->bd_price;
        }
        return view('profile.detail')->with('bd',$bd)->with('b_id',$b_id)->with('total',$total);
    }

    public function adminhome()
    {
        $data = Bill::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

        return view('admin.dashboard',compact('data'));
    }

    public function consultation(Request $request, $bot_id){
        $data=[
            'status' => $request->status,
        ];


        Botchat::where('bot_id',$bot_id)->update($data);

        return redirect()->back();
    }


}
