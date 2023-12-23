@extends('layouts.admin.app')
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">{{print_title($title)}}</h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="javascript:" class="kt-subheader__breadcrumbs-home">
                            <i class="flaticon2-shelter"></i>
                        </a>
                        {!! isset($breadcrumb)?$breadcrumb:"" !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">{{print_title($title)}}</h3>
                </div>
            </div>
            <form class="kt-form kt-form--label-right" name="form_cpass" id="form_cpass" method="post"
                  action="{{route('admin.update_password')}}">
                @csrf
                {!! success_error_view_generator() !!}
                {!! get_error_html($errors) !!}
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label
                            class="col-form-label col-lg-3 col-sm-12">
                            <span class="text-danger">*</span>Old Password:</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="password" name="opassword" id="opassword" class="form-control"
                                   placeholder="Please Enter Old Password."
                                   data-error-container="#error_opassword">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-form-label col-lg-3 col-sm-12">
                            <span class="text-danger">*</span>New Password </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="password" name="npassword" id="npassword" class="form-control"
                                   placeholder="Please Enter New Password."
                                   data-error-container="#error_npassword">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-form-label col-lg-3 col-sm-12">
                            <span class="text-danger">*</span> Confirm Password
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="password" name="cpassword" id="cpassword" class="form-control"
                                   placeholder="Please Enter Config Password."
                                   data-error-container="#error_cpassword">
                            @error('cpassword')
                            <label id="cpassword-error" class="error" for="cpassword">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class=" ">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" class="btn btn-success"
                                        id="btn-submit-dev">Submit
                                </button>
                                <a href="{{route(getDashboardRouteName())}}"
                                   class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(function () {
            $(document).on('submit', '#form_cpass', function () {
                $("#form_cpass").validate({
                    rules: {
                        opassword: {
                            required: true,
                        },
                        npassword: {
                            required: true,
                            minlength: 6,
                        },
                        cpassword: {
                            required: true,
                            equalTo: "#npassword",
                        }
                    },
                    messages: {
                        opassword: {
                            required: "Please Enter Old Password.",
                        },
                        npassword: {
                            required: "Please Enter New Password.",
                            minlength: "Please Enter minimum 6 character for password",

                        },
                        cpassword: {
                            required: "Please Enter Config Password.",
                            equalTo: "Confirm Password does not match with new password.",
                        }
                    },
                });
                return $('#form_cpass').valid();
            });
        });
    </script>
@endsection
