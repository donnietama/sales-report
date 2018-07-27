@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
            <h3 class="text-capitalize bg-dark text-white p-4 m-0">administrator environtment: summaries report</h3>
        </div>
    </div>
    <div class="row bg-white">
        @include('layouts.admin-reporting-sidebar')
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 p-0">
            <batches></batches>
        </div>
    </div>
</div>
@endsection