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
        </div> --}}
        <!-- /.content-header -->

        <!-- Main content -->
        
    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-md-11" style="float:left">
                <h3>Orders</h3> 
                </div>                
                <div class="col-md-1" style="float:right">

                <a href="{{ route('orders.create') }}" class="btn btn-primary">New Order</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="products_table" class="table table-bordered table-striped table-sm">
                  <thead>
                    <tr>
                      <th> ORDER ID</th>
                      <th>STORE ID</th>
                      <th>IMPORT DATE</th>
                      <th>SHIP DATE</th>
                      <th>SOURCE</th>
                      <th>CUSTOMER</th>
                      <th>FULFILMENT COST</th>
                      <th>STATUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  @foreach ($orders as $order)
                    <tr>
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->store_id }}</td>
                      <td>{{ $order->import_date }}</td>
                      <td>{{ $order->ship_date }}</td>
                      <td>{{ $order->source }}</td>
                      <td>{{ $order->user->name }}</td>
                      <td>
                        {{ number_format($order->fulfillment_cost, 2) }}
                      </td>
                      <td>
                        @if($order->status == 1)
                          
                          <span class="badge badge-primary">Created</span>

                        @elseif($order->status == 2)

                        <span class="badge badge-info">Picked</span>
                          
                        @elseif($order->status == 3)
                        <span class="badge badge-dark">Packed</span>
                          
                        @elseif($order->status == 4)
                          
                          <span class="badge badge-warning">Labeled</span>
                          @elseif($order->status == 5)


                            
                          <span class="badge badge-success">Delivered</span>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>

    <!-- DataTables -->
<script src="{{ asset('/plugins') }}/datatables/jquery.dataTables.min.js"></script>
 <script src="{{ asset('/plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

{{-- <script src="{{ asset('assets/') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> --}}
{{-- <script src="{{ asset('assets/') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>  --}}

<!-- page script -->


<script>
  $(function () {
    
    $('#products_table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      fixedHeader: {
        header: false,
        footer: true
    }
    });
      
  });
</script>
@endsection


@section('header_script')
      <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/plugins') }}/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection