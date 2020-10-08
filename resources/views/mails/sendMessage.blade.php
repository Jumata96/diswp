@component('mail::message')
{{$message}} 

Atte,<br>
{{$user->nombre }} {{$user->apellidos }}
@endcomponent
