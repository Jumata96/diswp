@extends('layouts2.app')
@section('titulo','Lista de items del carrusel')
@section('main-content')
<br> 
@include('forms.inicio.carrusel')  
@include('forms.inicio.seccion1')  
@include('forms.inicio.seccion2')   
@include('forms.inicio.seccion4')  
@include('forms.inicio.seccion5') 
@include('forms.inicio.seccion6') 
@endsection
@include('forms.scripts.toast')
@include('forms.inicio.seccion2.scripts.modalDGeneral')
@section('script')
{{-- @include('forms.inicio.scripts.delCarrusel')
@include('forms.inicio.scripts.habilitar')
@include('forms.inicio.scripts.desabilitar') --}}
@include('forms.inicio.seccion2.scripts.addGeneral') 
@include('forms.inicio.seccion4.updSeccion4')
@include('forms.inicio.seccion5.updSeccion5')
@include('forms.inicio.seccion6.scripts.updSeccion6')
@include('forms.inicio.seccion2.scripts.addDgeneral')
@include('forms.inicio.seccion2.scripts.updDgeneral')
@include('forms.inicio.seccion2.scripts.modificarSubtitulo') 

@include('forms.inicio.seccion1.scripts.addSeccion1') 

@endsection