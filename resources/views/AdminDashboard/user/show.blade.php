@extends('layouts.master')



@section('css')
    @section('title')
        {{ trans('main.User') }}
    @stop
@endsection



@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('main.Dashboard') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('main.User') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection



@section('content')
            <div class="container">
                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-3">
                        <a class="btn btn-primary btn-ripple" href="{{ route('user.index') }}">
                           {{ trans('main.Back') }} &nbsp;<i class="typcn typcn-arrow-left-outline"></i>
                        </a>
                        <button class="btn btn-dark ripple" id="print_Button" onclick="printDiv()">
                            <i class="mdi mdi-printer"></i>&nbsp;{{ trans('main.Print') }}
                        </button>
                    </div>
                </div>
            </div>
            <!-- start tabs content -->
            <div class="panel panel-primary tabs-style-2">
                <div class=" tab-menu-heading">
                    <div class="tabs-menu1">
                        <!-- tabs links -->
                        <ul class="nav panel-tabs main-nav-line">
                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">{{ trans('main.Data') }}</a></li>
                            <li><a href="#tab2" class="nav-link" data-toggle="tab">{{ trans('main.Balance') }}</a></li>
                            <li><a href="#tab3" class="nav-link" data-toggle="tab">{{ trans('main.Comments') }}</a></li>
                            <li><a href="#tab4" class="nav-link" data-toggle="tab">{{ trans('main.FavoriteTeachers') }}</a></li>
                            <li><a href="#tab5" class="nav-link" data-toggle="tab">{{ trans('main.Ratings') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div id="print" class="panel-body tabs-menu-body main-content-body-right border">
                    <div class="tab-content">
                        <!-- start tab1 -->
                        <div class="tab-pane active" id="tab1">

                            @include('AdminDashboard.user.tab1')
                            
                        </div>
                        <!-- end tab1 -->



                        <!-- start tab2 -->
                        <div class="tab-pane" id="tab2">

                            @include('AdminDashboard.user.tab2')

                        </div>
                        <!-- end tab2 -->



                        <!-- start tab3 -->
                        <div class="tab-pane" id="tab3">

                            @include('AdminDashboard.user.tab3')

                        </div>
                        <!-- end tab3 -->

                        <!-- start tab4 -->
                        <div class="tab-pane" id="tab4">

                            @include('AdminDashboard.user.tab4')

                        </div>
                        <!-- end tab4 -->

                        <!-- start tab5 -->
                        <div class="tab-pane" id="tab5">

                            @include('AdminDashboard.user.tab5')

                        </div>
                        <!-- end tab5 -->

                    </div>
                </div>
            </div>
            <!-- end tab content -->

        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection