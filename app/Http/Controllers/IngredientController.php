<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DB;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ingredient.index');
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
        foreach ($request->inputs as $requested) {
            $data[] = [
                'product_id' => $request->product_id,
                'ingredient_name' => $requested['ingredient_name'],
                'quantity' => $requested['quantity'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('ingredients')->insert($data);

        $newly_added = Ingredient::where('product_id', '=', $data[0]['product_id'])
            ->where('created_at', '=', $data[0]['created_at'])
            ->with('product')
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
        $data = $ingredient->OrderBy('id', 'desc')
            ->with('product')
            ->get();

        return $data;
    }

    /**
     * Display paginated resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function showPaginated(Ingredient $ingredient)
    {
        $data = $ingredient->OrderBy('id', 'desc')
            ->with('product')
            ->paginate(15);

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
