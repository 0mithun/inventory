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
  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="products_table" class="table table-bordered table-striped">
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
                      <td>{{ $order->customer->name }}</td>
                      <td>{{ $order->fulfilment_cost }}</td>
                      <td>{{ $order->status }}</td>
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
  <link rel="stylesheet" href="{{ asset('assets/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('assets/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection