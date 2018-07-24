<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function submitTopping()
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
}
