@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class=" ">

                            <form id="tipForm" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <h6>Create Main Category Form</h6>
                                    <hr>
                                    <div class="row ">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter Name"
                                                    value="{{ old('name') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <a href="{{ route('home') }}" class="btn btn-danger">
                                            <i class="icon-logout"></i> Back
                                        </a>
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-save"></i> Save
                                        </button>
                                    </div>
                            </form>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
