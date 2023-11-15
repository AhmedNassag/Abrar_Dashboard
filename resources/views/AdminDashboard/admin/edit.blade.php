@extends('layouts.master')



@section('css')
    @section('title')
        {{ trans('main.Edit') }} {{ trans('main.Admin') }}
    @stop
@endsection



@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('main.Admins') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('main.Edit') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection



@section('content')
            <!-- validationNotify -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- success Notify -->
            @if (session()->has('success'))
                <script id="successNotify">
                    window.onload = function() {
                        notif({
                            msg: "تمت العملية بنجاح",
                            type: "success"
                        })
                    }
                </script>
            @endif

            <!-- error Notify -->
            @if (session()->has('error'))
                <script id="errorNotify">
                    window.onload = function() {
                        notif({
                            msg: "لقد حدث خطأ.. برجاء المحاولة مرة أخرى!",
                            type: "error"
                        })
                    }
                </script>
            @endif

            <!-- canNotDeleted Notify -->
            @if (session()->has('canNotDeleted'))
                <script id="canNotDeleted">
                    window.onload = function() {
                        notif({
                            msg: "لا يمكن الحذف لوجود بيانات أخرى مرتبطة بها..!",
                            type: "error"
                        })
                    }
                </script>
            @endif


            <!-- row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <a class="btn btn-primary ripple" href="{{ route('admins.index') }}">
                                        <i class="typcn typcn-arrow-right-outline"></i>&nbsp;{{ trans('main.Back') }}
                                    </a>
                                </div>
                            </div>
                            <br>

                            {!! Form::model($admin, ['method' => 'PATCH','route' => ['admins.update', $admin->id]]) !!}
                            <div class="">
                                <div class="row mg-b-20">
                                    <!-- name -->
                                    <div class="parsley-input col-md-6" id="fnWrapper">
                                        <label>{{ trans('main.Name') }} : <span class="tx-danger">*</span></label>
                                        {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                                    </div>

                                    <!-- email -->
                                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                        <label>{{ trans('main.Email') }} : <span class="tx-danger">*</span></label>
                                        {!! Form::text('email', null, array('class' => 'form-control','required')) !!}
                                    </div>
                                </div>

                            </div>

                            <!-- password -->
                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>{{ trans('main.Password') }} : <span class="tx-danger">*</span></label>
                                    {!! Form::password('password', array('class' => 'form-control','required')) !!}
                                </div>

                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>{{ trans('main.Role') }} : <span class="tx-danger">*</span></label>
                                    {!! Form::select('roles[]', $roles,$adminRole, array('class' => 'form-control','multiple'))!!}
                                </div>
                            </div>
                            
                            <div class="mg-t-30">
                                <button class="btn btn-main-primary pd-x-20" type="submit">{{ trans('main.Confirm') }}</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection



@section('js')

@endsection