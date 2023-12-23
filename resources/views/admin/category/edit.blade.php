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
            <!--begin::Form-->
            <form class="kt-form kt-form--label-right" name="main_form" id="main_form" class="main_form"
                  method="post"
                  enctype="multipart/form-data" action="{{route('admin.category.update',$category->id)}}">
                {!! get_new_error_html($errors) !!}
                @csrf
                @method('PATCH')
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label for="name"
                               class="col-form-label col-lg-3 col-sm-12"><span
                                class="text-danger">*</span>{{__('Name')}}</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{$category->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Image</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar">
                                <div class="kt-avatar__holder"
                                     style="background-image: url(&quot;{{$category->image}}&quot;);"></div>
                                <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                       data-original-title="Change Image">
                                    <i class="fa fa-pen"></i>
                                    <input type="file" name="image" id="image">
                                </label>
                                <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                      data-original-title="Cancel avatar">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                            </div>
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
                                <a href="{{route('admin.category.index')}}"
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
        "use strict";

        // Class definition
        var KTUserProfile = function () {
            // Base elements
            var avatar;
            var offcanvas;

            // Private functions
            var initAside = function () {
                // Mobile offcanvas for mobile mode
                offcanvas = new KTOffcanvas('kt_user_profile_aside', {
                    overlay: true,
                    baseClass: 'kt-app__aside',
                    closeBy: 'kt_user_profile_aside_close',
                    toggleBy: 'kt_subheader_mobile_toggle'
                });
            }

            var initUserForm = function () {
                avatar = new KTAvatar('kt_user_avatar');
            }

            return {
                // public functions
                init: function () {
                    initAside();
                    initUserForm();
                }
            };
        }();

        KTUtil.ready(function () {
            KTUserProfile.init();
        });
        $(function () {
            $("#main_form").validate({
                rules: {
                    name: {required: true},
                },
                messages: {
                    name: {required: 'Please enter nme'},
                },
                invalidHandler: function (event, validator) {
                    var alert = $('#kt_form_1_msg');
                    alert.removeClass('kt--hide').show();
                    KTUtil.scrollTo('m_form_1_msg', -200);
                },
                submitHandler: function (form) {
                    addOverlay();
                    form.submit();
                }
            });
        });
    </script>
@endsection
