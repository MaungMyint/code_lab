@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header mb-2">
                    <div class="header-dropdown">
                            <a href="{{ route('product.create')}}"
                                class="btn btn-info mr-2 d-flex justify-content-center align-items-center">
                                <i class="icon-plus mr-2 text-white"></i> Create New Product</a>
                    </div>
                </div>

                <h3>Products List</h3>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable table-responsive accordion-header">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Created By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @inject('user', 'App\Models\User')
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{ url($product->image ?? '/assets/images/user.png') }}" alt="{{ $product->name }}"
                                        class="img-fluid" width="100px">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->subcategory->name }}</td>
                                <td>{{ $user->find($product->user_id)->name; }}</td>
                                <td>

                                    @if ($product->is_active == 1)
                                    <form id="tipForm" action="{{ route('product.status',$product->slug) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                    <input type= "submit" name="update" value="Deactive" class="btn-outline-success btn-sm pull-right">
                                    </form>
                                    @else
                                    <form id="tipForm" action="{{ route('product.status',$product->slug) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                    <input type= "submit" name="update" value="Active" class="btn-outline-warning btn-sm pull-right">
                                    </form>
                                    @endif
                                <td>
                                    <a href="{{ route('product.show', $product->slug) }}" class="btn btn-success btn-sm">Show</a>
                                    <a href="{{ route('product.edit',$product->slug) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ route('product.delete',$product->slug) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>

                            @endforeach
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
    </div>
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
