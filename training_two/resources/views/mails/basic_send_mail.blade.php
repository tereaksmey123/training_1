@component('mail::message')
Dear Mr. {{ $user->name }}

# Introduction Basic Mail

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
