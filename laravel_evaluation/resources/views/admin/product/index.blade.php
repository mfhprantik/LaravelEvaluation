@extends('master.admin.master')
@section('body')

    <div class="col-md-12 card-header">
    <div class="col-md-12 mt-1 mb-2"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct">
            Add Product
        </button></div>
    <div id="success_message"></div>
    <div class="col-md-12">
        <table class="table" id="product_table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Title</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <tbody>

            </tbody>
        </table>
    </div>
    </div>
    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="productForm" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-mobile-input" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" class="form-control" id="horizontal-mobile-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-address-input" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-address-input" class="col-sm-3 col-form-label" >Select Category</label>
                            <div class="col-sm-9">
                                <label class="form-control-label"> Category: <span class="tx-danger">*</span></label>
                                <select class="form-control"  data-placeholder="Choose Category" name="category_id" required>
                                    <option selected> Choose a Category</option>
                                    @foreach ($category as $row)

                                        <option value="{{$row->id}}"> {{$row->title}} </option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-address-input" class="col-sm-3 col-form-label">Select Category</label>
                            <div class="col-sm-9">
                                <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                                <select class="form-control" data-placeholder="Choose SubCategory" name="subcategory_id" required>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="thumbnail" class="form-control-file" accept="image/*"/>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" id="btn-save" class="btn btn-primary add-product w-md">Create New Product</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


<script type="text/javascript">

    $(document).ready(function(){

        fetchproduct();

        function fetchproduct() {
            $.ajax({
                type: "GET",
                url: "/admin/fetch-products",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.products, function (key, item) {
                        var html = '<tr>'+
                            '<td>' + item.id + '</td>' +
                            '<td>' + item.title + '</td>' +
                            '<td>' + '<img src ="/uploads/productFiles/'+item.thumbnail+'" height="100" />' + '</td>' +
                            '<td>' + item.price + '</td>' +
                            '<td>' + '<button type="button" id=" '+ item.id +' " class="btn btn-danger delete">Delete </button>' + '</td>' +
                            '</tr>';

                        $('tbody').append(html);
                    });
                }
            });
        }

        $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            if (category_id) {

                $.ajax({
                    url: "{{ url('admin/get/subcategory/') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){

                            $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.title + '</option>');
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#productForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type:'POST',
                url: "{{ route('admin.product.add')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#addProduct").modal('hide');
                    $('#productForm').trigger('reset');
                    $('select[name="subcategory_id"]').val("");
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    fetchproduct();
                },
                error: function(data){
                    console.log(data);
                }
            });
        });


        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.product.delete') }}',
                        method: 'delete',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response);
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            fetchproduct();
                        }
                    });
                }
            })
        });

        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );


        });

</script>


