@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.success_message')

    <div class="row justify-content-center">
        <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-header">
                        @if ($product->thumbnail)
                             <img src="{{$product->thumbnail_path()}}" class="rounded" 
                             style=" float:left; margin-right:15px; " alt="Thumbnail" width="200">
                        @endif
                        <a href="products/{{$product->id}}" style="text-decoration:none; "> <h3>{{ $product->title }}</h3> </a> 
                    </div>

                    <div class="card-body">
                         <p>{!! $product->description !!}</p>
                    </div>

                    
                </div>

                <h5>Category</h5>
                <hr>
                

                

            @foreach ($post->categories as $category)
                <div class="card mb-2">
                    <div class="card-header"> {{ $category->title }} 
                    <div class="card-body">
                        {{ $category->body }}
                    </div>
                </div>
            @endforeach

           
                
        </div>

        <div class="col-md-3">
            <div class="card">
                @foreach ($post->subCategories as $subCategory)
                <div class="card mb-2">
                    <div class="card-header"> {{ $subcategory->title }} 
                    <div class="card-body">
                        {{ $subCategory->description }}
                    </div>
                </div>
               @endforeach
            </div>
        </div>

    </div>
</div>
@endsection
