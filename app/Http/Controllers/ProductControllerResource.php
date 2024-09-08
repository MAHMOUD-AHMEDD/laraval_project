<?php

namespace App\Http\Controllers;

use App\Events\SaveProductEvent;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductControllerResource extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $items = Product::query()->first();
//        $items->delete();
//        return $products;
        ////////////////////////////////////
        $products = Product::query()->with('images')->get();
//        dd($products);
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.save');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $request)
    {
        DB::beginTransaction();
        event(new SaveProductEvent(request()->except('images'), request()->file('images')));
        DB::commit();
        return redirect()->back()->with('success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product=Product::query()->where('id','=',$id)->with('images')->get();
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $product=Product::query()->with('images')->find($id);
        if($product==null || $product->user_id != auth()->id() || auth()->user()->type != 'admin' ){
            return redirect()->to('/products');
        }
        return view('products.save')->with('data',$product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFormRequest $request, string $id)
    {
        DB::beginTransaction();
        $product=Product::query()->with('images')->find($id);
        if(sizeof($product->images)==0&&\request()->hasFile('images')==false){
            return redirect()->back()->withErrors(['error'=>'You should upload one photo at least']);
        }
        $basic_data=request()->except('images');
        $basic_data['id']=$id;
        $basic_data['user_id']=$product->user_id;
        event(new SaveProductEvent($basic_data,
            request()->file('images')??[],false));
        DB::commit();
        return redirect()->back()->with('message','product created successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
