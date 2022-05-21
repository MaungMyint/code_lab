@extends('layouts.mainpage')
@section('content')
<div class="max-w-screen-xl mx-auto sm:px-6 lg:px-10">
    <div class="text-center m-3">
        <h2 class="text-3xl header leading-9 font-extrabold  sm:text-4xl sm:leading-10">
            Detail of the Electronics  of {{ $product->name }}
        </h2>
        <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg">
            E-commerce (electronic commerce) is the buying and selling of goods and services, or the knowing of new devices.
        </p>
    </div>
</div>
<div class=" mx-auto sm:px-6 lg:px-8 col-lg-10 text-center">
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
                        {{ $product->price }} /mmk</p>
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
<div class="row max-w-screen-xl mx-auto sm:px-6 lg:px-10 justify-content-center " style="margin-bottom: 20px">
    <div class="col-md-10">
        <div class="row clearfix">
            <hr>
            <div class="col-lg-12 col-md-12">
                <label for="name">Review of this product</label>
            </div>
            @inject('user','App\Models\User')
            @foreach ($comments as $comment)
            <div class="list-group" style="margin-top: 10px">
                <a href="#" class="list-group-item list-group-item-action active" style="background-color: rgb(249, 245, 245);" aria-current="true">
                  <div class="d-flex  justify-content-between">
                    <h5 class="mb-1" style="color:rgb(53, 51, 51);"><span class="fa fa-calendar">
                    @if ($comment->user_id)
                    {{ $user->find($comment->user_id)->name; }}
                    @else
                        Guest
                    @endif
                    </span></h5>
                    <small style="color:rgb(68, 51, 225);font-size: 14px">{{ $comment->created_at->diffForHumans() }}</small>
                  </div>
                  <small style="color:rgb(77, 67, 67);font-size: 14px">{{ $comment->message }}</small>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="row max-w-screen-xl mx-auto sm:px-6 lg:px-10 justify-content-center" style="margin-bottom: 20px">
    <div class="col-md-10">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class=" ">
                        <form id="tipForm" action="{{ route('comment.store',$product->slug) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <hr>
                                <div class="row ">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="name">Leave a comment for this post</label>
                                            <textarea class="form-control" required name="description" placeholder="Enter description" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="slug" value="{{ $product->slug }}" />
                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                <div class="mt-2">
                                    <a href="{{ route('home') }}" class="btn btn-danger">
                                        <i class="icon-logout"></i> Back
                                    </a>
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-save"></i> Comment
                                    </button>
                                </div>
                        </form>
                    </div>
            </div>

        </div>
    </div>
</div>
@endsection
