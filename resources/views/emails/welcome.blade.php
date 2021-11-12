@component('mail::message')
# Hello, {{ $user->name }}

Welcome to your finance planner!
Get started!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
