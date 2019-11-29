@component('mail::message')
# Mail Send To {{ $user->email }}


@component('mail::button', ['url' => ''])
Mail Send {{ csrf_token() }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
