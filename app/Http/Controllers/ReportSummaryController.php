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
        $resource = new ReportSummary;
        $resource->store_id = Auth::user()->id;
        $resource->date = $request->date ?: 0;
        $resource->gross = $request->gross ?: 0;
        $resource->nett = $request->nett ?: 0;
        $resource->voucher = $request->voucher ?: 0;
        $resource->cash = $request->cash ?: 0;
        $resource->card = $request->card ?: 0;
        $resource->ticket = $request->ticket ?: 0;

        if ($resource->save())
        {
            return response()->json('Laporan selesai!');
        }
        else
        {
            return response()->json('Gagal mengirim data!');
        }
    }

    public function getReport()
    {
        $store_id = Auth::user()->id;
        $data = ReportSummary::where('store_id', '=', $store_id)->get();

        return response()->json($data);
    }
}
