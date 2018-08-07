@extends('layouts.master')
@section('content')
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 p-0">
        <div class="px-4 pt-4">
            <h3 class="text-capitalize">summary report</h3>
            <hr>
        </div>
        <summary-form></summary-form>
        <summary-table></summary-table>
    </div>
@endsection