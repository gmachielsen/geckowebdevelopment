@component('mail::message')
# Je hebt een bericht ontvangen

Nieuw bericht van {{$data['name']}}, met emailadres: {{ $data['email']}}, heeft een bericht gestuurd met het volgende onderwerp: {{ $data['subject']}} met het volgende bericht: {{ $data['message']}} 
<!-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent -->

Thanks,<br>
{{ config('app.name') }}
@endcomponent
