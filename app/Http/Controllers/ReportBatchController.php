<?php

namespace App\Http\Controllers;

use App\ReportBatch;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                        ->with([
                            'product' => function($query) {
                                $query->select('id', 'product_name');
                            },
                            'user' => function($query) {
                                $query->select('id', 'name');
                            }
                        ])
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
                            ->with([
                                'product' => function($query)
                                {
                                    $query->select('id', 'product_name');
                                },
                                'user' => function($query)
                                {
                                    $query->select('id', 'name');
                                }
                            ])
                            ->orderBy('id', 'desc')
                            ->paginate(15);

        return $data;
    }
}
