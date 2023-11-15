@extends('layouts.master')



@section('css')
    @section('title')
        {{ trans('main.Admins') }}
    @stop
@endsection



@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('main.Admins') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('main.List') }} {{ trans('main.Admins') }}</span>
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

            <!-- row opened -->
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row row-xs wd-xl-60p">
                                <div class="col-sm-6 col-md-3">
                                    @can('إضافة المديرين')
                                        <a class=" btn btn-md btn-primary ripple" href="{{ route('admins.create') }}">
                                            <i class="typcn typcn-plus"></i>&nbsp; {{ trans('main.Add') }}
                                        </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap dataTable no-footer" id="example1" data-page-length='50' style=" text-align: center;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">{{ trans('main.Name') }}</th>
                                            <th class="text-center">{{ trans('main.Email') }}</th>
                                            <th class="text-center">{{ trans('main.Role') }}</th>
                                            <th class="text-center">{{ trans('main.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data->count() > 0)
                                            @foreach ($data as $key => $admin)
                                                <tr>
                                                    <td class="text-center">{{ ++$i }}</td>
                                                    <td class="text-center">{{ $admin->name }}</td>
                                                    <td class="text-center">{{ $admin->email }}</td>
                                                    <td class="text-center">
                                                        @if (!empty($admin->getRoleNames()))
                                                            @foreach ($admin->getRoleNames() as $v)
                                                                <label class="badge badge-success">{{ $v }}</label>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @can('تعديل المديرين')
                                                            <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-sm btn-info" title="{{ trans('main.Edit') }}"><i class="las la-pen"></i></a>
                                                        @endcan

                                                        @can('حذف المديرين')
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-admin_id="{{ $admin->id }}" data-adminname="{{ $admin->name }}" data-toggle="modal" href="#modaldemo8" title="{{ trans('main.Delete') }}"><i class="las la-trash"></i></a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <th class="text-center" colspan="11">
                                                    <div class="col mb-3 d-flex">
                                                        <div class="card flex-fill">
                                                            <div class="card-body p-3 text-center">
                                                                <p class="card-text f-12">{{ trans('main.No Data Founded') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <!--/div-->

                <!-- Modal effects -->
                <div class="modal" id="modaldemo8">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">{{ trans('main.Delete') }} {{ trans('main.Admin') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form action="{{ route('admins.destroy', 'test') }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <p>{{ trans('main.Are You Sure Of Deleting..??') }}</p><br>
                                    <input type="hidden" name="admin_id" id="admin_id" value="">
                                    <input class="form-control" name="adminname" id="adminname" type="text" readonly>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('main.Close') }}</button>
                                    <button type="submit" class="btn btn-danger">{{ trans('main.Confirm') }}</button>
                                </div>
                            </form>
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
    <script>
        $('#modaldemo8').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var admin_id = button.data('admin_id')
            var adminname = button.data('adminname')
            var modal = $(this)
            modal.find('.modal-body #admin_id').val(admin_id);
            modal.find('.modal-body #adminname').val(adminname);
        })
    </script>
@endsection