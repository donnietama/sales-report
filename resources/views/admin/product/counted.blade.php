@extends('layouts.master')
@section('content')
    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 offset-2 py-4">
        <div class="row py-4">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h3 class="text-capitalize">product batches & ingredient used per week</h3>
                <hr>
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-hover bg-white">
                            <thead class="text-capitalize">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>product name</th>
                                    <th>ingredient name</th>
                                    <th>quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calculated as $key => $product)
                                <tr class="bg-light">
                                    <td>{{ $product->product_id . "." }}</td>
                                    <td colspan="2">{{ $product->product->product_name }}</td>
                                    <td>{{ $product->total_quantity }} batches</td>
                                    @foreach ($product->ingredients as $ingredient_key => $ingredient)
                                    <tr>
                                        <td colspan="2"></td>
                                        <td>{{ $ingredient->ingredient_name }}</td>
                                        <td>{{ $product->total_quantity * $ingredient->quantity }} ml</td>
                                    </tr>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 ml-auto">
                {{ $calculated->links() }}
            </div>
        </div>
    </div>
@endsection