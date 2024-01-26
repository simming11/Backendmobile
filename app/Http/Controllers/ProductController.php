<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = ['name' => 'index', 'payload' => Product::all()];
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create([
            "product_name" => $request ->pd_name,
            "product_type" => $request ->pd_type,
            "price" => $request ->pd_price,
        ]);
        
        return "Insert successfully.";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payload = Product::find($id);
        return ['name' => 'show', 'payload' => $payload];
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
        //
        $product = Product::findOrFail($id);

        // Update the desired field
        $product->product_name = $request-> pd_name ; // Replace 'column_name' with the actual column name in your table
    
        // Save the changes to the database
        $product->save();
        return "update successful.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product -> delete();
        return "delete sucessful";
    }
}
