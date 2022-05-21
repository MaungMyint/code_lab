@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class=" ">

                        <form method="post" action="{{ route('subcategory.update', $subcategory->slug ) }}">
                            @csrf
                            @method('POST')
                                    <h6>Create Main Category Form</h6>
                                    <hr>
                                        <div class="form-group row " style="margin-bottom: 20px">
                                            <label class="col-lg-3 col-form-label form-control-label">Main Category</label>
                                            <div class="col-lg-9">
                                                <select class="form-control"  required name="category_id" required>
                                                    <option value=""  disabled>Select Main Category</option>
                                                    @foreach($category as $category_data)
                                                    <option selected value="{{ $category_data->id }}">{{ $category_data->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row " style="margin-bottom: 20px">
                                            <label class="col-lg-3 col-form-label form-control-label">Sub Category</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" required type="text" name="name" value="{{ $subcategory->name }}" placeholder="{{ $subcategory->name }}">
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
