<div class="table-responsive">
    <table class="table mg-b-0 text-md-nowrap">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">{{ trans('main.name') }}</th>
                <th class="text-center">{{ trans('main.date') }}</th>
                <th class="text-center">{{ trans('main.time') }}</th>
            </tr>
        </thead>
        <tbody>
            @if($teacher->courses->count() > 0)
                <?php $i = 0; ?>
                @foreach ($teacher->courses as $item)
                    <?php $i++; ?>
                    <tr>
                        <td class="text-center">{{ $i }}</td>
                        <td class="text-center">{{ $item->name }}</td>
                        <td class="text-center">{{ $item->date }}</td>
                        <td class="text-center">{{ $item->time }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th class="text-center" colspan="7">
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