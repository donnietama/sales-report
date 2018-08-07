@extends('layouts.master')
@section('content')
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 py-4">
        <h3 class="text-capitalize">batch report</h3>
        <hr>
        <batch-form></batch-form>
        <batch-table></batch-table>
    </div>
@endsection