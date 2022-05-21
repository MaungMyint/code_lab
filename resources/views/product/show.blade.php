@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class=" ">
                        <div class="card-header">
                            <h4>Product Detail</h4>
                        </div>
                    </div>
                </div>
        </div>
        <div class=" mx-auto sm:px-12 lg:px-12 col-lg-12 text-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg justify-center justify-content-center">
                <div class="justify-center justify-content-center border-b border-gray-600 ">
                    <img src="{{ url($product->image) }}"  class="w-full" width="200" height="200" alt="logo">
                </div>

                <div class="row">
                    <div class="col-4 col-sm-6 col-lg">
                        <div class="text-center m-3">
                            <h5 class="font-medium text-gray-700">Product Name:</h5>
                            <p class="mt-3 max-w-md  text-base text-gray-500 sm:text-lg">
                                {{ $product->name }}</p>
                        </div>
                    </div>
                    <?php
                    ?>
                    <div class="col-4 col-sm-6 col-lg">
                        <div class="text-center m-3">
                            <h5 class="font-medium text-gray-700">Product Price:</h5>
                            <p class="mt-3 max-w-md  text-base text-gray-500 sm:text-lg">
                                {{ $product->price }}</p>
                        </div>
                    </div>

                    @inject('user', 'App\Models\User')
                    <div class="col-4 col-sm-6 col-lg">
                        <div class="text-center m-3">
                            <h5 class="font-medium text-gray-700"> Post by:</h5>
                            <p class="mt-3 max-w-md  text-base text-gray-500 sm:text-lg">
                                {{ $user->find($product->user_id)->name; }}</p>
                        </div>
                    </div>

                </div>
                <div class="row">
                    @inject('category', 'App\Models\Category')
                    <div class="col-4 col-sm-6 col-lg">
                        <div class="text-center m-3">
                            <h5 class="font-medium text-gray-700">Main Category Type:</h5>
                            <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg">
                                {{ $category->find($product->category_id)->name; }}</p>
                        </div>
                    </div>
                    @inject('subcategory', 'App\Models\Subcategory')
                    <div class="col-4 col-sm-6 col-lg">
                        <div class="text-center m-3">
                            <h5 class="font-medium text-gray-700">Main Category Type:</h5>
                            <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg">
                                {{ $subcategory->find($product->subcategory_id)->name; }}</p>
                        </div>
                    </div>
                    <div class="col-4 col-sm-6 col-lg">
                        <div class="text-center m-3">
                            <h5 class="font-medium text-gray-700">Created At:</h5>
                            <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg">
                                {{ Carbon\Carbon::parse($product->created_at)->format('d-m-Y h:i A') }} /({{ $product->created_at->diffForHumans() }})</p>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12 col-sm-8 col-lg" style="margin-left: 20px">
                        <div class="text-start m-3">
                            <h5 class="font-medium text-gray-700">Product Description:</h5>
                            <p class="mt-3 max-w-md text-base text-gray-500 sm:text-lg">
                                {{ $product->description }}
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <div class="mt-2">
            <a href="{{ route('product.index') }}" class="btn btn-info">
                <i class="icon-logout"></i> Back
            </a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#categotydelte').click(function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = url;
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        });
    });
@endsection
