<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name')  }} | {{ $pageName  }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('backend.partials.header')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css">
    <style>
    .noty_theme__mint.noty_type__success{
        background: green
    }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" id="app">

    @include('backend.partials.navbar')
    @include('backend.partials.sidebar')

        @yield('content')


    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 </strong>
        All rights reserved.
    </footer>

</div>
<!-- ./wrapper -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
    <script>
        @if(session()->has('succes'))
            new Noty({
                type: 'success',
                layout: 'topRight',
                text: "{{ session('succes') }}"
            }).show();
    
        @endif            
    </script>
    @include('backend.partials.footer') 

      
</body>
</html>
