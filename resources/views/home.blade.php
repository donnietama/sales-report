@extends('layouts.master')

@section('content')
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 px-4 py-4">
        <h1 class="text-capitalize">Welcome, {{ Auth::user()->name }}!</h1>
        <hr>
        <div class="row text-capitalize">
            <div class="col-xs-3 col-md-3 col-lg-3 col-xl-3">
                <div class="card bg-primary text-white">
                    <p class="card-header">Batches (weekly)</p>
                    <div class="card-body">
                        <h1 class="card-title display-4" style="font-size: 3vw">{{ number_format($batches->quantity, 0, '.', '.') ?: 0 }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 col-md-3 col-lg-3 col-xl-3">
                <div class="card bg-warning text-white">
                    <p class="card-header">Additionals (weekly)</p>
                    <div class="card-body">
                        <h1 class="card-title display-4" style="font-size: 3vw">{{ number_format($additionals->quantity, 0, '.', '.') ?: 0 }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 col-md-3 col-lg-3 col-xl-3">
                <div class="card bg-success text-white">
                    <p class="card-header">Solds (weekly)</p>
                    <div class="card-body">
                        <h1 class="card-title display-4" style="font-size: 3vw">{{ number_format($solds->quantity, 0, '.', '.') ?: 0 }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <div class="card bg-danger text-white">
                    <p class="card-header">Wastes (weekly)</p>
                    <div class="card-body">
                        <h1 class="card-title display-4" style="font-size: 3vw">{{ number_format($wastes->quantity, 0, '.', '.') ?: 0 }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 pt-4">
                <div class="card">
                    <div class="card-body">
                        <top-five-store></top-five-store>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 pt-4">
                <div class="card">
                    <div class="card-body">
                        <sold-chart></sold-chart>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 pt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Gross</h5>
                        <h4>Rp.{{ number_format($summaries->gross, 0, '.', '.') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 pt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Nett</h5>
                        <h4>Rp.{{ number_format($summaries->nett, 0, '.', '.') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 pt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Voucher</h5>
                        <h4>Rp.{{ number_format($summaries->voucher, 0, '.', '.') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 pt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Cash</h5>
                        <h4>Rp.{{ number_format($summaries->cash, 0, '.', '.') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 pt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Card</h5>
                        <h4>Rp.{{ number_format($summaries->card, 0, '.', '.') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 pt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Ticket</h5>
                        <h4>Rp.{{ number_format($summaries->ticket, 0, '.', '.') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
