@extends('master.admin.master')
@section('body')

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form action="{{route('admin.category.store')}}" method="POST">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <div>
                                <button type="submit" id="btn-save" class="btn btn-primary w-md">Create New Category</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
>
    </div>
@endsection
