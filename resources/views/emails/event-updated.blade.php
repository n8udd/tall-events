@component('mail::message')
# Event Updated

{{$event->title}} has been updated.

@component('mail::button', ['url' => route('events.show', $event)])
Go to event
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent