<?php

namespace App\Http\Controllers;

use App\Topping;
use Illuminate\Http\Request;
use Auth;
use DB;

class ToppingController extends Controller
{
    /**
     * Show main view.
     * 
     * @return void
     */
    public function index()
    {
        return view('topping.index');
    }

    /**
     * Register new toppings.
     * 
     * @param Illuminate\Http\Request $request;
     * @return Illuminate\Http\Response;
     */
    public function store()
    {
        // Validate inputs.
        $valid = $this->validate([
            'topping_name' => 'string|unique'
        ]);

        // If not passed, return error.
        if (!$valid) {
            return 'Data yang anda masukkan tidak valid. Silahkan cek sekali lagi.';
        }

        $toppingList = [];
        foreach ($request->topping as $requested)
        {
            $toppingList[] = Topping::create([
                'topping_name' => $requested['topping_name'],
            ]);
        }
        return response()->json($toppingList);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function show(Topping $topping)
    {
        $id = Auth::user()->id;
        $data = $topping->all();

        return $data;
    }
}
