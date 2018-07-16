@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
                <h3 class="text-capitalize bg-dark text-white p-4 m-0">summary sales report</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 p-0 bg-dark">
                <div class="sidebar bg-dark text-capitalize">
                    <ul>
                        <a href="{{ route('home') }}" class=" text-white">
                            <li class="bg-success p-3">
                                Kembali ke menu awal
                            </li>
                        </a>
                        <li class="bg-secondary p-3">
                            <a href="/home/summaries/create" class="text-white">summary reporting</a>
                        </li>
                        <li class="bg-secondary p-3">
                            <a href="#" class="text-white">batch reporting</a>
                        </li>
                        <div class="bg-secondary p-3">
                            <a href="#" class="text-white">product sold reporting</a>
                        </div>
                        <div class="bg-secondary p-3">
                            <a href="#" class="text-white">additional reporting</a>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 p-0">
                <summary-form></summary-form>
                <summary-table></summary-table>
            </div>
        </div>
    </div>
@endsection