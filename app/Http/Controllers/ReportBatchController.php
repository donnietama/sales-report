<?php

namespace App\Http\Controllers;

use App\ExportBatches;
use App\ReportBatch;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Excel;
use Auth;
use DB;

class ReportBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.batch.index');        
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

        DB::table('report_batches')->insert($data);

        $newly_added = ReportBatch::where('date', '=', $data[0]['date'])
            ->where('created_at', '=', $data[0]['created_at'])
            ->with(['product', 'user'])
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($newly_added);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReportBatch  $reportBatch
     * @return \Illuminate\Http\Response
     */
    public function show(ReportBatch $reportBatch)
    {
        $id = Auth::user()->id;
        $data = $reportBatch->where('store_id', '=', $id)
            ->with(['product', 'user'])
            ->orderBy('id', 'desc')
            ->paginate(15);

        return $data;
    }

    /**
     * Display all resource.
     *
     * @param  \App\ReportBatch  $reportBatch
     * @return \Illuminate\Http\Response
     */
    public function showAll(ReportBatch $reportBatch)
    {
        $data = $reportBatch->orderBy('id', 'desc')
            ->with(['product', 'user'])
            ->paginate(15);

        return $data;
    }

    /**
     * Display the requested export data.
     * 
     * @param \App\ReportBatch $reportBatch
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getRequested(ReportBatch $reportBatch, Request $request)
    {
        $data = $reportBatch->where('store_id', '=', $request->store)
            ->whereBetween('date', [$request->start, $request->end])
            ->with(['product', 'user'])
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
        
        return (new ExportBatches)
        ->withRequest($request)->download('batches.xlsx');
    }
}
