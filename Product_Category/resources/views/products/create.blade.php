@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Create  (mosharaf111hossain@gmail.com)') }}</div>
                <div class="card-body">

                    <form action="/products" method="post" enctype="multipart/form-data">
                        @csrf
                        

                        <div class="form-group">
                            <label for="title">Product Title</label>
                            <input type="text" name="title"  class="form-control @error('title') is-invalid @enderror"  placeholder="Product Name">
                            @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description"  class="form-control @error('description') is-invalid @enderror" 
                            name="description" placeholder="description" rows="7">
                            </textarea>
                            @error('description')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">Product Category</label>

                            <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="category_id" placeholder="Product category">
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                  <option value="{{ $category->id }}"> {{ $category->title }} </option>
                                @endforeach
                            </select>

                            @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        {{-- subCategories --}}
                        <div class="form-group">
                            <label for="subcategory_id">Product Sub Category</label>

                            <select id="subcategory_id" type="text" class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id" placeholder="Product Sub category">
                                <option value="">Select a Category</option>
                                @foreach ($subCategories as $subCategory)
                                  <option value="{{ $subCategory->id }}"> {{ $subCategory->title }} </option>
                                @endforeach
                            </select>

                            @error('subcategory_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Product Price</label>
                            <input type="text" name="price"  class="form-control @error('price') is-invalid @enderror"  placeholder="Product Price">
                            @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input id="thumbnail" type="file" name="thumbnail"  class="form-control @error('thumbnail') is-invalid @enderror " 
                             placeholder="thumbnail" >

                            @error('thumbnail')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                             @enderror
                        </div>
                        

                        <button type="submit" class="btn btn-primary btn-sm" >Create Product</button>
                    </form>

                </div> 

            </div>
        </div>
    </div>
</div>
@endsection