<?php

namespace App\Http\Controllers;

use App\CountBatches;
use App\ReportBatch;
use Illuminate\Http\Request;

class CountBatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime('- 7 days'));
        
        $calculated = ReportBatch::select('product_id', \DB::raw('sum(quantity) as total_quantity'))
                    // ->whereBetween('date', [$start_date, $end_date])
                    ->with('product')
                    ->with('ingredients')
                    ->groupBy('product_id')
                    ->orderBy('product_id', 'asc')
                    ->paginate(4);
        // return $calculated;
        return view('admin.product.counted', compact('calculated'));
    }
}
