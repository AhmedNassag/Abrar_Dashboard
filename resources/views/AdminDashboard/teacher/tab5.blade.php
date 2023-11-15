<div class="table-responsive">
    <table class="table mg-b-0 text-md-nowrap">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">{{ trans('main.name') }}</th>
                <th class="text-center">{{ trans('main.date') }}</th>
                <th class="text-center">{{ trans('main.time') }}</th>
                <th class="text-center">{{ trans('main.type') }}</th>
                <th class="text-center">{{ trans('main.reference') }}</th>
                <th class="text-center">{{ trans('main.rating') }}</th>
                <th class="text-center">{{ trans('main.note') }}</th>
            </tr>
        </thead>
        <tbody>
            @if($teacher->teacherRatings->count() > 0)
                <?php $i = 0; ?>
                @foreach ($teacher->teacherRatings as $item)
                    <?php $i++; ?>
                    <tr>
                        <td class="text-center">{{ $i }}</td>
                        <th class="text-center">{{ $item->user->full_name }}</th>
                        <th class="text-center">{{ $item->date }}</th>
                        <th class="text-center">{{ $item->time }}</th>
                        <th class="text-center">{{ $item->type }}</th>
                        <th class="text-center">{{ $item->reference }}</th>
                        <th class="text-center">
                            @for($i=0; $i < $item->rating; $i++)
                                <span class="fa fa-star checked"></span>
                            @endfor
                            ({{ $item->rating }})
                        </th>
                        <th class="text-center"> {{ $item->note }}</th>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th class="text-center" colspan="2">
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
</div>