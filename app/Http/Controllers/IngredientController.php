<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.ingredients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        foreach ($request->ingredients as $requested) {
            $data[] = [
                'users_id' => Auth::user()->id,
                'product_name' => $request->product_names,
                'ingredient' => $request->ingredients,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('ingredients')->insert($data);

        $newly_added = Ingredient::where('date', '=', $data[0]['date'])
            ->where('created_at', '=', $data[0]['created_at'])
            ->with(['product', 'user'])
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($newly_added);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        $data = $ingredient->groupBy('product_id')
            ->OrderBy('id', 'desc')
            ->with('product')
            ->get();

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        $data = Ingredient::findOrFail($ingredient);

        return view('ingredient.update', compact('data', $data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $data = Ingredient::findOrFail($ingredient);
        $data->product_id = $request->product_id;
        $data->ingredient = $request->ingredient;
        $data->save();

        return response('Ingredient has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        $data = Ingredient::findOrFail($ingredient);
        $data->delete();

        return response('Ingredient has been deleted!');
    }
}
