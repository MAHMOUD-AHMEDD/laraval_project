<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\products;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class ordersController extends Controller
{
    public function index($id)
    {
//
    }
    public function add($product_id)
    {
        $product=products::query()->where('id','=',$product_id)->get();
//        dd($product);
        $order= orders::query()->create([
            'product_id'=>$product_id,
            'user_id'=>auth()->id(),
            'quantity'=>'1',
            'price'=>$product[0]['price'],
        ]);
//        dd(auth()->user()['id']);
        return redirect()->back()->with('success','item has been added to the cart successfully');
//        redirect()->back()->with('success','product has been added to cart successfully');
    }
    public function show($id)
    {
        $orders=DB::table('orders')->where('orders.user_id','=',auth()->user()['id'])
            ->join('products','orders.product_id','=','products.id')
            ->select('orders.*', 'products.*')
            ->get();
//        $product=Product::query()->with('images')->find($product_id);
//        dd ($orders);
        return view('orders',compact('orders'));
    }
}
