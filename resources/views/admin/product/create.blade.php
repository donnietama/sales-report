@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 py-4">
                <form action="/admin/product" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-capitalize">
                            <h3>add new product</h3>
                            <hr>
                        </div>
                    </div>
                    <div class="row text-capitalize py-4">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label>image preview</label>
                                <input type="file" name="preview" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col xl-8">
                            <div class="form-group">
                                <label>product name</label>
                                <input type="text" name="product_name" class="form-control" placeholder="New product name">
                            </div>
                            <div class="form-group">
                                <label>product type</label>
                                <select class="form-control" name="product_size">
                                    <option value="" disabled hidden>Select product size</option>
                                    <option value="regular">Regular</option>
                                    <option value="large">Large</option>
                                    <option value="hot">Hot</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>product description</label>
                                <textarea cols="30" rows="10" class="form-control" name="product_desc" placeholder="Description..."></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection