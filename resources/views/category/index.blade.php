@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header mb-2">
                    <div  class="header-dropdown">
                            <a href="{{ route('category.create')}}"
                                class="btn btn-info mr-2 d-flex justify-content-center align-items-center">
                                <i class="icon-plus mr-2 text-white"></i> Create New Main Category</a>
                    </div>
                </div>

                <h2>Main Category List</h2>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable table-responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Created By</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @inject('user', 'App\Models\User')
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $user->find($category->user_id)->name;}}</td>
                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $category->slug) }}" class="btn btn-info">
                                        <i class="icon-pencil">Edit</i>
                                    </a>
                                    <a href="{{ route('delete', $category->slug) }}" class="btn btn-danger button" data-id="{{$category->id}}">Delete</a>
                                    {{-- <a href="{{ route('category.delete', $category->slug) }}"id="categotydelte" class="btn btn-danger">
                                        <i class="icon-trash">Delete</i>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </a> --}}
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
    $(document).on('click', '.button', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    console.log(id);
    swal({
            title: "Are you sure!",
            type: "sure",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        },
        function() {
            $.ajax({
                type: "POST",
                url: "{{url('/category/destroy')}}",
                data: {id:id},
                success: function (data) {
                              //
                    }
            });
    });
});
@endsection
