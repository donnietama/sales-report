<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\BatchReport;
use Auth;
use DB;

class BatchReportController extends Controller
{
    public function index()
    {
        return view('batch.index');
    }

    public function submitReport(Request $request)
    {
        $data = [];
        foreach ($request->batch as $requested)
        {
            $data[] = [
                'store_id' => Auth::user()->id,
                'date' => $request->date,
                'product_id' => $requested['id'],
                'quantity' => $requested['quantity'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        $store_data = DB::table('batch_reports')->insert($data);
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
