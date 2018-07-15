<?php

namespace App\Http\Controllers;

use Auth;
use App\ReportSummary;
use Illuminate\Http\Request;

class ReportSummaryController extends Controller
{
    public function index()
    {
        return view('summary.index');
    }

    public function submitReport(Request $request)
    {
        $resource = ReportSummary::create([
            'store_id' => Auth::user()->id,
            'date' => $request->date ?: 0,
            'gross' => $request->gross ?: 0,
            'nett' => $request->nett ?: 0,
            'voucher' => $request->voucher ?: 0,
            'cash' => $request->cash ?: 0,
            'card' => $request->card ?: 0,
            'ticket' => $request->ticket ?: 0,
        ]);

        return response()->json(ReportSummary::find($resource->id));
    }

    public function getReport()
    {
        $store_id = Auth::user()->id;
        $data = ReportSummary::where('store_id', '=', $store_id)->orderBy('created_at', 'desc')->get();

        return response()->json($data);
    }
}
