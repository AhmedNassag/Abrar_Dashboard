@extends('layouts.master')



@section('css')
    @section('title')
        {{ trans('main.Teachers') }}
    @stop
@endsection



@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('main.Dashboard') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('main.Teachers') }}</span>
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
                
            <div class="col-xl-12">
                <div class="card mg-b-20">
                    <div id="print">
                        <div class="card-header pb-0">
                            <!--start title-->
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">{{ trans('main.Teachers') }}</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            <p class="tx-12 tx-gray-500 mb-2"></p>
                            <!--end title-->
                            <div class="row row-xs wd-xl-60p">
                                <div class="col-sm-6 col-md-12 notPrint">
                                    <a class="modal-effect btn btn-primary ripple" data-effect="effect-newspaper" data-toggle="modal" href="#modaldemo8">
                                        <i class="mdi mdi-plus"></i>&nbsp;{{ trans('main.Add') }}
                                    </a>
                                    <button class="btn btn-dark ripple" id="print_Button" onclick="printDiv()">
                                        <i class="mdi mdi-printer"></i>&nbsp;{{ trans('main.Print') }}
                                    </button>
                                    <button type="button" class="btn btn-danger ripple" id="btn_delete_selected" title="{{ trans('main.Delete Selected') }}" style="display:none">
                                        <i class="fas fa-trash-alt"></i>&nbsp;{{ trans('main.Delete Selected') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">   
                                    <thead>
                                        <tr>
                                            {{-- <th class="text-center border-bottom-0 notPrint">
                                                <input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)"  oninput="showBtnDeleteSelected()">
                                            </th> --}}
                                            <th class="text-center border-bottom-0 notPrint">#</th>
                                            <th class="text-center border-bottom-0">{{ trans('main.name')}}</th>
                                            <th class="text-center border-bottom-0">{{ trans('main.abstract')}}</th>
                                            <th class="text-center border-bottom-0">{{ trans('main.certificate')}}</th>
                                            <th class="text-center border-bottom-0">{{ trans('main.Achievement')}}</th>
                                            <th class="text-center border-bottom-0">{{ trans('main.languages')}}</th>
                                            <th class="text-center border-bottom-0">{{ trans('main.phone')}}</th>
                                            <th class="text-center border-bottom-0">{{ trans('main.busy')}}</th>
                                            <th class="text-center border-bottom-0 notPrint">{{ trans('main.Photo')}}</th>
                                            <th class="text-center border-bottom-0 notPrint">{{ trans('main.Actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($teachers->count() > 0)
                                            <?php $i = 0; ?>
                                            @foreach ($teachers as $item)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td class="text-center notPrint">
                                                        <input id="delete_selected_input" type="checkbox" value="{{ $item->id }}" class="box1 mr-3" oninput="showBtnDeleteSelected()"> {{ $i }}
                                                    </td>
                                                    <td class="text-center">{{ $item->name }}</td>
                                                    <td class="text-center">{{ $item->abstract }}</td>
                                                    <td class="text-center">{{ $item->certificate }}</td>
                                                    <td class="text-center">{{ $item->Achievement }}</td>
                                                    <td class="text-center">{{ $item->languages }}</td>
                                                    <td class="text-center">{{ $item->phone }}</td>
                                                    <td class="text-center">
                                                        @if($item->busy == 'true')
                                                            {{ app()->getLocale() == 'ar' ? 'نعم' : 'Yes' }}
                                                        @else
                                                            {{ app()->getLocale() == 'ar' ? 'لا' : 'No' }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center notPrint">
                                                        @if($item->img)
                                                            <img src="{{ asset('public/attachments/teacher/'.$item->img) }}" alt="{{ $item->img }}" height="50" width="50">
                                                            <br>
                                                            <a class="btn btn-outline-success btn-sm" href="{{ url('show_file') }}/teacher/{{ $item->img }}" role="button"><i class="fas fa-eye"></i></a>
                                                            <a class="btn btn-outline-info btn-sm" href="{{ url('download_file') }}/teacher/{{ $item->img }}" role="button"><i class="fas fa-download"></i></a>
                                                        @endif
                                                    </td>
                                                    <td class="text-center notPrint">
                                                        <div class="dropdown">
                                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm" data-toggle="dropdown" type="button"><i class="fas fa-caret-down ml-1"></i>{{ trans('main.Actions') }}</button>
                                                            <div class="dropdown-menu tx-13 bd-primary rounded-5">
                                                                <a class="dropdown-item" href="{{ route('teacher.show',[$item->id]) }}" title="{{ trans('main.Show') }}">
                                                                    <i class="text-success fas fa-eye"></i>&nbsp;&nbsp;{{ trans('main.Show') }}
                                                                </a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit{{ $item->id }}" title="{{ trans('main.Edit') }}">
                                                                    <i class="text-info fas fa-pencil-alt"></i>&nbsp;&nbsp;{{ trans('main.Edit') }}
                                                                </a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{ $item->id }}" title="{{ trans('main.Delete') }}">
                                                                    <i class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;{{ trans('main.Delete') }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                                @include('AdminDashboard.teacher.editModal')
                                                @include('AdminDashboard.teacher.deleteModal')

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
                                {{ $teachers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('AdminDashboard.teacher.addModal')
            @include('AdminDashboard.teacher.deleteSelectedModal')

            <!-- row closed -->
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection



@section('js')
    
@endsection
