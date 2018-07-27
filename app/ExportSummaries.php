<?php

namespace App;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;


class ExportSummaries implements FromQuery, WithHeadings, ShouldAutoSize,
                    WithStrictNullComparison
{
    use Exportable;
    
    public function headings() : array
    {
        return ['#', 'Store Name', 'Date', 'Gross', 'Nett', 'Voucher', 'Cash', 'Card', 'Ticket'];
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
        if ($this->store == null&& $this->start == null && $this->end == null
        ||  $this->store != null && $this->start == null && $this->end == null
        ||  $this->store == null && $this->start != null && $this->end == null
        ||  $this->store == null && $this->start == null && $this->end != null
        ||  $this->store != null && $this->start == null && $this->end != null
        ||  $this->store != null && $this->start != null && $this->end == null)
        {
            return ReportSummary::query()
                ->select('report_summaries.id', 'users.name', 'date', 'gross', 'nett', 'voucher', 'cash', 'card', 'ticket')
                ->join('users', 'users.id', '=', 'report_summaries.store_id');
        }

        return ReportSummary::query()
            ->select('report_summaries.id', 'users.name', 'date', 'gross', 'nett', 'voucher', 'cash', 'card', 'ticket')
            ->join('users', 'users.id', '=', 'report_summaries.store_id')
            ->where('store_id', '=', $this->store)
            ->whereBetween('date', [$this->start, $this->end]);
    }
}
