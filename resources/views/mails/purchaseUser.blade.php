@component('mail::message')
# Hola, {{$purchase->nombre}} 

Gracias por comprar en {{ config('app.name') }}, tu pedido con codigo ** {{$purchase->idcarrito}} ** está siendo procesado.



@component('mail::table')
| Producto      | Cantidad      | Precio   |
| ------------- |:-------------:| --------:|
	@foreach($details as $detail)
	| {{$detail->descripcion}}      | {{$detail->cantidad}}     | {{$detail->total_det}}     |	
	@endforeach
|      | **TOTAL** |  ** {{$purchase->total_venta}}  **   |
@endcomponent



Puedes revisar el estado de tu pedido en el siguiente enlace.
@component('mail::button', ['url' => 'http://ardinitrading.com/public/cpanel'])
Ir a la Web
@endcomponent

Atte,<br>
{{ config('app.name') }}
@endcomponent
