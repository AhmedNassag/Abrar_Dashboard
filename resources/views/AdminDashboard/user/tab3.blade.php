<div class="table-responsive">
    <table class="table mg-b-0 text-md-nowrap">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">{{ trans('main.teacher') }}</th>
                <th class="text-center">{{ trans('main.comment') }}</th>
                <th class="text-center">{{ trans('main.rating') }}</th>
            </tr>
        </thead>
        <tbody>
            @if($user->comments->count() > 0)
                <?php $i = 0; ?>
                @foreach ($user->comments as $item)
                    <?php $i++; ?>
                    <tr>
                        <td class="text-center">{{ $i }}</td>
                        <th class="text-center">{{ $item->teacher->name }}</th>
                        <td class="text-center">{{ $item->comment }}</td>
                        <td class="text-center">
                            @for($i=0; $i < $item->rating; $i++)
                                <span class="fa fa-star checked"></span>
                            @endfor
                            ({{ $item->rating }})
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th class="text-center" colspan="4">
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