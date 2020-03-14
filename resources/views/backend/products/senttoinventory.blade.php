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
              
              <!-- /.card-header -->
              <div class="card-body">
                  <send-inventory></send-inventory>
                    
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

 <script src="{{ asset('assets') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('assets') }}/plugins/jquery-validation/additional-methods.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> --}}

{{-- <script src="{{ asset('assets/') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> --}}
{{-- <script src="{{ asset('assets/') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>  --}}

<!-- page script -->
<script>
  

  $(document).ready(function(){

    // $('#product_name').select2({
    //       placeholder: 'Select a product',
    //       ajax: {
    //       url: '/get-all-product',
    //       dataType: 'json',
    //       delay: 250,
    //       processResults: function (data) {
    //           return {
    //           results:  $.map(data, function (item) {
    //                   return {
    //                       text: item.name,
    //                       id: item.id
    //                   }
    //               })
    //           };
    //       },
    //       cache: true
    //       }

    // });

    // $('.product_name').change(function(){
    //     let product_id = $(this).val();
    //     $('.search_product_table').css('display','none');
    //     $.ajax({
    //         type: "POST",
    //         url: "/get-product",
    //         data: {
    //             id:product_id
    //         },
    //         success: function(res){
    //                 //$('#product_id').text(res.id)
              
    //                 console.log(res)
    //           $('.search_product_id').text(res.id);
    //           $('.search_product_name').text(res.name);
    //           $('.search_product_sku').text(res.sku);
    //           $('.search_product_platform').text(res.platform);
    //           $('.search_product_lot').text(res.lot);
    //           $('.search_product_expration_date').text();
    //           // let button  = '<button class="btn btn-default">Remove</button>';
    //           // $('.search_product_action').html(button);

    //           $('.search_product_table').css('display','block');
    //         },
    //         dataType: 'json',
    //     });
    // });


    // $('input[type=radio][name=shipping_type]').change(function() {
    //   if (this.value == 'parcel') {
          
    //       $('.less_than_truckload_radio').css('display','none');
    //       $('.floor_loaded_container_radio').css('display','none');
    //       $('.parcel_radio').css('display','block');
    //       // less_than_truckload_radio
    //       // floor_loaded_container_radio
    //   }
    //   else if (this.value == 'less_than_truckload') {
    //       $('.parcel_radio').css('display','none');
          
    //       $('.floor_loaded_container_radio').css('display','none');
    //       $('.less_than_truckload_radio').css('display','block');
    //   }

    //   else if (this.value == 'floor_loaded_container') {
    //       $('.parcel_radio').css('display','none');
    //       $('.less_than_truckload_radio').css('display','none');
    //       $('.floor_loaded_container_radio').css('display','block');
    //   }
    // });

  });
</script>
@endsection


@section('header_script')
      <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('assets/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
  {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" /> --}}

  <style>
    form{
      display: inline;
    }
  </style>

 
@endsection