<?php

namespace App\Http\Controllers;

use App\ReportWaste;
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

        DB::table('report_wastes')->insert($data);
        
        $newly_added = ReportWaste::where('date', '=', $data[0]['date'])
                        ->where('created_at', '=', $data[0]['created_at'])
                        ->with(['product', 'user' => function($query) {
                                    $query->select('id', 'name');
                                }
                            ])
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
                            ->orderBy('id', 'desc')
                            ->with([
                                'product' => function($query)
                                {
                                    $query->select('id', 'product_name');
                                },
                                'user' => function($query)
                                {
                                    $query->select('id', 'name');
                                }
                            ])->paginate(15);

        return $data;
    }
}
