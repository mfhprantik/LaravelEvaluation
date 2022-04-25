@extends('admin.layout.app')

@section('admin_content')
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                   <h2 class="text-center">All Product</h2>
                    <table class="table table table-dark table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">sub category</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->title}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->subcategory_id}}</td>
                                <td><a class="btn btn-sm btn-danger"  href="{{route('destroy', $item->id)}}">delete</a></td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                        
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
