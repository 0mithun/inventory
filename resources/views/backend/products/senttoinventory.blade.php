@extends('backend.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Products</h1>
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
            <!-- Modal -->
            <div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <form action="{{ route('products.store') }}" method="POST" id="add_product_form">
                      @csrf
                        <input type="hidden" name="platform" value="Manual">
                        <div class="form-group">
                          <label for="name">Name</label>
                              <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="sku">SKU</label>
                              <input type="text" name="sku" id="sku" class="form-control">
                        </div>
                        <div class="form-group">                          
                          <button  class="btn btn-primary" type="submit">Add Product</button>

                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
                          
            <div class="card">
              <div class="card-header">
                <div class="col-md-11" style="float:left">Products</div>                
                <div class="col-md-1" style="float:right">
                  <!-- Small button groups (default and split) -->
                  {{-- <div class="btn-group dropleft">
                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Small button
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Active Product</a>
                      <a class="dropdown-item" href="#">Dective Product</a>
                      <a class="dropdown-item" href="#">Mark As Digital</a>
                      <a class="dropdown-item" href="#">Mark As Not Digital</a>
                      <a class="dropdown-item" href="#">Mark As Dangerous Goods/Not Dangerous Goods</a>
                      <a class="dropdown-item" href="#">Mark As Lot/Not Lot</a>
                    </div>
                  </div> --}}

                  

                  <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#add_product_modal ">Add Products</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <div class="col-md-6">
                        <form action="" method="POST">
                            @csrf 
    
                            <div class="form-group">
                                <label for="send_to">Which ShipBob warehouse are you shipping to?</label>
                                <select name="send_to" id="send_to" class="form-control">
                                    <option value="grapevine">Grapevine (TX)</option>
                                    <option value="cicero">Cicero (IL)</option>
                                    <option value="bethlehem">Bethlehem (PA</option>
                                    <option value="moreno_valley">Moreno Valley (CA)</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="send_to">Search for product(s) you’re sending to ShipBob</label>
                                <select name="send_to" id="send_to" class="form-control">
                                    <option value="grapevine">Grapevine (TX)</option>
                                    
                                </select>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>PRODUCT ID</th>
                                        <th>PRODUCT NAME</th>
                                        <th>PRODUCT SKU</th>
                                        <th>QUANTITY TO SEND</th>
                                        <th>LOT</th>
                                        <th>EXPIRATION DATE	</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>40096</td>
                                        <td>IPS</td>
                                        <td>46464</td>
                                        <td>10</td>
                                        <td>3</td>
                                        <td>2015-05-10</td>
                                        <td>Remove</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="form-group">
                                <h5>How will your inventory arrive to ShipBob's fulfillment center?</h5>
                                <hr>

                                <label for="">Shipping Type</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Parcel (standard shipping)
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Palletized container or LTL (less-than-truckload)
                                    </label>
                                  </div>
                                  <div class="form-check disabled">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" >
                                    <label class="form-check-label" for="exampleRadios3">
                                        Floor loaded container
                                    </label>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="">How is your inventory configured?</label>



                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            One SKU per box<br><small>Each box contains a single SKU</small>                                           
                                        </label>
                                        
                                      </div>
                                      <br>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Multiple SKUs per box <br><small>Each box has 2 or more SKUs</small> 
                                        </label>
                                      </div>
                                </div>

                                <hr>
                                  
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            One SKU per pallet <br><small>Each pallet contains a single SKU</small>
                                        </label>
                                      </div>
                                      <br>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Multiple SKUs per pallet <br><small>Each pallet has 2 or more SKUs</small>
                                        </label>
                                      </div>
    
                                </div>

                                <hr>

                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            One SKU per box <br><small>Each box contains a single SKU</small>
                                        </label>
                                      </div>
                                      <br>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Multiple SKUs per box <br> <small>Each box has 2 or more SKUs</small>
                                        </label>
                                      </div>
                                </div>









                            </div>

                            <div class="form-group">
                                <label for="">
                                    How is your shipment configured?
                                </label>
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT INFORMATION</th>
                                            <th>SHIPMENT QUANTITY</th>
                                            <th>QUANTITY PER BOX</th>
                                            <th>OF BOX</th>
                                            <th>TOTAL QUANTITY</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>40096</td>
                                            <td>IPS</td>
                                            <td>46464</td>
                                            <td>10</td>
                                            <td>3</td>
                                            <td>2015-05-10</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="">Confirm shipping</label>
                                Please address your parcel shipment to:
                                Aquaskin C/O ShipBob, Inc

                                4051 Freeport Parkway

                                Grapevine, TX, 76051

                                Phone:

                                Email: support@shipbob.com

                                <label for="">What is the estimated date of arrival for your shipment?</label>

                                <input type="date" name="">
                            </div>
                            
                            <div class="form-group">
                                <label for="">Review & submit order
                                </label>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        Shipping Details:
                                        Aquaskin C/O ShipBob, Inc
    
                                        4051 Freeport Parkway
    
                                        Grapevine, TX, 76051
    
                                        Phone:
    
                                        Email: support@shipbob.com
                                    </div>
                                    <div class="col-md-6">
                                        Shipping type: Parcel
    
                                        # of boxes: 1
    
                                        Configuration: Single SKU per box
    
                                        Labels: Non-ShipBob Labels
                                    </div>
                                </div>

                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT INFORMATION</th>
                                            <th>SHIPMENT QUANTITY</th>
                                            <th>QUANTITY PER BOX</th>
                                            <th>OF BOX</th>
                                            <th>TOTAL QUANTITY</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>40096</td>
                                            <td>IPS</td>
                                            <td>46464</td>
                                            <td>10</td>
                                            <td>3</td>
                                            <td>2015-05-10</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Receiving Order</button>
                            </div>


                        </form>
                    </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
        <!-- /.content -->
    </div>
@endsection


@section('footer_script')
    <!-- DataTables -->
<script src="{{ asset('assets/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

 <script src="{{ asset('assets') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('assets') }}/plugins/jquery-validation/additional-methods.min.js"></script>


{{-- <script src="{{ asset('assets/') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> --}}
{{-- <script src="{{ asset('assets/') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>  --}}

<!-- page script -->
<script>
  $(function () {
    
    $('#products_table').DataTable({
      'rowsGroup': [0],
      columnDefs: [ {
            orderable: true,
            className: 'select-checkbox',
            targets:   0
        },
        {
            orderable: false,
            className: 'select-checkbox',
            targets:   11
        }
         ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 0, 'desc' ]]

    });


  });

  $(document).ready(function(){
    $('#add_product_form').validate({
        rules: {
          
          name:{
              required:true
          },
          sku:{
              required:true
          },
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
      <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('assets/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  

  <style>
    form{
      display: inline;
    }
  </style>

 
@endsection