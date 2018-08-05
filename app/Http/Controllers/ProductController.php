<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->preview;
        $destinationPath = public_path().'/uploads/';
        $fileName = $file->getClientOriginalName();
        $file->move($destinationPath, $fileName);

        $sluggedName = $request->product_name . " " . $request->product_size;
        
        Product::create([
            'slug' => str_slug($sluggedName, '-'),
            'product_name' => $request->product_name,
            'preview_url' => 'uploads/'.$fileName,
            'product_size' => $request->product_size,
            'product_description' => $request->product_desc,
            // 'preview_url' => $preview_url
        ]);
        return 'berhasil';
        return response()->json($productLists);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $slug)
    {
        $data = Product::where('slug', '=', $slug)
            ->with('ingredient')
            ->first();
        // return $data;
        return view('admin.product.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $resource = Product::findOrFail($product);
        
        return $resource;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->product_name = $request->product_name;
        $product->save();

        return response('Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $resource = Product::findOrFail($product);
        $resource->destroy();

        return response('Product has been deleted!');
    }
}
