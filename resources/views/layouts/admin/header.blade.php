<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{route('front.dashboard')}}">
    <title>{{isset($title)?print_title($title).' | ':''}}{{ print_title(site_name) }}</title>
    <link href="{{Favicon}}" rel="icon" type="image/x-icon">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <link rel="stylesheet" href="{{asset('assets/admin/css/style.bundle.css')}}">
    <link href="{{asset('assets/admin/css/login-2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/admin/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/admin/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/admin/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/admin/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/admin/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/admin/vendors/general/toastr/build/toastr.css')}}" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/admin/css/skins/header/base/light.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/skins/header/menu/light.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/skins/brand/dark.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/skins/aside/dark.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/custom/datatables/datatables.bundle.css')}}">
    <link rel="stylesheet"
          href="{{asset('assets/admin/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}">
    <link rel="stylesheet"
          href="{{asset('assets/admin/vendors/general/bootstrap-daterangepicker/daterangepicker.css')}}">


    <!--Script World Start from here-->
    <script src="{{asset('assets/admin/vendors/general/jquery/dist/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/general/popper.js/dist/umd/popper.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/general/js-cookie/src/js.cookie.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/general/moment/min/moment.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/general/sticky-js/dist/sticky.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/general/wnumb/wNumb.js')}}" type="text/javascript"></script>
    {{--    <script src="{{asset('assets/admin/js/scripts.bundle.js')}}"></script>--}}
    <script src="{{asset('assets/admin/js/scripts.bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/general/toastr/build/toastr.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
    <script src="{{asset('assets/admin/vendors/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/general/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADwVAs3Cw91cxbvW2cztgbhvDavFI3Pro&libraries=places"></script>
    <script src="{{asset('assets/admin/js/jquery.geocomplete.min.js')}}"></script>
    @yield('h_style')
    @include('general.header_includes')
<!--Script World End from here-->
    <script>
        let KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };
    </script>
    <style>
        .error {
            color: red;
        }

        .toast-title {
            color: white !important;
        }

        .logo_new_style {
            width:60%;
            margin-top: 0px;
        }
        .admin_logo_size {
            max-width: 300px;
            max-height: 100px;
        }
    </style>
    @yield('h_script')
</head>
<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

