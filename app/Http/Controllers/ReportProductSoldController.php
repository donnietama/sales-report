<?php

namespace App\Http\Controllers;

use App\ReportProductSold;
use App\ExportProductSold;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DB;

class ReportProductSoldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.product-sold.index');
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
        foreach ($request->sold as $requested) {
            $data[] = [
                'store_id' => Auth::user()->id,
                'date' => $request->date,
                'product_id' => $requested['id'],
                'quantity' => $requested['quantity'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('report_product_solds')->insert($data);

        $newly_added = ReportProductSold::where('date', '=', $data[0]['date'])
            ->where('created_at', '=', $data[0]['created_at'])
            ->with(['product', 'user'])
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($newly_added);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReportProductSold  $reportProductSold
     * @return \Illuminate\Http\Response
     */
    public function show(ReportProductSold $reportProductSold)
    {
        $id = Auth::user()->id;
        $data = $reportProductSold->where('store_id', '=', $id)
            ->with(['product', 'user'])
            ->orderBy('id', 'desc')
            ->paginate(15);

        return $data;
    }

    /**
     * Display all resource.
     *
     * @param  \App\ReportProductSold  $reportProductSold
     * @return \Illuminate\Http\Response
     */
    public function showAll(ReportProductSold $reportProductSold)
    {
        $data = $reportProductSold->with(['product', 'user'])
            ->orderBy('id', 'desc')
            ->paginate(15);

        return $data;
    }

    /**
     * Display the requested export data.
     * 
     * @param \App\ReportProductSold $reportProductSold
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getRequested(ReportProductSold $reportProductSold, Request $request)
    {
        $data = $reportProductSold->where('store_id', '=', $request->store)
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
        
        return (new ExportProductSold)
        ->withRequest($request)->download('Product solds.xlsx');
    }
}
