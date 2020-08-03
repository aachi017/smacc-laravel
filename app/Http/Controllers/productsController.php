<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use DB;

class productsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	
        $users = DB::table('products')->paginate(7);
        return view('display_products', ['value' => $users]);


      // $table = Products::all()->paginate(10);
     //  return view('display_products',['value'=>$table]);
    }


       public function addItems()
    {
    	
       return view('insert_products');
    }


    public function insertItems(Request $request){

    	//dd($request);
    	//dd($request->post('code'));

      //  echo "hello";




         $products = new Products();

         $products->itemCode = $request->post('code');
         $products->itemName = $request->post('name');
         $products->Qty = $request->post('qty');
         $products->price = $request->post('price');
         $products->storeLocation = $request->post('store');
         $products->save();


        return back();




    }
}
