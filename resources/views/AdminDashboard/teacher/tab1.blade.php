<table style="width:100%; border:1px solid black; border-collapse: collapse;">
    @if($teacher->img)
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.Photo') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">
            <img alt="teacher-img" class="avatar avatar-xl brround mCS_img_loaded" src="{{ asset('public/attachments/teacher/'.$teacher->img) }}">
        </td>
    </tr>
    @endif
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.name') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ $teacher->name }}</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.email') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ $teacher->email }}</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.phone') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ $teacher->phone }}</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.abstract') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ $teacher->abstract }}</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.certificate') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ $teacher->certificate }}</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.Achievement') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ $teacher->Achievement }}</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.languages') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ $teacher->languages }}</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.busy') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">
            @if ($teacher->busy == 'false')
                <span class="label text-success">
                    {{ app()->getLocale() == 'ar' ? 'متاح' : 'Active' }}
                </span>
            @else
                <span class="label text-danger">
                    {{ app()->getLocale() == 'ar' ? 'منشغل' : 'InActive' }}
                </span>
            @endif
        </td>
    </tr>
</table>