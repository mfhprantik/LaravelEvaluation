@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">

            @foreach ($products as $product)
                <div class="card mb-4">
                    <div class="card-header">
                        @if ($product->thumbnail)
                             <img src="{{$product->thumbnail_path()}}" class="rounded-circle" 
                             style=" float:left; margin-right:15px; " alt="Thumbnail" width="60">
                        @endif
                        <a href="product/{{$product->id}}" style="text-decoration:none; "> <h3>{{ $product->title }}</h3> </a> 
                    </div>
                    <div class="card-body">
                         <p>{!! $product->description !!}</p>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Sub Categories Lists 
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($subCategories as $subCategory)
                            <li class="list-group-item"> 
                                <a href="/products/{{$subCategory->id}}/category">{{ $subCategory->title }} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
