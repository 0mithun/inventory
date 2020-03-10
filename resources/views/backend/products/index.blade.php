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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="products_table" class="table table-bordered table-striped">
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