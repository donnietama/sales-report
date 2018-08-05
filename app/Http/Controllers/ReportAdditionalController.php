<?php

namespace App\Http\Controllers;

use App\ReportAdditional;
use App\ExportAdditionals;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DB;

class ReportAdditionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.additional.index');        
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
        foreach ($request->additional as $requested) {
            $data[] = [
                'store_id' => Auth::user()->id,
                'date' => $request->date,
                'topping_name' => $requested['topping_name'],
                'quantity' => $requested['quantity'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('report_additionals')->insert($data);

        $newly_added = ReportAdditional::where('date', '=', $data[0]['date'])
            ->where('created_at', '=', $data[0]['created_at'])
            ->with(['product', 'user'])
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($newly_added);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReportAdditional  $reportAdditional
     * @return \Illuminate\Http\Response
     */
    public function show(ReportAdditional $reportAdditional)
    {
        $id = Auth::user()->id;
        $data = $reportAdditional->where('store_id', '=', $id)
            ->with(['product', 'user'])
            ->orderBy('id', 'desc')
            ->paginate(15);

        return $data;
    }
    
    /**
     * Display all resource.
     *
     * @param  \App\ReportAdditional  $reportAdditional
     * @return \Illuminate\Http\Response
     */
    public function showAll(ReportAdditional $reportAdditional)
    {
        $data = $reportAdditional->orderBy('id', 'desc')
            ->with(['product', 'user'])
            ->paginate(15);

        return $data;
    }

    /**
     * Display the requested export data.
     * 
     * @param \App\ReportAdditional $reportAdditional
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getRequested(ReportAdditional $reportAdditional, Request $request)
    {
        $data = $reportAdditional->where('store_id', '=', $request->store)
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
        
        return (new ExportAdditionals)
        ->withRequest($request)->download('Product solds.xlsx');
    }
}
