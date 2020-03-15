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

                  

                  {{-- <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#add_product_modal ">Add Products</button> --}}
                </div>
              </div>


            <!-- Modal -->
            <div class="modal fade" id="showInventoryStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title inventory_status_title" id="exampleModalLabel" ></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">

                                    <div class="row summary">
                                        <h5>Order Status</h5>
                                    </div>

                                    <div class="progress inventory-status">
                                        {{-- <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div> --}}
                                    </div>

                                    

                                      <br>



                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Shipping details:
                                            </h5>
                                            <div class="send_to_location">
                                                Grapevine (TX)<br>

                                            4051 Freeport Parkway <br>

                                            Suite 300 <br>

                                            Grapevine, TX 76051 <br>

                                            Phone: (844) 474-4726 <br>

                                            Email: support@shipbob.com
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6">

                                            Shipping Type: <span class="shipping_type"></span>  <br>

                                            # Of Boxes: <span class="quantity_of_box"></span>  <br>
 
                                            Configuration: <span class="inventory_configure"></span>  <br>

                                            Labels: Send On Own  <br>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table  class="table table-bordered table-striped table-sm" style="font-size:14px">
                                                <thead>
                                                    <tr>
                                                        <th>PRODUCT ID</th>
                                                        <th>PRODUCT NAME</th>
                                                        <th>SKU</th>
                                                        <th>QUANTITY SENT</th>
                                                        <th>QUANTITY UNPACKED</th>
                                                        				
                                                    </tr>
                                                </thead >
                                                   <tbody class="product-details">
                                                    
                                                   </tbody>
                                            </table>

                                            @if(auth()->user()->is_admin)

                                            <form action="{{ route('inventory.update.status' ) }}" method="POST">

                                                @csrf
                                                <input type="hidden" name="inventory_id" value="" class="inventory_send_id">

                                                <div class="form-group">
                                                    <label for="status" class="control-label">Change Status</label>
                                                    <select name="status" id="inventory_send_status" class="form-control">
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
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

                   
                        <td class="text-center">{{ $inventory->id}}</td>
                        <td class="text-center">{{ $inventory->created_at->format('m/d/yy')}}</td>
                        <td class="text-center">{{ ucwords($inventory->send_to_location) }}</td>
                        <td class="text-center">
                            <button class="btn btn-primary" onclick="showInventorySatus({{ $inventory->id }})">
                                View
                            </button>
                        </td>
                        <td class="text-center">

                        </td>
                        <td class="text-center">  
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
<script src="{{ asset('/plugins') }}/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

 <script src="{{ asset('/plugins') }}/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('/plugins') }}/jquery-validation/additional-methods.min.js"></script>


<script src="{{ asset('/plugins') }}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/plugins') }}/datatables-responsive/js/responsive.bootstrap4.min.js"></script> 

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
  function showInventorySatus(inventoryId){
    $.ajax({
        type: "get",
        url: '/get-inventory/'+inventoryId,
        success: function(res){

               var inventory = res.inventory;
               var inventory_details = res.inventory_details;

                
                $('.send_to_location').text(inventory.send_to_location);
                $('.shipping_type').text(inventory.shipping_type);
                $('.inventory_configure').text(inventory.inventory_configure);

                var quantity = 0;
                var html = '';
                for(var i = 0; i < inventory_details.length; i++){
                    quantity += inventory_details[i].quantity_of_box;

                    html += '<tr>';

                    html += '<td class="text-center">'+inventory_details[i].id+'</td>';
                    html += '<td class="text-center">'+inventory_details[i].product.name+'</td>';
                    html += '<td class="text-center">'+inventory_details[i].product.sku+'</td>';
                    html += '<td class="text-center">'+inventory_details[i].quantity_to_send+'</td>';
                    html += '<td class="text-center">'+''+'</td>';

                    html += '</tr>';

                }

                
                $('.quantity_of_box').text(quantity);                
                $('.product-details').html(html)


                var options = [
                    'AWAITING ARRIVAL','Partially Arrived','Arrived','Processing','Received'
                ]

                var option = '';

                for(var i =0;i<5;i++){

                    if(inventory.status == (i+1)){
                        option += '<option value="'+(i+1)+'" selected>'+options[i]+'</option>';
                    }else{
                        option += '<option value="'+(i+1)+'">'+options[i]+'</option>';
                    }
                    
                }
                var progress  = ''
                if(inventory.status == 1){
                    progress = '<div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">AWAITING ARRIVAL</div>';
                }
                else if(inventory.status == 2){
                    progress = '<div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">AWAITING ARRIVAL</div>';
                    progress += '<div class="progress-bar bg-secondary" role="progressbar" style="width: 20%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Partially Arrived</div>';
                }
                else if(inventory.status == 3){
                    progress = '<div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">AWAITING ARRIVAL</div>';
                    progress += '<div class="progress-bar bg-secondary" role="progressbar" style="width: 20%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Partially Arrived</div>';
                    progress += '<div class="progress-bar bg-dark" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Arrived</div>';
                }
                else if(inventory.status == 4){
                    progress = '<div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">AWAITING ARRIVAL</div>';
                    progress += '<div class="progress-bar bg-secondary" role="progressbar" style="width: 20%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Partially Arrived</div>';
                    progress += '<div class="progress-bar bg-dark" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Arrived</div>';
                    progress += '<div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Processing</div>';
                }
                else if(inventory.status == 5){
                    progress = '<div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">AWAITING ARRIVAL</div>';
                    progress += '<div class="progress-bar bg-secondary" role="progressbar" style="width: 20%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Partially Arrived</div>';
                    progress += '<div class="progress-bar bg-dark" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Arrived</div>';
                    progress += '<div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Processing</div>';
                    progress += '<div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Received</div>';
                }

                $('.inventory-status').html(progress)

                $('.inventory_status_title').text('Warehouse Receiving Order #'+inventory.id)
                $('.inventory_send_id').val(inventory.id)
                $('#inventory_send_status').html(option);
                $('#showInventoryStatus').modal();
        },
        dataType: 'json',
    });
    //$('#showInventoryStatus').modal();
  }
</script>
@endsection


@section('header_script')
      <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/plugins') }}/datatables-responsive/css/responsive.bootstrap4.min.css">
  

  <style>
    form{
      display: inline;
    }
    .big-badge{
        padding: 5px 10px
    }
  </style>

 
@endsection