@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.admin-reporting-sidebar')
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 py-4">
                @foreach ($data as $product)
                    <div class="row">
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                            <img src="{{ $product->preview_url }}" alt="{{ $product->product_name }}" class="img-thumbnail img-fluid">
                        </div>
                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h1 class="display-3 text-capitalize">{{ $product->product_name }}</h1>
                                    @if (!$product->product_description)
                                        <div class="text-capitalize text-center lead alert alert-warning">
                                            no description
                                        </div>
                                    @else
                                        <p class="lead">{{ $product->product_description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            @if (!$product->ingredient)
                                <div class="text-capitalize text-center lead alert alert-warning">
                                    no ingredients
                                </div>
                            @else
                                <div class="card">
                                    <div class="card-body p-0">
                                        <table class="table table-hover bg-white">
                                            <thead class="text-capitalize">
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>ingredient name</th>
                                                    <th>quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($product->ingredient as $key => $ingredient)
                                                    <tr>
                                                        <td class="text-center">{{ $key + 1 . "." }}</td>
                                                        <td>{{ $ingredient->ingredient }}</td>
                                                        <td>{{ $ingredient->quantity }} ml/pcs</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif 
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection