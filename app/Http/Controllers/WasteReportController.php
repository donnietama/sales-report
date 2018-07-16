<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WasteReport;
use Auth;

class WasteReportController extends Controller
{
    public function index()
    {
        return view('waste.index');
    }

    public function submitReport()
    {
        $resource = WasteReport::create([
            'store_id' => Auth::user()->id,
            'green_tea_jasmine' => $request->green_tea_jasmine,
            'black_tea' => $request->black_tea,
            'quan_yin' => $request->quan_yin,
            'matcha' => $request->matcha,
            'royal' => $request->royal,
            'coffee' => $request->coffee,
            'choco' => $request->choco,
            'cheese' => $request->cheese,
        ]);

        return response()->json(WasteReport::find($resource->id));
    }

    public function getReport()
    {
        $id = Auth::user()->id;
        $data = WasteReport::where('store_id', '=', $id)->orderBy('id', 'desc')->paginate(15);

        return response()->json($data);
    }
}
