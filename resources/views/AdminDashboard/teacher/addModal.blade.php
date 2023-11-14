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
                <form method="POST" action="{{ route('teacher.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- name -->
                        <div class="col-6">
                            <label for="name" class="mr-sm-2">{{ trans('main.Name') }} :</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
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
                        <!-- abstract -->
                        <div class="col-6">
                            <label for="abstract" class="mr-sm-2">{{ trans('main.abstract') }} :</label>
                            <input id="abstract" type="text" class="form-control" name="abstract" value="{{ old('abstract') }}">
                        </div>
                        <!-- certificate -->
                        <div class="col-6">
                            <label for="certificate" class="mr-sm-2">{{ trans('main.certificate') }} :</label>
                            <input id="certificate" type="text" class="form-control" name="certificate" value="{{ old('certificate') }}">
                        </div>
                        <!-- Achievement -->
                        <div class="col-6">
                            <label for="Achievement" class="mr-sm-2">{{ trans('main.Achievement') }} :</label>
                            <input id="Achievement" type="text" class="form-control" name="Achievement" value="{{ old('Achievement') }}">
                        </div>
                        <!-- languages -->
                        <div class="col-6">
                            <label for="languages" class="mr-sm-2">{{ trans('main.languages') }} :</label>
                            <input id="languages" type="text" class="form-control" name="languages" value="{{ old('languages') }}">
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