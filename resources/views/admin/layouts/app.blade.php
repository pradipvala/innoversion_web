<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Coderthemes" />
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="#" />
    

    <title>@stack('url_title') | {{ env('APP_NAME') }}</title>

    <!--Morris Chart CSS -->
    
     <link rel="stylesheet" type="text/css" href="{{ asset('admin_theme/assets/css/buttons.dataTables.min.css') }}" />
    
    
    <link href="{{ asset('admin_theme/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_theme/assets/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_theme/assets/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_theme/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_theme/assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_theme/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />c
    <link href="{{ asset('admin_theme/assets/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_theme/assets/css/custom.css') }}" rel="stylesheet" />

    
    {{-- form-validationv css --}}
    <link rel="stylesheet" href="{{ asset('admin_theme/assets/css/form-validation.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin_theme/assets/css/font-awesome.min.css') }}" />
    
    {{-- end form-validation css --}}
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_theme/assets/plugins/summernote/dist/summernote.css') }}" />

        <link rel="stylesheet" type="text/css" href="{{ asset('admin_theme/assets/css/toastr.css') }}" />

    <link href="{{ asset('admin_theme/assets/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_theme/assets/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_theme/assets/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_theme/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('admin_theme/assets/plugins/dropzone/dropzone.min.css') }}" />
    <link href="{{ asset('admin_theme/assets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css" />

    <!-- timepicker -->
    <link href="{{ asset('admin_theme/assets/plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" />

    <style>
        .ck-editor__editable {
            min-height: 100px;
            /* Set the minimum height as per your requirement */
            min-width: 100%;
            /* Set the minimum width as per your requirement */
        }
    </style>

    @stack('css')

    

    
</head>

<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        @include('admin.shared.header')
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.shared.sidebar')

        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">@yield('title')</h4>
                            @yield('breadcrumbs')
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <div>
                                    <section>
                                        <h4 class=""></h4>
                                        @stack('content')
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

        <!-- Right Sidebar -->
        <!-- @include('admin.shared.footer') -->
        <!-- /Right-bar -->
        <footer class="footer text-right">
            © {{ Carbon\Carbon::now()->format('Y') }} . All rights reserved.
        </footer>
    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{ asset('admin_theme/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/js/detect.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/js/fastclick.js') }}"></script>

    <script src="{{ asset('admin_theme/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/js/waves.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/js/jquery.scrollTo.min.js') }}"></script>

    <script src="{{ asset('admin_theme/assets/js/toastr.min.js') }}"></script>

    <script src="{{ asset('admin_theme/assets/plugins/peity/jquery.peity.min.js') }}"></script>
    

    <!-- jQuery  -->
    <script src="{{ asset('admin_theme/assets/plugins/waypoints/lib/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/plugins/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
    {{-- form validation js --}}
    <script src="{{ asset('admin_theme/assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/js/jquery.validate.min.js') }}"></script>
    {{-- end form validation js --}}
    <script src="{{ asset('admin_theme/assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/js/jquery.app.js') }}"></script>
    <script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>

    {{-- SweetAlert --}}
    <script src="{{ asset('admin_theme/assets/js/sweetalert2@9.js') }}"></script>
    {{-- Custom --}}
    <script src="{{ asset('admin_theme/assets/js/custom.js') }}"></script>

    <script src="{{ asset('admin_theme/assets/js/bootbox.min.js') }}"></script>

    <script src="{{ asset('admin_theme/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/js/dropify.min.js') }}"></script>

    <script src="{{ asset('admin_theme/assets/plugins/summernote/dist/summernote.min.js') }}"></script>

    <script src="{{ asset('admin_theme/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
    </script>
    <script src="{{ asset('admin_theme/assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js') }}"
        type="text/javascript"></script>

    <script src="{{ asset('admin_theme/assets/plugins/select2/select2.min.js') }}" type="text/javascript"></script>

    <!-- timepicker  JS-->
    <script src="{{ asset('admin_theme/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin_theme/assets/js/buttons.print.min.js') }}"></script>
     

    <script type="text/javascript" src="{{ asset('admin_theme/assets/js/jszip.min.js') }}"></script>

    <script src="{{ asset('admin_theme/assets/js/modernizr.min.js') }}"></script>

    <script src="{{ asset('admin_theme/assets/js/index.umd.js') }}"></script>

    @stack('js')

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".counter").counterUp({
                delay: 100,
                time: 1200,
            });

            $(".knob").knob();
        });
    </script>
</body>

</html>
