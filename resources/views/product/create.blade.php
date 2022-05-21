@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                        <form id="tipForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <h6>Product Crate Form</h6>
                                <hr>
                                <div class="form-group row"style="margin-bottom: 20px">
                                    <label class="col-lg-3 col-form-label form-control-label">Image</label>
                                    <div class="col-lg-9">
                                        <input type="file" name="image" id="filePhoto" class="sr-only form-control" accept="image/*" placeholder="Image" required>
                                    </div>
                                </div>
                                <div class="form-group row"style="margin-bottom: 20px">
                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="name" required placeholder="Enter Name" >
                                    </div>
                                </div>
                                    <div class="form-group row " style="margin-bottom: 20px">
                                        <label class="col-lg-3 col-form-label form-control-label">Category</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="category" required>
                                                <option value="" selected disabled>Select Main Category</option>
                                                @foreach($mainCategories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row " style="margin-bottom: 20px">
                                        <label class="col-lg-3 col-form-label form-control-label">Sub Category</label>
                                        <div class="col-lg-9">
                                            <select class="form-control"  name="subcategory" required>
                                                <option value="" selected disabled>Select Main Category</option>
                                                @foreach($subCategories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row"style="margin-bottom: 20px">
                                        <label class="col-lg-3 col-form-label form-control-label">Price</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" required type="number" name="price" value="{{ old('price') }}" placeholder="Enter Price">
                                        </div>
                                    </div>

                                    <div class="form-group row"style="margin-bottom: 20px">
                                        <label class="col-lg-3 col-form-label form-control-label">Description</label>
                                        <div class="col-lg-9">
                                                <textarea class="form-control" name="description" placeholder="Enter description" rows="3" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
                                            <input type="submit" class="btn btn-primary" value="Save">
                                        </div>

                        </form>
            </div>
        </div>
    </div>
</div>
@endsection
