@include('layouts.admin.header')
@if(isset($header_panel))
    @yield('content')
@else
    @include('layouts.admin.header_nav')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        @yield('content')
    </div>
@endif
@yield('script')
@include('layouts.admin.footer')
