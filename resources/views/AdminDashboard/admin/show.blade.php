@extends('layouts.master')



@section('css')
    @section('title')
        {{ trans('main.Admin') }}
    @stop
@endsection



@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('main.Dashboard') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('main.Admin') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection



@section('content')
            <!-- row -->
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body h-100">
                            <div class="row row-sm ">
                                @if($admin->photo)
                                    <div class=" col-xl-5 col-lg-12 col-md-12">
                                        <div class="preview-pic tab-content">
                                            <div class="tab-pane active" id="pic-1">
                                                <img src="{{ asset('public/attachments/admin/'.$admin->photo) }}" alt="{{ $admin->photo }}">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                                    <h4 class="product-title mb-1"></h4>
                                    <div class="sizes d-flex mt-5">
                                        {{ trans('main.Name') }}
                                        <span class="size d-flex" data-toggle="tooltip" title="small">
                                            <label class="mb-0">
                                                <span class="font-weight-bold">{{ $admin->name }}</span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                                    <h4 class="product-title mb-1"></h4>
                                    <div class="sizes d-flex mt-5">
                                        {{ trans('main.Email') }}
                                        <span class="size d-flex" data-toggle="tooltip" title="small">
                                            <label class="mb-0">
                                                <span class="font-weight-bold">{{ $admin->email }}</span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->

        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection



@section('js')
    
@endsection