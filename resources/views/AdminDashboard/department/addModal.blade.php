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
                <form method="POST" action="{{ route('department.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- ar_name -->
                        <div class="col-6">
                            <label for="ar_name" class="mr-sm-2">{{ trans('main.ar_name') }} :</label>
                            <input id="ar_name" type="text" class="form-control" name="ar_name" value="{{ old('ar_name') }}">
                        </div>
                        <!-- en_name -->
                        <div class="col-6">
                            <label for="en_name" class="mr-sm-2">{{ trans('main.en_name') }} :</label>
                            <input id="en_name" type="text" class="form-control" name="en_name" value="{{ old('en_name') }}">
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