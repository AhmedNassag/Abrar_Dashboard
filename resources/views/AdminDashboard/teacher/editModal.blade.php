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
                <form action="{{ route('teacher.update', 'test') }}" method="post" enctype="multipart/form-data">
                    {{ method_field('patch') }}
                    @csrf
                    <div class="row">
                        <!-- name -->
                        <div class="col-6">
                            <label for="name" class="mr-sm-2">{{ trans('main.Name') }} :</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $item->name }}">
                        </div>
                        <!-- email -->
                        <div class="col-6">
                            <label for="email" class="mr-sm-2">{{ trans('main.email') }} :</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $item->email }}">
                        </div>
                        <!-- abstract -->
                        <div class="col-6">
                            <label for="abstract" class="mr-sm-2">{{ trans('main.abstract') }} :</label>
                            <input id="abstract" type="text" class="form-control" name="abstract" value="{{ $item->abstract }}">
                        </div>
                        <!-- certificate -->
                        <div class="col-6">
                            <label for="certificate" class="mr-sm-2">{{ trans('main.certificate') }} :</label>
                            <input id="certificate" type="text" class="form-control" name="certificate" value="{{ $item->certificate }}">
                        </div>
                        <!-- Achievement -->
                        <div class="col-6">
                            <label for="Achievement" class="mr-sm-2">{{ trans('main.Achievement') }} :</label>
                            <input id="Achievement" type="text" class="form-control" name="Achievement" value="{{ $item->Achievement }}">
                        </div>
                        <!-- languages -->
                        <div class="col-6">
                            <label for="languages" class="mr-sm-2">{{ trans('main.languages') }} :</label>
                            <input id="languages" type="text" class="form-control" name="languages" value="{{ $item->languages }}">
                        </div>
                        <!-- phone -->
                        <div class="col-6">
                            <label for="phone" class="mr-sm-2">{{ trans('main.phone') }} :</label>
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ $item->phone }}">
                        </div>
                        <!-- busy -->
                        <div class="col-6">
                            <label for="busy" class="mr-sm-2">{{ trans('main.busy') }} :</label>
                            <select class="form-control" name="busy">
                                <option value="true" {{ $item->busy == 'true' ? 'selected' : '' }}>{{ trans('main.Yes') }}</option>
                                <option value="false" {{ $item->busy == 'false' ? 'selected' : '' }}>{{ trans('main.No') }}</option>
                            </select>
                        </div>
                        <!-- img -->
                        <div class="col-6">
                            <label for="photo" class="mr-sm-2">{{ trans('main.Photo') }} :</label>
                            <input type="file" name="img" class="form-control" accept="image/*" data-height="70" value="{{ $item->photo }}"/>
                            @if($item->img)
                                <div class="row">
                                    <div class="col-12">
                                        <img class="img-thumbnail m-1" src="{{ asset('attachments/teacher/'.$item->img) }}" alt="{{ $item->photo }}" height="100" width="100">
                                    </div>
                                </div>
                            @endif
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
