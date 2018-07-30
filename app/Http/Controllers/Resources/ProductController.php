<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resources\Product;

class ProductController extends Controller
{
    /**
     * Display all data with pagination.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resource = Product::with('ingredient')
                    ->orderBy('id', 'desc')
                    ->paginate(8);
                    
        return $resource;
    }
}
