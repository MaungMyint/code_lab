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
                            <a href="{{ route('subcategory.create')}}"
                                class="btn btn-info mr-2 d-flex justify-content-center align-items-center">
                                <i class="icon-plus mr-2 text-white"></i> Create New Sub Category</a>
                    </div>
                </div>

                <h3>Sub Category List</h3>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Main Category</th>
                                <th>Sub Category</th>
                                <th>Created By</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @inject('user', 'App\Models\User')
                            @foreach($subcategories as $subcategory)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subcategory->category->name }}</td>
                                <td>{{ $subcategory->name }}</td>
                                <td>{{ $user->find($subcategory->user_id)->name; }}</td>
                                <td>{{ $subcategory->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>
                                    <a href="{{ route('subcategory.edit',$subcategory->slug) }}" class="btn btn-info">Edit </a>
                                    <a href="{{ route('subcategory.delete',$subcategory->slug) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
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
