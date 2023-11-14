<!-- start add modal -->
<div class="modal" id="modaldemo8">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ trans('main.Add New') }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- first_name -->
                        <div class="col-6">
                            <label for="first_name" class="mr-sm-2">{{ trans('main.first_name') }} :</label>
                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                        </div>
                        <!-- last_name -->
                        <div class="col-6">
                            <label for="last_name" class="mr-sm-2">{{ trans('main.last_name') }} :</label>
                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                        </div>
                        <!-- Country_id -->
                        <div class="col-6">
                            <label for="busy" class="mr-sm-2">{{ trans('main.Country') }} :</label>
                            <select class="form-control select2" name="Country_id">
                                <option label="Choose one"></option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{ app()->getLocale() == 'ar' ? $country->ar_name : $country->en_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- phone -->
                        <div class="col-6">
                            <label for="phone" class="mr-sm-2">{{ trans('main.phone') }} :</label>
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                        </div>
                        <!-- busy -->
                        <div class="col-6">
                            <label for="busy" class="mr-sm-2">{{ trans('main.busy') }} :</label>
                            <select class="form-control" name="busy">
                                <option value="true">{{ trans('main.Yes') }}</option>
                                <option value="false">{{ trans('main.No') }}</option>
                            </select>
                        </div>
                        <!-- age -->
                        <div class="col-6">
                            <label for="age" class="mr-sm-2">{{ trans('main.age') }} :</label>
                            <input id="age" type="number" class="form-control" name="age" value="{{ old('age') }}">
                        </div>
                        <!-- credit -->
                        <div class="col-6">
                            <label for="credit" class="mr-sm-2">{{ trans('main.credit') }} :</label>
                            <input id="credit" type="number" class="form-control" name="credit" value="{{ old('credit') }}">
                        </div>
                        <!-- email -->
                        <div class="col-6">
                            <label for="email" class="mr-sm-2">{{ trans('main.email') }} :</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                        <!-- password -->
                        <div class="col-6">
                            <label for="password" class="mr-sm-2">{{ trans('main.password') }} :</label>
                            <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
                        </div>
                        <!-- active -->
                        <div class="col-6">
                            <label for="active" class="mr-sm-2">{{ trans('main.status') }} :</label>
                            <select class="form-control" name="active">
                                <option value="1">{{ trans('main.active') }}</option>
                                <option value="0">{{ trans('main.notActive') }}</option>
                            </select>
                        </div>
                        <!-- img -->
                        <div class="col-6">
                            <label for="img" class="mr-sm-2">{{ trans('main.Photo') }} :</label>
                            <input type="file" name="img" class="dropify" accept="image/*" data-height="70" />
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
<!-- end add modal -->