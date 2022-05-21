@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class=" ">

                            <form id="tipForm" action="{{ route('subcategory.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <h6>Sub Category Form</h6>
                                    <hr>
                                        <div class="form-group row " style="margin-bottom: 20px">
                                            <label class="col-lg-3 col-form-label form-control-label">Category</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="category_id" required>
                                                    <option value="" selected disabled>Select Main Category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row"style="margin-bottom: 20px">
                                            <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" type="text" name="name" required value="{{ old('name') }}" placeholder="Name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label"></label>
                                            <div class="col-lg-9">
                                                <a href="{{ route('subcategory') }}" class="btn btn-secondary">Back</a>
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
