@extends('backend.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        {{-- <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol> --}}
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card welcome-card">
                                    <div class="card-body welcome-card-body">
                                        <h3 style="color:#3a4b5e">Welcome aboard the 'Ship!</h3>
                                        <p>On behalf of our entire team, welcome to ShipBob! Our mission is to help e-commerce sellers be more successful online, and we're accomplishing that by providing easy, affordable fulfillment. Please let us know how we can help you!</p>
        
                                        Dhruv Saxena <br>
        
                                        Co-Founder & CEO
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card price-plan-card">
                                    <div class="card-body price-plan">
                                        <h2 class="text-center">Pricing Plans</h2>
                                        <p>ShipBob has a number of pricing options for businesses of all sizes. Tell us a little about your business so we can provide the right one for you.

                                            If you need a custom quote, we'll connect you with our helpful fulfillment specialists right away.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                            {{-- <div class="card">
                                <div class="card-body">

                                </div>
                            </div> --}}
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('header_script')

<style>
    .price-plan {
    background: #2470af;
    color: white;
    font-size: 20px;
    line-height: 40px;
    border-radius: 10px;
    padding: 40px!important;
}


.card.price-plan-card {
    
    border-radius: 10px;
    background: transparent;
    margin-top: 20px
}

.welcome-card{
    border-radius: 10px!important;

}
.welcome-card-body{
    
    font-size: 20px;
    line-height: 40px;
    border-radius: 10px;
    padding: 40px!important;
    color:#737883
}
</style>
    
@endsection