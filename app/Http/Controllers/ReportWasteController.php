<?php

namespace App\Http\Controllers;

use App\ReportWaste;
use App\ExportWastes;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DB;

class ReportWasteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.waste.index');        
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
        foreach ($request->waste as $requested)
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

        $checkExistence = ReportWaste::where('date', '=', $data[0]['date'])->where('store_id', '=', Auth::user()->id)->get();
        if (count($checkExistence) != 0) {
            return response('data exists');
        }

        DB::table('report_wastes')->insert($data);
        
        $newly_added = ReportWaste::where('date', '=', $data[0]['date'])
            ->where('created_at', '=', $data[0]['created_at'])
            ->with(['product', 'user'])
            ->orderBy('id', 'desc')
            ->get();

        return $newly_added;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReportWaste  $reportWaste
     * @return \Illuminate\Http\Response
     */
    public function show(ReportWaste $reportWaste)
    {
        $id = Auth::user()->id;
        $data = $reportWaste->where('store_id', '=', $id)
            ->with(['product', 'user'])
            ->orderBy('id', 'desc')
            ->paginate(15);

        return $data;
    }
    
    /**
     * Display all resource.
     *
     * @param  \App\ReportWaste  $reportWaste
     * @return \Illuminate\Http\Response
     */
    public function showAll(ReportWaste $reportWaste)
    {
        $data = $reportWaste->orderBy('id', 'desc')
            ->with(['product', 'user'])
            ->paginate(15);

        return $data;
    }

    /**
     * Display the requested export data.
     * 
     * @param \App\ReportWaste $reportWaste
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getRequested(ReportWaste $reportWaste, Request $request)
    {
        $data = $reportWaste->where('store_id', '=', $request->store)
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
        
        return (new ExportWastes)
        ->withRequest($request)->download('Product solds.xlsx');
    }
}
