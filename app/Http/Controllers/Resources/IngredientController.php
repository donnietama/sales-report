<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resources\Ingredient;

class IngredientController extends Controller
{
    /**
     * Display all resource with pagination.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resource = Ingredient::orderBy('id', 'desc')->paginate(15);
        return $resource;
    }
}
