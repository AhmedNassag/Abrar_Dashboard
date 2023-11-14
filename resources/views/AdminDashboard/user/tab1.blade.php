<table style="width:100%; border:1px solid black; border-collapse: collapse;">
    @if($user->img)
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.Photo') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">
            <img alt="user-img" class="avatar avatar-xl brround mCS_img_loaded" src="{{ asset('public/attachments/user/'.$user->img) }}">
        </td>
    </tr>
    @endif
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.first_name') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ $user->first_name }}</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.last_name') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ $user->last_name }}</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.phone') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ $user->phone }}</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.country') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ app()->getLocale() == 'ar' ? $user->country->ar_name : $user->country->en_name }}</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.age') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ $user->age }}</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.credit') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ $user->credit }}</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.email') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ $user->email }}</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">{{ trans('main.status') }}</th>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: right;">
            @if ($user->active == 1)
                <span class="label text-success">
                    {{ app()->getLocale() == 'ar' ? 'مفعل' : 'Active' }}
                </span>
            @else
                <span class="label text-danger">
                    {{ app()->getLocale() == 'ar' ? 'غير مفعل' : 'InActive' }}
                </span>
            @endif
        </td>
    </tr>
</table>