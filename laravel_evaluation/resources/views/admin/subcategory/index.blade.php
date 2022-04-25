@extends('master.admin.master')
@section('body')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Sub Categories</h2>
            </div>

            <div class="card-body">
                <div class="col-md-12">
                    <table class="table" id="">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">SubCategory</th>
                            <th scope="col">Category </th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($subcategories as $subcategory)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$subcategory->title}}</td>
                                <td>{{$subcategory->category->title}}</td>
                                <td>
                                    <a href="{{route('admin.subcategory.edit', ['id' => $subcategory->id])}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('admin.subcategory.delete', ['id' => $subcategory->id])}}" class="btn btn-danger btn-sm">
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
