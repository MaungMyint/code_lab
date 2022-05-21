@extends('layouts.mainpage')
@section('content')
    <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
        <div class="text-center m-3">
            <h2 class="text-3xl header leading-9 font-extrabold  sm:text-4xl sm:leading-10">
                Welcome to the Electronics  E-commerce Store
            </h2>
            <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg">
                E-commerce (electronic commerce) is the buying and selling of goods and services, or the knowing of new devices.
            </p>
        </div>
        <div class="row clearfix m-4">
            <div class="col-lg-12 col-md-12 ">
                <div class="row auction-cards">
                    @if (count($products))
                        @inject('categories', 'App\Models\Category')
                        @inject('subcategories', 'App\Models\Subcategory')
                        @inject('user', 'App\Models\User')
                        @foreach ($products as $product)
                            <div class="col-md-3">
                                <div class="card mt-2 single_post shadow">
                                    <div class="body p-3">
                                        <div class="img-post d-flex align-content-center justify-content-center">
                                            <img class="d-block img-fluid img-height-200"
                                                src="{{ url($product->image) }} "
                                                alt="First slide">
                                        </div>
                                        <div class="mt-3 d-flex align-items-center">
                                            <i class="fa fa-calendar mr-2 fa-2x"></i>
                                            <h6 class="mb-0"
                                                style="font-style: normal">Product Name: <br><span class="text-muted"
                                                    style="font-size: 18px">{{ $product->name }}</span>
                                            </h6>
                                        </div>
                                        <div class="mt-3 d-flex align-items-center">
                                            <i class="fa fa-calendar mr-2 fa-2x"></i>
                                            <h6 class="mb-0"
                                                style="font-style: normal">Product Price: <br><span class="text-muted"
                                                    style="font-size: 18px">{{ $product->price }} </span>/mmk
                                            </h6>
                                        </div>
                                        <div class="mt-3 d-flex align-items-center">
                                            <i class="fa fa-calendar mr-2 fa-2x"></i>
                                            <h6 class="mb-0"
                                                style="font-style: normal">Main Category: <br><span class="text-muted">{{ $categories->find($product->category_id)->name }}</span>
                                            </h6>
                                        </div>
                                        <div class="mt-3 d-flex align-items-center">
                                            <i class="fa fa-clock-o mr-4 fa-2x"></i>
                                            <h6 class="mb-0">Sub Category: <br><span class="text-muted">
                                                    {{ $subcategories->find($product->category_id)->name }}
                                                </span>
                                            </h6>
                                        </div>
                                        <div class="mt-3 d-flex align-items-center">
                                            <i class="fa fa-clock-o mr-4 fa-2x"></i>
                                            <h6 class="mb-0">Created_By :<br><span class="text-muted">
                                                    {{ $user->find($product->user_id)->name }}
                                                </span>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <div class="actions">
                                            <a href="{{ route('detail', $product->slug) }}"
                                                class="btn btn-outline-secondary justify-content-center d-flex align-items-center"><i class="icon-list mr-2"></i> View Detail</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @else
                    <div class="row " id="empty-list">
                        <img src="{{ asset('images/empty.svg') }}" alt="empty" height="300" width="100%" />
                        </div>
                        <div class="row " id="empty-list">
                            <h3 class="text-center">No Products Found</h3>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
