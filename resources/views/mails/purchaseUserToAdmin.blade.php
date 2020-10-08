@component('mail::message')
# Se acaba de registrar una nueva compra 
Cliente: **{{$purchase->nombre}} {{$purchase->apellidos}}** 
Codigo de compra: ** {{$purchase->idcarrito}} **

@component('mail::table')
| Producto      | Cantidad      | Precio   |
| ------------- |:-------------:| --------:|
	@foreach($details as $detail)
	| {{$detail->descripcion}}      | {{$detail->cantidad}}     | {{$detail->total_det}}     |	
	@endforeach
|      | **TOTAL** |  ** {{$purchase->total_venta}}  **   |
@endcomponent



Puara mas detalles visite la web.
@component('mail::button', ['url' => 'http://ardinitrading.com/public/cpanel'])
Ir a la Web
@endcomponent

Atte,<br>
{{ config('app.name') }}
@endcomponent