<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductRegister;

class ProductRegisterController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function getProduct()
    {
        $data = ProductRegister::all();

        return response()->json($data);
    }

    public function submitProduct(Request $request)
    {
        // Validate input
        $validation = $this->validate([
            'product_name' => 'string|unique'
        ]);

        if ($validation) // if validation pass, save data to database
        {
            $productLists = [];
            foreach ($request->product as $requested)
            {
                $productLists[] = ProductRegister::create([
                    'product_name' => $requested['product_name'],
                ]);
            }
            return response()->json($productLists);
        }
        return response('Data tidak dapat diproses!');
    }

    public function editProduct(Request $request, ProductRegister $id)
    {
        $resource = ProductRegister::find($id);
        $resource->product_name = $request->product_name;

        if ($resource->save())
        {
            return response('Data berhasil diedit!');
        }
        return response('Ada yang salah!');
    }
}
