<?php

namespace App\Http\Controllers;

use App\Events\SaveProductEvent;
use App\Http\Controllers\Controller;
//use http\Client\Curl\User;
use App\Http\Requests\ProductFormRequest;
use App\Models\products;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProductControllerResourse extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $user=User::query()->find(2);
//        $user->delete();
     $data=products::query()->orderBy('id','DESC')->get();
     return $data;
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
        event(new SaveProductEvent(request()->except('images'),
            request()->file('images')));
        DB::commit();
        return redirect()->back()->with('message','product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
