@extends('layouts.master')
@section('content')
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 py-4">
        <h3 class="text-capitalize">waste report</h3>
        <hr>
        <waste-form></waste-form>
        <waste-table></waste-table>
    </div>
@endsection