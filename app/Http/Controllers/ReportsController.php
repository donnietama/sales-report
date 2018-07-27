<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ['summaries', 'batch', 'productSold', 'waste', 'additional']
        $data = User::select('id', 'name')
                    ->with('summaries')
                    ->with('batch')
                    ->with('productSold')
                    ->with('waste')
                    ->with('additional')
                    ->get();

        return $data;
    }
}
