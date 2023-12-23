@extends('layouts.admin.app')
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">{{$title}}</h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="javascript:" class="kt-subheader__breadcrumbs-home">
                            <i class="flaticon2-shelter"></i>
                        </a>
                        {!! $breadcrumb !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">{{$title}}</h3>
                </div>
            </div>
            <form class="kt-form kt-form--label-right" name="main_form" id="main_form" class="main_form"
                  method="post"
                  enctype="multipart/form-data" action="{{route('admin.post_profile')}}">
                {!! get_error_html($errors) !!}
                {!! success_error_view_generator() !!}
                @csrf
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label for="username"
                               class="col-form-label col-lg-3 col-sm-12"><span
                                class="text-danger">*</span>{{__('name')}}</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control"
                                   maxlength="25">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username"
                               class="col-form-label col-lg-3 col-sm-12"><span
                                class="text-danger">*</span>{{__('username')}}</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" name="username" id="username" class="form-control"
                                   value="{{$user->username}}" maxlength="25">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                               class="col-form-label col-lg-3 col-sm-12"><span
                                class="text-danger">*</span>{{__('Email')}}</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                        </div>
                    </div>

                </div>
                <div class="kt-portlet__foot">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit"
                                        class="btn btn-success kt-spinner--right kt-spinner--lg kt-spinner--light"
                                        id="btn-submit-dev">Submit
                                </button>
                                <a href="{{route('admin.dashboard')}}"
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
            jQuery.validator.addMethod("noSpace", function (value, element) {
                return value.indexOf(" ") < 0 && value != "";
            }, "Space is not Allowed");

            $("#main_form").validate({
                rules: {
                    name: {required: true},
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            type: 'get',
                            url: "{{route('front.availability_checker')}}",
                            data: {
                                'type': "email",
                                'val': function () {
                                    return $('#email').val();
                                }
                            },
                        },
                    },
                    username: {
                        required: true,
                        noSpace: true,
                        remote: {
                            type: 'get',
                            url: "{{route('front.availability_checker')}}",
                            data: {
                                'type': "username",
                                'val': function () {
                                    return $('#username').val();
                                }
                            },
                        },
                    },
                },
                messages: {
                    email: {
                        required: 'Please Enter Email address',
                        remote: "this email is already taken",
                    },
                    name: {required: 'Please Enter Name'},
                    username: {
                        remote: "this username is already taken",
                    }
                },
                invalidHandler: function (event, validator) {
                    var alert = $('#kt_form_1_msg');
                    alert.removeClass('kt--hide').show();
                    KTUtil.scrollTo('m_form_1_msg', -200);
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection

