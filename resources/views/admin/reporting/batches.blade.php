@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 p-0">
            <batches></batches>
        </div>
    </div>
</div>
@endsection