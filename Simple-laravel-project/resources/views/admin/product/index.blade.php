@extends('admin.layout.app')

@section('admin_content')
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-6 ">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center text-danger">Product Infomation</h2>
                    <form action="{{route('product.add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">Product title</label>
                          <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Product description</label>
                          <textarea class="form-control" name="description"> </textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Subcategory Name</label>
                          <input type="text" name="subcategory_id" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Product Price</label>
                          <input type="text" name="price" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">thumbnail</label>
                          <input type="file" name="thumbnail" class="form-control" >
                        </div>
                       <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                       </div>
                      </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
