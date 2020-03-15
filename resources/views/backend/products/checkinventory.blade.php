@extends('backend.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Warehouse Receiving Orders
                        </h1>
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
                          
            <div class="card">
              <div class="card-header">
                {{-- <div class="col-md-11" style="float:left">Warehouse Receiving Orders
                </div>                 --}}
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
                      <th> WRO ID</th>
                      <th>CREATION DATE</th>
                      <th>FULFILLMENT CENTER</th>
                      <th>WRO SUMMARY</th>
                      <th>RETURN ID</th>
                      <th class="text-center">STATUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($inventories as $inventory)
                    <tr>

                   
                        <td>{{ $inventory->id}}</td>
                        <td>{{ $inventory->created_at->format('m/d/yy')}}</td>
                        <td>{{ ucwords($inventory->send_to_location) }}</td>
                        <td>
                            
                        </td>
                        <td>

                        </td>
                        <td>  
                            @if($inventory->status == 1)
                                <span class="big-badge badge badge-primary">AWAITING ARRIVAL</span>

                            @elseif($inventory->status == 2)
                                <span class="big-badge badge badge-secondary">Partially Arrived</span>
                            @elseif($inventory->status == 3)
                                <span class="big-badge badge badge-dark">Arrived</span>
                            @elseif($inventory->status == 4)
                                <span class="big-badge badge badge-info">Processing</span>
                            @elseif($inventory->status == 5)
                                <span class="big-badge badge badge-success">Received</span>
                            @endif
                        
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
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
<script src="{{ asset('assets/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

 <script src="{{ asset('assets') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('assets') }}/plugins/jquery-validation/additional-methods.min.js"></script>


<script src="{{ asset('assets/') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets/') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> 

<!-- page script -->
<script>
  $(function () {
    
    $('#products_table').DataTable({
      'rowsGroup': [0],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 0, 'desc' ]]

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
    .big-badge{
        padding: 5px 10px
    }
  </style>

 
@endsection