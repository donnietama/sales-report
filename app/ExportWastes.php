<?php

namespace App;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;


class ExportWastes implements FromQuery, WithHeadings, ShouldAutoSize,
                    WithStrictNullComparison
{
    use Exportable;
    
    public function headings() : array
    {
        return ['#', 'Store Name', 'Date', 'Product Name', 'Quantity in ml'];
    }

    public function withRequest($request)
    {
        $this->store = $request->store;
        $this->start = $request->start;
        $this->end = $request->end;
        
        return $this;
    }

    public function query()
    {
        if ($this->store == null && $this->start == null && $this->end == null
        ||  $this->store != null && $this->start == null && $this->end == null
        ||  $this->store == null && $this->start != null && $this->end == null
        ||  $this->store == null && $this->start == null && $this->end != null
        ||  $this->store != null && $this->start == null && $this->end != null
        ||  $this->store != null && $this->start != null && $this->end == null)
        {
            return ReportWaste::query()
                ->select('report_wastes.id', 'users.name', 'date', 'products.product_name', 'quantity')
                ->join('products', 'products.id', '=', 'report_wastes.product_id')
                ->join('users', 'users.id', '=', 'report_wastes.store_id');
        }

        return ReportWaste::query()
            ->select('report_wastes.id', 'users.name', 'date', 'products.product_name', 'quantity')
            ->join('products', 'products.id', '=', 'report_wastes.product_id')
            ->join('users', 'users.id', '=', 'report_wastes.store_id')
            ->where('store_id', '=', $this->store)
            ->whereBetween('date', [$this->start, $this->end]);
    }
}
