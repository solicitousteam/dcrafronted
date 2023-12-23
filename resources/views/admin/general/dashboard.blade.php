@extends('layouts.admin.app')

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="{{route('admin.user.index')}}">
                    <div class="kt-portlet kt-iconbox kt-iconbox--brand kt-iconbox--animate-slower">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__icon">
                                    <i class="fas fa-users fa-3x"></i>
                                </div>
                                <div class="kt-iconbox__desc">
                                    <h3 class="kt-iconbox__title">
                                        <span class="kt-link" href="javascript:;">{{__('admin.das_user')}}</span>
                                    </h3>
                                    <div class="kt-iconbox__content">{{__('admin.das_total')}} {{__('admin.das_users')}}
                                        : {{$user_count}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
