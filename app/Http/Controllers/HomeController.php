<?php

namespace App\Http\Controllers;

use App\ReportBatch;
use App\ReportWaste;
use App\ReportProductSold;
use App\ReportAdditional;
use App\ReportSummary;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = date('Y-m-d');
        $past = date('Y-m-d', strtotime('- 1 week'));

        $batches = ReportBatch::select(\DB::raw('sum(quantity) as quantity'))
                    ->whereBetween('date', [$past, $now])
                    ->first();

        $wastes = ReportWaste::select(\DB::raw('sum(quantity) as quantity'))
                    ->whereBetween('date', [$past, $now])
                    ->first();
                    
        $additionals = ReportAdditional::select(\DB::raw('sum(quantity) as quantity'))
                    ->whereBetween('date', [$past, $now])
                    ->first();

        $solds = ReportProductSold::select(\DB::raw('sum(quantity) as quantity'))
                ->whereBetween('date', [$past, $now])
                ->first();

        $summaries = ReportSummary::select(\DB::raw('sum(gross) as gross, sum(nett) as nett, sum(voucher) as voucher, sum(cash) as cash, sum(card) as card, sum(ticket) as ticket'))
                    ->whereBetween('date', [$past, $now])
                    ->first();

        return view('home', compact('batches', 'wastes', 'additionals', 'solds', 'summaries'));
    }
}
