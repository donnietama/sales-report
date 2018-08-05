@extends('layouts.app')
@section('content')
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 p-0">
        <div class="px-4 pt-4">
            <h3 class="text-capitalize">batch report</h3>
            <hr>
        </div>
        <batch-form></batch-form>
        <batch-table></batch-table>
    </div>
@endsection