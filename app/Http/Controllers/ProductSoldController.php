<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductSold;
use Carbon\Carbon;
use Auth;
use DB;

class ProductSoldController extends Controller
{
    /**
     * Display index view
     * 
     * @return void
     */
    public function index()
    {
        return view('product-sold.index');
    }

    /**
     * Store data to database.
     * 
     * @param Request $request.
     * @return Illuminate\Http\Response;
     */
    public function submitReport()
    {
        $validation = $this->validate($request, [
            '' => 'string|required',
        ]);

        if (!$validation) {
            return 'Data tidak valid. Silahkan cek sekali lagi.';
        }

        $data = [];
        foreach ($request->product as $requested) {
            $data[] = [
                'store_id' => Auth::user()->id,
                'date' => $request->date,
                'product_id' => $requested['id'],
                'quantity' => $requested['quantity'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('product_solds')->insert($data);

        $newly_added = ProductSold::where('date', '=', $data[0]['date'])
            ->where('created_at', '=', $data[0]['created_at'])
            ->with([
                    'productName',
                    'userId' => function($query) {
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
        $data = ProductSold::where('store_id', '=', $id)
            ->with([
                'productName',
                'userId' => function($query) {
                    $query->select('id', 'name');
            }])
            ->orderBy('id', 'desc')
            ->paginate(15);

        return response()->json($data);
    }
}
