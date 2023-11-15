@extends('layouts.master')



@section('css')
    @section('title')
        {{ trans('main.Roles') }}
    @stop
@endsection



@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('main.Roles') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> / {{ trans('main.Roles') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection



@section('content')
            @if (session()->has('Add'))
                <script>
                    window.onload = function() {
                        notif({
                            msg: " تم اضافة الصلاحية بنجاح",
                            type: "success"
                        });
                    }
                </script>
            @endif

            @if (session()->has('edit'))
                <script>
                    window.onload = function() {
                        notif({
                            msg: " تم تحديث بيانات الصلاحية بنجاح",
                            type: "success"
                        });
                    }
                </script>
            @endif

            @if (session()->has('delete'))
                <script>
                    window.onload = function() {
                        notif({
                            msg: " تم حذف الصلاحية بنجاح",
                            type: "error"
                        });
                    }
                </script>
            @endif

            <!-- row -->
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-right">
                                        @can('إضافة الأدوار')
                                            <a class="btn btn-primary ripple" href="{{ route('roles.create') }}">
                                                <i class="typcn typcn-plus"></i>&nbsp; {{ trans('main.Add') }}
                                            </a>
                                        @endcan
                                    </div>
                                </div>
                                <br>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mg-b-0 text-md-nowrap table-hover ">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">{{ trans('main.Name') }}</th>
                                            <th class="text-center">{{ trans('main.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($roles as $key => $role)
                                            <?php $i++; ?>
                                            <tr>
                                                <td class="text-center">{{ ++$i }}</td>
                                                <td class="text-center">{{ $role->name }}</td>
                                                <td class="text-center">

                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm" data-toggle="dropdown" type="button"><i class="fas fa-caret-down ml-1"></i>{{ trans('main.Actions') }}</button>
                                                        <div class="dropdown-menu tx-13 bd-primary ripple">
                                                            @can('عرض الأدوار')
                                                                <a class="dropdown-item" href="{{ route('roles.show', $role->id) }}" title="{{ trans('main.Show') }}">
                                                                    <i class="text-success fas fa-eye"></i>&nbsp;&nbsp;{{ trans('main.Show') }}
                                                                </a>
                                                            @endcan
                                                    
                                                            @can('تعديل الأدوار')
                                                                <a class="dropdown-item" href="{{ route('roles.edit', $role->id) }}" title="{{ trans('main.Edit') }}">
                                                                    <i class="text-info fas fa-pencil-alt"></i>&nbsp;&nbsp;{{ trans('main.Edit') }}
                                                                </a>
                                                            @endcan

                                                            @if ($role->name !== 'Admin')
                                                                @can('حذف الأدوار')
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{ $role->id }}" title="{{ trans('main.Delete') }}">
                                                                        <i class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;{{ trans('main.Delete') }}
                                                                    </a>
                                                                @endcan
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            
                                            @include('adminDashboard.role.deleteModal')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/div-->
            </div>
            <!-- row closed -->
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection



@section('js')

@endsection
