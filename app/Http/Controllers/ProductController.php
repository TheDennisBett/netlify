<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Products::all();
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'price'=>'required'
        ]);
        return Products::create($request->all());
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Products::find($id);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product=Products::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Products::destroy($id);
        //
    }


    /**
     * Search the specified resource from storage.
     */
    public function search($name)
    {
        return Products::where('name','like','%'. $name.'%')->get();
        //
    }
}
