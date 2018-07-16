<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductIngredient;

class ProductIngredientController extends Controller
{
    public function index()
    {
        return view('ingredients.index');
    }

    public function storeIngredients(Request $request)
    {
        $resource = ProductIngredient::create([
            'product_name' => $request->product_name,
            'ingredient' => $request->ingredient
        ]);
    }

    public function getIngredients()
    {
        $data = ProductIngredient::all();

        return response()->json($data);
    }
}
