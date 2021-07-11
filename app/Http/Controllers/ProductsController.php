<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Product::destroy($id);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  str  $query
     * @return \Illuminate\Http\Response
     */
    public function search($query)
    {
        return Product::where('name', 'like', '%'.$query.'%')->orWhere('description', 'like', '%'.$query.'%')->orWhere('price', 'like', '%'.$query.'%')->get();
    }

    //  /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  str  $query
    //  * @return \Illuminate\Http\Response
    //  */
    // public function search($query)
    // {
    //     return Product::where("name","=",$query)->get();//->orWhere('description', 'like', '%'.$query.'%')->orWhere('price', 'like', '%'.$query.'%')->get();
    // }
}