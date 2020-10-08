@component('mail::message')
#Se registro un nuevo usuario
Nombre: **{{$newUser->nombre}} {{$newUser->apellidos}}**

Correo: **{{$newUser->email}}**

Usuario: **{{$newUser->usuario}}**


Atte,<br>
{{ config('app.name') }}
@endcomponent