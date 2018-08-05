<?php

namespace App\Http\Controllers;

use App\Topping;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DB;

class ToppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.topping.index');
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
                'topping_name' => $requested['topping_name'],
                'quantity' => $requested['quantity'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('toppings')->insert($data);

        $newly_added = Topping::where('product_id', '=', $data[0]['product_id'])
            ->where('created_at', '=', $data[0]['created_at'])
            ->with('product')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($newly_added);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function show(Topping $topping)
    {
        $data = $topping->select('topping_name')->OrderBy('id', 'desc')
            ->with('product')
            ->groupBy('topping_name')
            ->get();

        return $data;
    }

    /**
     * Display paginated resource.
     *
     * @param  \App\Topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function showPaginated(Topping $topping)
    {
        $data = $topping->OrderBy('id', 'desc')
            ->with('product')
            ->paginate(15);

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function edit(Topping $topping)
    {
        $data = Topping::findOrFail($topping);

        return view('topping.update', compact('data', $data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topping $topping)
    {
        $data = Topping::findOrFail($topping);
        $data->product_id = $request->product_id;
        $data->topping_name = $request->topping_name;
        $data->save();

        return response('Topping has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topping $topping)
    {
        $data = Topping::findOrFail($topping);
        $data->delete();

        return response('Topping has been deleted!');
    }
}
