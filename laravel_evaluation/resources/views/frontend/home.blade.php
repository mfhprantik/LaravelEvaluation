@extends('master.frontend.master')

@section('content')

    <section class="py-5">
        <div class="container">

            <form class="form-row" action="{{route('search.product')}}" method="get">
                <div class="row">
                    <div class="col-6 col-sm-2">
                        <input type="text" name="title" class="form-control" placeholder="Enter Title">

                    </div>

                    <div class="col-6 col-sm-2">
                        <select class="form-select" aria-label="Default select example" name="category" id="category">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option class="option" value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6 col-sm-2">

                        <select class="form-select" aria-label="Default select example" name="sub_category" id="sub_category">
                            <option value="">Select Sub Category</option>
                            @foreach($subCategories as $subcategory)
                                <option class="option" value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-6 col-sm-2">
                        <select class="form-select" aria-label="Default select example" name="price" id="status">
                            <option value="">Select Price Range</option>
                            <option value="100">0-100</option>
                            <option value="300">100-300</option>
                            <option value="500">300-500</option>
                            <option value="1000">500-1000</option>
                        </select>

                    </div>

                    <div class="col-6 col-sm-2">
                            <button type="submit" id="btn-save" class="btn btn-primary w-md">Search</button>
                              <a class="btn btn-warning" href="{{route('homepage')}}">Reset</a>
                    </div>


                    </div>

            </form>
        </div>



                <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    @if(isset($productsFilter))
                        @foreach($productsFilter as $product)
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" src="{{asset('uploads/productFiles/'.$product->thumbnail)}}"
                                         alt="..."/>
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{$product->title}}</h5>
                                            <!-- Product price-->
                                            {{$product->price}}
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View
                                                options</a></div>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    @else

                        @foreach($products as $product)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{asset('uploads/productFiles/'.$product->thumbnail)}}"
                                     alt="..."/>
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$product->title}}</h5>
                                        <!-- Product price-->
                                        {{$product->price}}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View
                                            options</a></div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                    @endif

                </div>
            </div>

        </div>
    </section>

@endsection
