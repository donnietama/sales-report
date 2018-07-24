<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdditionalReport;
use Carbon\Carbon;
use Auth;
use DB;

class AdditionalReportController extends Controller
{
    /**
     * Show index view.
     * 
     * @return void
     */
    public function index()
    {
        return view('additional.index');
    }

    /**
     * Store additional reports.
     * 
     * @param Illuminate\Http\Request $request.
     * @return Illuminate\Http\Response.
     */
    public function submitReport(Request $request)
    {
        $data = [];
        foreach ($request->additional as $requested) {
            $data[] = [
                'store_id' => Auth::user()->id,
                'date' => $request->date,
                'product_id' => $requested['id'],
                'quantity' => $requested['quantity'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('additional_reports')->insert($data);

        $newly_added = AdditionalReport::where('date', '=', $data[0]['date'])
            ->where('created_at', '=', $data[0]['created_at'])
            ->with([
                    'product',
                    'user' => function($query) {
                    $query->select('id', 'name');
                }
            ])
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($newly_added);
    }

    /**
     * Display data into view.
     * 
     * @return Illuminate\Http\Response;
     */
    public function getReport()
    {
        $id = Auth::user()->id;
        $data = AdditionalReport::where('store_id', '=', $id)
                                ->with(['product', 'user' => function($query) {
                                        $query->select('id', 'name');
                                    }
                                ])
                                ->orderBy('id', 'desc')
                                ->paginate(15);

        return response()->json($data);
    }
}
