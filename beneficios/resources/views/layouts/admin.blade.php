
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin | @yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{ asset('admin-style/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin-style/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('admin-style/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset('admin-style/vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin-style/vendors/dropzone/dist/min/dropzone.min.css')}}" rel="stylesheet">
    
    <!-- Data tables -->
    <link href="{{ asset('admin-style/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin-style/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin-style/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin-style/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin-style/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="{{ asset('admin-style/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/angular-toastr/2.1.1/angular-toastr.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css">
    @yield('stylesheet')
    @include('shared.ajax_url')
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- left navigation -->
            @include('shared.left_nav')
            <!-- /left navigation -->

            <!-- top navigation -->
            @include('shared.top_nav')
            <!-- /top navigation -->

            <!-- page content -->
           
            <div class="right_col" role="main">
                
                @if(@session('status') == 'true')
                <div class='row'> 
                    <div class="alert alert-success alert-dismissible " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Hi!</strong>  {{@session('message')}}   
                    </div>
                </div>     
                @endif
                @if(@session('status') == 'false')
                <div class='row'> 
                    <div class="alert alert-error alert-dismissible " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Hi!</strong> {{@session('message')}} 
                    </div>
                </div>     
                @endif
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class='row'> 
                            <div class="alert alert-error alert-dismissible " role="alert">
                                
                                {{$error}} 
                            </div>
                        </div>  
                @endforeach
                @endif
                @yield('content')
            </div>
            
            <!-- /page content -->

            <!-- footer content -->
            @include('shared.footer')
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin-style/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('admin-style/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin-style/vendors/fastclick/lib/fastclick.js')}}"></script>
   
    <!-- NProgress -->
    <script src="{{ asset('admin-style/vendors/nprogress/nprogress.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/dropzone/dist/min/dropzone.min.js')}}"></script>
    
    <!-- validator -->
    <script src="{{ asset('admin-style/vendors/validator/multifield.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/validator/validator.js')}}"></script>
    <!-- morris.js -->
    <script src="{{ asset('admin-style/vendors/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/morris.js/morris.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('admin-style/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('admin-style/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    
    
    <!-- Data Table -->
    <script src="{{ asset('admin-style/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

    <!-- toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- bootstrap-wysiwyg -->
    <script src="{{ asset('admin-style/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
    <script src="{{ asset('admin-style/vendors/google-code-prettify/src/prettify.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('admin-style/build/js/custom.min.js')}}"></script>
    
    <script src="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.js"></script>
    <script src="{{ asset('js/custom.js')}}"></script>
    
    @yield('script')

</body>
</html>
