@extends('backend.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{-- <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Products</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header --> --}}

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
                <div class="col-md-11" style="float:left">

                  <h3>
                    Products
                  </h3>
                  

                </div>                
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
                
                <table id="products_table" class="table table-bordered table-striped table-sm" style="font-size:14px">
                  <thead>
                    <tr>
                      <th> ID</th>
                      <th>NAME</th>
                      <th>SKU</th>
                      <th>ON HAND</th>
                      <th>PLATFORM</th>
                      <th>CHI ON HAND</th>
                      <th>DAL ON HAND</th>
                      <th>PA ON HAND</th>
                      <th>MORE ON HAND</th>
                      <th>LOT PRODUCT</th>
                      <th>DANGEROUS GOODS</th>
                      <th class="text-center">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  @foreach ($products as $product)
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->sku }}</td>
                      <td>{{ $product->on_hand }}</td>
                      <td>{{ $product->platform }}</td>
                      <td>{{ $product->chi_on_hand }}</td>
                      <td>{{ $product->dal_on_hand }}</td>
                      <td>{{ $product->pa_on_hand }}</td>
                      <td>{{ $product->more_on_hand }}</td>
                      <td>
                      
                        {{ $product->lot ? 'YES': 'NO'}}
                      
                      </td>
                      <td>{{ $product->dangerous ? 'YES': 'NO' }}</td>
                      <td>
                          @php 

                            $user = auth()->user();
                          @endphp
                        @if($product->active)
                            <form action="{{ route('products.update', $product->id) }}" method="POST">
                              @csrf 
                              @method('PUT')
                                <input type="hidden" name="active" value="0">
                                <button class="btn btn-danger btn-xs" type="submit">
                                  Inactive
                                </button>
                            </form>
                            
                          @else 
                          <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf 
                            @method('PUT')
                              <input type="hidden" name="active" value="1">
                              <button class="btn btn-success btn-xs" type="submit">
                                Active
                              </button>
                          </form>
                          @endif

                          |
                          @if($product->digital)
                            <form action="{{ route('products.update', $product->id) }}" method="POST">
                              @csrf 
                              @method('PUT')
                                <input type="hidden" name="digital" value="0">
                                <button class="btn btn-danger btn-xs" type="submit">
                                  Not Digital
                                </button>
                            </form>
                            
                          @else 
                          <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf 
                            @method('PUT')
                              <input type="hidden" name="digital" value="1">
                              <button class="btn btn-success btn-xs" type="submit">
                                Digital
                              </button>
                          </form>
                          @endif

                          |
                          @if($product->dangerous)
                            <form action="{{ route('products.update', $product->id) }}" method="POST">
                              @csrf 
                              @method('PUT')
                                <input type="hidden" name="dangerous" value="0">
                                <button class="btn btn-info btn-xs" type="submit">
                                  Not Dangerous
                                </button>
                            </form>
                            
                          @else 
                          <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf 
                            @method('PUT')
                              <input type="hidden" name="dangerous" value="1">
                              <button class="btn btn-warning btn-xs" type="submit">
                                Dangerous
                              </button>
                          </form>
                          @endif

                          |
                          @if($product->lot)
                            <form action="{{ route('products.update', $product->id) }}" method="POST">
                              @csrf 
                              @method('PUT')
                                <input type="hidden" name="lot" value="0">
                                <button class="btn btn-danger btn-xs" type="submit">
                                  Not Lot
                                </button>
                            </form>
                            
                          @else 
                          <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf 
                            @method('PUT')
                              <input type="hidden" name="lot" value="1">
                              <button class="btn btn-success btn-xs" type="submit">
                                Lot
                              </button>
                          </form>
                          @endif



                          {{-- <button class="btn btn-info">Digital</button>
                          <button class="btn btn-primary">Dangerous</button>
                          <button class="btn btn-success">Lot</button> --}}
                      </td>
                    </tr>
                  @endforeach
                  
                  </tfoot>
                </table>
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
<script src="{{ asset('plugins/') }}/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('plugins/') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

 <script src="{{ asset('plugins') }}/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('plugins') }}/jquery-validation/additional-methods.min.js"></script>


<script src="{{ asset('plugins/') }}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('plugins/') }}/datatables-responsive/js/responsive.bootstrap4.min.js"></script> 

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
  <link rel="stylesheet" href="{{ asset('plugins/') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('plugins/') }}/datatables-responsive/css/responsive.bootstrap4.min.css">
  

  <style>
    form{
      display: inline;
    }
  </style>

 
@endsection