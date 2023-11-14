<!-- start edit modal -->
<div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('main.Edit') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form action="{{ route('course.update', 'test') }}" method="post" enctype="multipart/form-data">
                    {{ method_field('patch') }}
                    @csrf
                    <div class="row">
                        <!-- name -->
                        <div class="col-6">
                            <label for="name" class="mr-sm-2">{{ trans('main.Name') }} :</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $item->name }}">
                        </div>
                        <!-- date -->
                        <div class="col-6">
                            <label for="date" class="mr-sm-2">{{ trans('main.date') }} :</label>
                            <input id="date" type="date" class="form-control" name="date" value="{{ $item->date }}">
                        </div>
                        <!-- time -->
                        <div class="col-6">
                            <label for="time" class="mr-sm-2">{{ trans('main.time') }} :</label>
                            <input id="time" type="time" class="form-control" name="time" value="{{ $item->time }}">
                        </div>
                        <!-- teacher_id -->
                        <div class="col-6">
                            <label for="teacher_id" class="mr-sm-2">{{ trans('main.teacher') }} :</label>
                            <select class="form-control select2" name="teacher_id">
                                <option label="Choose one"></option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ $item->teacher_id == $teacher->id ? 'selected' :'' }}>{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- id -->
                        <div class="col-6">
                            <input id="id" type="hidden" name="id" class="form-control" value="{{ $item->id }}">
                        </div>
                    </div>

                    <div class="modal-footer mt-3">
                        <button type="submit" class="btn btn-success ripple">{{ trans('main.Confirm') }}</button>
                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">{{ trans('main.Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end edit modal -->
