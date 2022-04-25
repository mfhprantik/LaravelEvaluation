@extends('layouts.app')

@section('content')

 <meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Product Create  (mosharaf111hossain@gmail.com)') }}
                    {{--for ajax   modal are created--}}
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                        Add New Product
                    </button>
                    <div class="card-body">

                        @include('partials.success_message')
    
                        <table class="table table-bordered table-hover table-striped">
                            {{-- ajax code to show inseted data and delete but skipped --}}
                            {{-- <tr>
                                <th>#ID</th>
                                <th>Thumnail</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Created At</th>
                               
                                <th>Action</th>
    
                            </tr> --}}
                            {{-- <tr>
                                <td>1</td>
                                <td>Image</td>
                                <td>Title</td>
                                <td>Description</td>
                                <td>Price</td>
                                <td>Created At</td>
                                <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr> --}}
                        </table>
                    </div>

                </div>

                <div class="card-body">
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <div class="modal-body">
                                <div id="validation_mesg" class="alert" role="alert">
                                     
                                  </div>
                               <form action="" id="product_add" >
                                  
                                {{-- @csrf --}}
                               

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
                                    <label for="description">Product description</label>
                                    <input type="text" id="decription1" name="description"  class="form-control @error('description') is-invalid @enderror"  placeholder="Product description">
                                    @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                {{-- Categories skipped --}}

                                {{-- <div class="form-group">
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
            
                                </div> --}}

                                {{-- subCategories --}}

                                <div class="form-group">
                                    <label for="subcategory_id">Product Sub Category</label>
            
                                    <select id="subcategory_id" type="text" class="form-control @error('subcategory_id') is-invalid @enderror" 
                                    name="subcategory_id" placeholder="Product Sub category">
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


                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save Product</button>
                            </div>

                         </form>
                       </div>
                    </div>
                </div>
                    {{-- end of file ajax code --}}

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
                            <textarea id="description"  
                            id="description"
                            class="form-control @error('description') is-invalid @enderror" 
                            name="description" placeholder="description" rows="15">
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
@section('script')
<script>

    ClassicEditor
            .create( document.querySelector( '#description' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );

//// ajax code  below

// $(function(){
//         // alert("Hello");
//         $('#product_add').submit(function(e){
//             e.preventDefault();

//             // var title = $('input[name="title"]').val();
//             // console.log(title );

//             // console.log( $('#product_add').serialize() );

//             var form_data =  $('#product_add').serialize();        

//             $.ajax({
//                 url:"/products",
//                 method:'POST',
//                 data: form_data,
//                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//                 success:function(res){
//                     // console.log(res,"success");
//                     if(!res.status)
//                     {
//                         $('#validation_mesg').addClass('alert-danger').show().html(res.message);
//                     }else{
//                         $('#validation_mesg').addClass('alert-success').show().html(res.message);
//                     }
//                     hide_alert();
//                 },
//                 error:function(res){
//                     console.log(res);

//                 }
//             });
//         });
//         // ///////
//     function hide_alert(){
//         setTimeout(() => {
//             $('.alert').removeClass('alert-danger').removeClass('alert-success').fadeOut();
//         }, 3000);
//     }

// });


</script>
@endsection

@endsection