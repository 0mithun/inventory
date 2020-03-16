@extends('backend.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Orders</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        
    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-12">
  
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add New Order</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="col-md-6">
                <form role="form" id="order_form" method="POST" action="{{ route('orders.store') }}">
                        @csrf 
                        <div class="card-body">

                            <div class="form-group">
                                <label for="order_type">Order Type</label>
                                <select name="order_type" id="order_type" class="form-control">
                                    <option value="">Select Order Type</option>
                                    <option value="consumer">Consumer</option>
                                    <option value="business">Business</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="order_type" class="">Receipent Name</label>
                                    <div class="form-group">
                                        <select name="receipt_name" id="receipt_name" class="form-control" >
                                    </div>
                                </select>
                            </div>

                            <div>
                                <div class="row">
                                       <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address" class="">Address</label>
                                            <textarea name="address" id="address" cols="30" rows="2" class="form-control"></textarea>
                                        </div>
                                       </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" id="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" name="city" id="city" class="form-control">
                                        </div>
                                    </div> 
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" name="state" id="state" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zip_code">Zip Code</label>
                                            <input type="text" name="zip_code" id="zip_code" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" name="country" id="country" class="form-control">
                                        </div>
                                    </div>
                                </div>                             
                               
                                
                                
                                
                            </div>

                        </div>


                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:20%">Babaforwarding ID</th>
                                        <th>ITEM NAME</th>
                                        <th style="width:30%">QUANTITY</th>
                                    </tr>
                                </thead>
                                <tbody class="product_list">
                                    <tr class="single_product">
                                        <td>
                                            <h4 id="product_id"></h4>
                                        </td>
                                        <td>
                                            <div class="form-group" style="margin-bottom:0px">
                                                <select name="product_name" id="product_name"  class="form-cotrol product_name" style="width:100%"></select>
                                            </div>
                                                
                                        </td>
                                        <td>
                                            <div class="form-group"  style="margin-bottom:0px">
                                                <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control">
                                            </div>
                                            
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <br>
                            {{-- <div class="form-group">
                                <button class="btn-default btn float-right" type="button" id="add_new_items">Add New</button>
                            </div> --}}
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                </div>
              </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>

      <!-- /.content -->
        <!-- /.content -->
    </div>
@endsection


@section('footer_script')


<script src="{{ asset('/plugins') }}/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('/plugins') }}/jquery-validation/additional-methods.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<!-- page script -->
<script>
    $(document).ready(function() {
        $('#receipt_name').select2({
            placeholder: 'Select an item',
            ajax: {
            url: '/get-all-user',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
            }

        });

        $('#receipt_name').change(function(){
            let user_id = $(this).val();

            $.ajax({
                type: "POST",
                url: "/get-user",
                data: {
                    id:user_id
                },
                success: function(res){
                    $('#email').val(res.email);
                    $('#phone').val(res.phone);
                    $('#address').val(res.address);
                    $('#city').val(res.city);
                    $('#state').val(res.state);
                    $('#zip_code').val(res.zip_code);
                    $('#country').val(res.country);
                },
                dataType: 'json',
            });
        });


        $('#product_name').select2({
            placeholder: 'Select a product',
            ajax: {
            url: '/get-all-product-by-search/',
            // /get-all-product/'+search
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
            }

        });


        $('.product_name').change(function(){
            let product_id = $(this).val();

            $.ajax({
                type: "POST",
                url: "/get-product",
                data: {
                    id:product_id
                },
                success: function(res){
                        $('#product_id').text(res.id)
                },
                dataType: 'json',
            });
        });

        // $('#add_new_items').click(function(){
        //     var content = '<tr>';
        //         content += '<td><h4 id="product_id"></h4></td>';
        //         content += '<td><select name="product_name" id="product_name"  class="form-cotrol product_name" style="width:100%"></select></td>';
        //         content += '<td><input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control"></td>';
        //         content += '</tr>';

        //     $('.product_list').append(content);
        // });
        
    });

 
</script>

<script type="text/javascript">
    $(document).ready(function () {
    //   $.validator.setDefaults({
    //     submitHandler: function () {
    //       alert( "Form successful submitted!" );
    //     }
    //   });
      $('#order_form').validate({
        rules: {
            receipt_name:{
                required:true
            },
          email: {
            required: true,
            email: true,
          },

          order_type:{
            required:true
          },
          city:{
            required:true
          },
          state:{
            required:true
          },
          zip_code:{
            required:true
          },
          phone:{
            required:true
          },
          country:{
            required:true
          },

          address:{
              required:true
          },
          product_name:{
              required:true
          },
          quantity:{
              required:true,
              min:1
          }
        },
        messages: {
            address:{
                required:"Please enter address"
            },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
@endsection


@section('header_script')

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<style>
.select2-container{
         width: 100%;
    }
</style>
@endsection