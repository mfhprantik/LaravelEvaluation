@extends('master.admin.master')
@section('body')

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.subcategory.store')}}">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sub Category Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-address-input" class="col-sm-3 col-form-label">Select Category</label>
                        <div class="col-sm-9">
                            <select class="form-select" aria-label="Default select example" name="category_id">
                                <option selected>Select a Category</option>
                                @foreach ($categories as $row)
                                <option value="{{$row->id}}">{{$row->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <div>
                                <button type="submit" id="btn-save" class="btn btn-primary w-md">Create New Sub Category</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        >
    </div>
@endsection
