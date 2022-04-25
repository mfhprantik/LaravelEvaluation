@extends('master.admin.master')
@section('body')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Categories</h2>
            </div>

            <div class="card-body">
                <div class="col-md-12">
                    <table class="table" id="">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Title</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->title}}</td>
                                <td>
                                    <a href="{{route('admin.category.edit', ['id' => $category->id])}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('admin.category.delete', ['id' => $category->id])}}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
