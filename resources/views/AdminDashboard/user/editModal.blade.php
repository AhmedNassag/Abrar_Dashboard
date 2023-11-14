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
                <form action="{{ route('user.update', 'test') }}" method="post" enctype="multipart/form-data">
                    {{ method_field('patch') }}
                    @csrf
                    <div class="row">
                        <!-- first_name -->
                        <div class="col-6">
                            <label for="first_name" class="mr-sm-2">{{ trans('main.first_name') }} :</label>
                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $item->first_name }}">
                        </div>
                        <!-- last_name -->
                        <div class="col-6">
                            <label for="last_name" class="mr-sm-2">{{ trans('main.last_name') }} :</label>
                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $item->last_name }}">
                        </div>
                        <!-- country_id -->
                        <div class="col-6">
                            <label for="country_id" class="mr-sm-2">{{ trans('main.country') }} :</label>
                            <select class="form-control select2" name="country_id">
                                <option label="Choose one"></option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ $item->Country_id == $country->id ? 'selected' :'' }}>{{ app()->getLocale() == 'ar' ? $country->ar_name : $country->en_name }}</option>
                                @endforeach
                            </select>
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
                        <!-- age -->
                        <div class="col-6">
                            <label for="age" class="mr-sm-2">{{ trans('main.age') }} :</label>
                            <input id="age" type="number" class="form-control" name="age" value="{{ $item->age }}">
                        </div>
                        <!-- credit -->
                        <div class="col-6">
                            <label for="credit" class="mr-sm-2">{{ trans('main.credit') }} :</label>
                            <input id="credit" type="number" class="form-control" name="credit" value="{{ $item->credit }}">
                        </div>
                        <!-- email -->
                        <div class="col-6">
                            <label for="email" class="mr-sm-2">{{ trans('main.email') }} :</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $item->email }}">
                        </div>
                        <!-- active -->
                        <div class="col-6">
                            <label for="active" class="mr-sm-2">{{ trans('main.status') }} :</label>
                            <select class="form-control" name="active">
                                <option value="1" {{ $item->active == '1' ? 'selected' : '' }}>{{ trans('main.active') }}</option>
                                <option value="0" {{ $item->active == '0' ? 'selected' : '' }}>{{ trans('main.notActive') }}</option>
                            </select>
                        </div>
                        <!-- img -->
                        <div class="col-6">
                            <label for="photo" class="mr-sm-2">{{ trans('main.Photo') }} :</label>
                            <input type="file" name="img" class="form-control" accept="image/*" data-height="70" value="{{ $item->photo }}"/>
                            @if($item->img)
                                <div class="row">
                                    <div class="col-12">
                                        <img class="img-thumbnail m-1" src="{{ asset('attachments/user/'.$item->img) }}" alt="{{ $item->photo }}" height="100" width="100">
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
