<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BatchReport;
use Auth;

class BatchReportController extends Controller
{
    public function index()
    {
        return view('batch.index');
    }

    public function submitReport(Request $request)
    {
        $resource = BatchReport::create([
            'store_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        return response()->json(BatchReport::find($resource->id));
    }

    public function getReport()
    {
        $id = Auth::user()->id;
        $data = BatchReport::where('store_id', '=', $id)->with(['productName', 'userId' => function($query) {
            $query->select('id', 'name');
        }])->orderBy('id', 'desc')->paginate(15);

        return response()->json($data);
    }
}
