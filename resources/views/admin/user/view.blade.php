@extends('layouts.admin.app')
@section('h_style')
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
    <style>
        .kt-widget__label {
            text-transform: capitalize;
        }

        .img_150 {
            max-height: 150px;
            max-width: 150px;
        }
    </style>
@endsection

@section('content')
    <div class="portlet-toggler">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        {{print_title($title)}}
                    </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        {!! $breadcrumb !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
                <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                    <i class="la la-close"></i>
                </button>
                <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
                    <div class="kt-portlet kt-portlet--height-fluid-">
                        <div class="kt-portlet__head  kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit-y">
                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-1">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media text-center w-100">
                                        {!! get_fancy_box_html($data->profile_image) !!}
                                    </div>
                                </div>
                                <div class="kt-widget__body">
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">First Name:</span>
                                            <a href="#" class="kt-widget__data">{{$data->first_name}}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Last Name:</span>
                                            <a href="#" class="kt-widget__data">{{$data->last_name}}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Email:</span>
                                            <a href="#" class="kt-widget__data">{{$data->email}}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">status:</span>
                                            <span
                                                class="kt-widget__data">{!! user_status($data->status,$data->deleted_at) !!}</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__items">
                                        <a href="javascript:;"
                                           class="kt-widget__item kt-widget__item--active a_trainer_grid"
                                           onclick="change_tab('trainer_profile_grid')">
                        <span class="kt-widget__section">
                            <span class="kt-widget__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
            fill="#000000" fill-rule="nonzero"/>
        <path
            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg>                            </span>
                            <span class="kt-widget__desc">
                                Trainer Profile
                            </span>
                        </span>
                                        </a>
                                        <a href="javascript:;"
                                           class="kt-widget__item a_gym_grid" onclick="change_tab('gym_profile_grid')">
                        <span class="kt-widget__section">
                            <span class="kt-widget__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
            fill="#000000" fill-rule="nonzero"/>
    </g>
</svg>                            </span>
                            <span class="kt-widget__desc">
                                Gym Profile
                            </span>
                        </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content trainer_profile_grid">
                    <div class="row">
                        <div class="col-xl-6">
                            <!--begin:: Widgets/Order Statistics-->
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            {{__('Trainer Profile')}}
                                        </h3>
                                    </div>
                                    <div class="kt-portlet__head-toolbar">
                                        <a href="#" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle"
                                           data-toggle="dropdown">
                                            {{(!is_null($trainer)?(($trainer->is_approved == 0)?'Verification':(($trainer->is_approved == 1)?'Approved':'Rejected')):'Pending')}}
                                        </a>

                                        @if(!is_null($trainer) && $trainer->is_approved == 0)
                                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                <!--begin::Nav-->
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__head">
                                                        Verification Options
                                                    </li>
                                                    <li class="kt-nav__separator"></li>
                                                    <li class="kt-nav__item">
                                                        <a href="{{route('admin.user.approve_reject_trainer', [$data->id,'approve'])}}"
                                                           class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-check-mark"></i>
                                                            <span class="kt-nav__link-text">{{_('Approve')}}</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="{{route('admin.user.approve_reject_trainer', [$data->id,'reject'])}}"
                                                           class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-delete"></i>
                                                            <span class="kt-nav__link-text">{{_('Reject')}}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!--end::Nav-->            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="kt-portlet__body kt-portlet__body--fluid">
                                    <div class="kt-widget12">
                                        <div class="kt-widget12__content">
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Name')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($trainer->name))?$trainer->name:'N/A'}}</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Email')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($trainer->email))?$trainer->email:'N/A'}}</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Phone Number')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($trainer->phone_number))?$trainer->phone_number:'N/A'}}</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Address')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($trainer->address))?$trainer->address:'N/A'}}</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Specialities')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($trainer->specialities))?$trainer->specialities:'N/A'}}</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Training Place')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($trainer->training_place))?$trainer->training_place:'N/A'}}</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Workout Plan Price')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($trainer->workout_plan_price))?place_currency($trainer->workout_plan_price):'N/A'}}</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Diet Plan Price')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($trainer->diet_plan_price))?place_currency($trainer->diet_plan_price):'N/A'}}</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Session Plan Price')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($trainer->session_plan_price))?place_currency($trainer->session_plan_price):'N/A'}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end:: Widgets/Order Statistics-->
                        </div>
                    </div>
                    <div class="row">
                        @if(!empty($trainer->certificate))
                            <div class="col-xl-6">
                                <!--begin:: Widgets/Last Updates-->
                                <div class="kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                {{__('Certificate')}}
                                            </h3>
                                        </div>

                                    </div>
                                    <div class="kt-portlet__body">
                                        <!--begin::widget 12-->
                                        <div class="kt-widget4">
                                            @foreach($trainer->certificate as $key=>$value)
                                                <div class="kt-widget4__item">
				<span class="kt-widget4__icon">
					<i class="flaticon-pie-chart-1 kt-font-info"></i>
				</span>
                                                    <a href="javascript:;"
                                                       class="kt-widget4__title kt-widget4__title--light">
                                                        {{$value->title}}
                                                    </a>
                                                    <span
                                                        class="kt-widget4__number kt-font-info">{{\Carbon\Carbon::parse($value->issue_date)->format('d-m-Y')}}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!--end::Widget 12-->
                                    </div>
                                </div>
                                <!--end:: Widgets/Last Updates-->            </div>
                        @endif
                        @if(!empty($trainer->educations))
                            <div class="col-xl-6">
                                <!--begin:: Widgets/Last Updates-->
                                <div class="kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                {{__('Educations')}}
                                            </h3>
                                        </div>

                                    </div>
                                    <div class="kt-portlet__body">
                                        <!--begin::widget 12-->
                                        <div class="kt-widget4">
                                            @foreach($trainer->educations as $key=>$value)
                                                <div class="kt-widget4__item">
				<span class="kt-widget4__icon">
                        {{$value->school}}
				</span>
                                                    <a href="javascript:;"
                                                       class="kt-widget3__title kt-widget4__title--light">
                                                        {{$value->field_of_study}}
                                                    </a>
                                                    <span
                                                        class="kt-widget3__number kt-font-info">{{\Carbon\Carbon::parse($value->start_date)->format('d-m-Y')}}</span>
                                                    <span
                                                        class="kt-widget3__number kt-font-info">{{\Carbon\Carbon::parse($value->end_date)->format('d-m-Y')}}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!--end::Widget 12-->
                                    </div>
                                </div>
                            @endif
                            <!--end:: Widgets/Last Updates-->            </div>
                    </div>
                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content gym_profile_grid" style="display: none">
                    <div class="row">
                        <div class="col-xl-6">
                            <!--begin:: Widgets/Order Statistics-->
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            {{__('Gym Profile')}}
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body kt-portlet__body--fluid">
                                    <div class="kt-widget12">
                                        <div class="kt-widget12__content">
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Name')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($gym->name))?$gym->name:'N/A'}}</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Address')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($gym->address))?$gym->address:'N/A'}}</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Info')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($gym->info))?$gym->info:'N/A'}}</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Facilities')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($gym->facilities))?$gym->facilities:'N/A'}}</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Amenities')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($gym->amenities))?$gym->amenities:'N/A'}}</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">{{__('Price')}}</span>
                                                    <span
                                                        class="kt-widget12__value">{{(!empty($gym->price))?place_currency($gym->price):'N/A'}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end:: Widgets/Order Statistics-->
                        </div>
                    </div>
                    <div class="row">
                        @if(!empty($gym->gym_timings))
                            <div class="col-xl-6">
                                <!--begin:: Widgets/Last Updates-->
                                <div class="kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                {{__('Gym Time')}}
                                            </h3>
                                        </div>

                                    </div>
                                    <div class="kt-portlet__body">
                                        <!--begin::widget 12-->
                                        <div class="kt-widget4">
                                            @foreach($gym->gym_timings as $key=>$value)
                                                <div class="kt-widget4__item">
				<span class="kt-widget4__icon">
					<i class="flaticon-time kt-font-info"></i>
				</span>
                                                    <a href="javascript:;"
                                                       class="kt-widget4__title kt-widget4__title--light">
                                                        {{ucfirst($value->day)}}
                                                    </a>
                                                    <span
                                                        class="kt-widget4__number kt-font-info">{{\Carbon\Carbon::parse($value->start_time)->format('h:i A')}}</span>
                                                    <span
                                                        class="kt-widget4__number kt-font-info">{{\Carbon\Carbon::parse($value->end_time)->format('h:i A')}}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!--end::Widget 12-->
                                    </div>
                                </div>
                                <!--end:: Widgets/Last Updates-->            </div>
                        @endif
                        @if(!empty($gym->gym_gallery))
                            <div class="col-xl-6">
                                <!--begin:: Widgets/Last Updates-->
                                <div class="kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                {{__('Gym Gallery')}}
                                            </h3>
                                        </div>

                                    </div>
                                    <div class="kt-portlet__body">
                                        <!--begin::widget 12-->
                                        <div class="kt-widget4">
                                            @foreach($gym->gym_gallery as $key=>$value)
                                                <div class="kt-widget4__item">
				<span class="kt-widget4__icon">
                        <img src="{{$value->file}}" width="50"/>
				</span>

                                                </div>
                                            @endforeach
                                        </div>
                                        <!--end::Widget 12-->
                                    </div>
                                </div>
                            @endif
                            <!--end:: Widgets/Last Updates-->            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function change_tab(tab) {
            if (tab == 'gym_profile_grid') {
                $(".a_gym_grid").addClass('kt-widget__item--active');
                $(".gym_profile_grid").show();
                $(".a_trainer_grid").removeClass('kt-widget__item--active');
                $(".trainer_profile_grid").hide();
            } else {
                $(".a_gym_grid").removeClass('kt-widget__item--active');
                $(".gym_profile_grid").hide();
                $(".a_trainer_grid").addClass('kt-widget__item--active');
                $(".trainer_profile_grid").show();
            }
        }
    </script>
@endsection
