<?php

namespace App\Http\Controllers;

use App\ReportSummary;
use App\ExportSummaries;
use Illuminate\Http\Request;
use Auth;

class ReportSummaryController extends Controller
{
    public function index()
    {
        return view('reports.summary.index');
    }

    public function store(Request $request)
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

        return response()
        ->json(ReportSummary::find($resource->id));
    }

    public function show()
    {
        $store_id = Auth::user()->id;
        $data = ReportSummary::where('store_id', '=', $store_id)
            ->orderBy('created_at', 'desc')
            ->with('user')
            ->paginate(15);

        return $data;
    }

    /**
     * Display all resource.
     *
     * @param  \App\ReportSummary  $reportSummary
     * @return \Illuminate\Http\Response
     */
    public function showAll(ReportSummary $reportSummary)
    {
        $data = $reportSummary->with('user')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return $data;
    }

    /**
     * Display the requested export data.
     * 
     * @param \App\ReportSummary $reportSummary
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getRequested(ReportSummary $reportSummary, Request $request)
    {
        $data = $reportSummary->where('store_id', '=', $request->store)
            ->whereBetween('date', [$request->start, $request->end])
            ->with('user')
            ->paginate(15);
        
        return $data;
    }

    /**
     * Export the displayed data as Excel file.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        $store = $request->store;
        $start = $request->start;
        $end = $request->end;
        
        return (new ExportSummaries)
        ->withRequest($request)->download('Product solds.xlsx');
    }
}
