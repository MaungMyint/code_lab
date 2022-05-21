{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class=" ">
                        <form method="post" action="{{ route('category.update', $category->slug ) }}">
                            <div class="form-group">
                                @csrf
                                @method('POST')
                                <label for="country_name">Game Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class=" ">

                        <form method="post" action="{{ route('category.update', $category->slug ) }}">
                                @csrf
                                @method('POST')
                                    <h6>Update Main Category Form</h6>
                                    <hr>
                                        <div class="form-group row " style="margin-bottom: 20px">
                                            <label class="col-lg-3 col-form-label form-control-label">Main Category</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" type="text" name="name" required value="{{ $category->name }}" placeholder="{{ $category->name }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label"></label>
                                            <div class="col-lg-9">
                                                <a href="{{ route('category') }}" class="btn btn-secondary">Back</a>
                                                <input type="submit" class="btn btn-primary" value="Save">
                                            </div>
                            </form>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
