@extends('layouts2.app')
@section('titulo','Bandeja de Correo')
@section('main-content')
<div id="app">
   <div id="mail-app" class="section">
      <div class="row">
         <div class="col s12">
            <nav class="gradient-45deg-blue-grey-blue-grey">
               <div class="nav-wrapper">
                  <div class="left col s12 m5 l5">
                     <ul>
                        <li>
                           <a href="#!" class="email-menu">
                           <i class="material-icons">menu</i>
                           </a>
                        </li>
                        <li><a href="#!" class="email-type">Bandeja de Correo</a>
                        </li>
                     </ul>
                  </div>
                  <div class="col s12 m7 l7 hide-on-med-and-down">
                     <ul class="right">
                        <li>
                           <a class="btn-floating waves-effect waves-light light-blue lighten-1 tooltipped modal-trigger" href="#newMessage" data-position="top" data-delay="500" data-tooltip="Enviar Nuevo Mensaje">
                           <i class="material-icons">email</i>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>
         </div>
         <div class="col s12">
            <div id="email-sidebar" class="col s2 m1 s1 card-panel">
               <ul>
                  <li>
                     <img src="../../images/avatar/avatar-3.png" alt="" class="circle responsive-img valign profile-image">
                  </li>
                  <li>
                     <a href="#!">
                     <i v-bind:class="{'material-icons':true, 'active':(bandeja === '1')}" v-on:click.prevent="showInbox">mail</i>
                     </a>
                  </li>
                  <li>
                     <a href="#!">
                     <i v-bind:class="{'material-icons':true, 'active':(bandeja === '3')}" v-on:click.prevent="showInboxHistorial">mail_outline</i>
                     </a>
                  </li>
                  <li>
                     <a href="#!">
                     <i v-bind:class="{'material-icons':true, 'active':(bandeja === '2')}" v-on:click.prevent="showOutbox">mail_outline</i>
                     </a>
                  </li>
               </ul>
            </div>
            <div id="email-list" class="col s10 m4 l4 card-panel z-depth-1" v-if="(bandeja == 1)">
               <ul class="collection">
                  <li class="collection-item avatar email-unread">
                     <i class="material-icons blue-text">group</i>
                     <span class="email-title">Bandeja de entrada</span>
                     <p class="truncate grey-text ultra-small">@{{contador}} mensajes.</p>
                  </li>
                  <li class="collection-item avatar"  v-for="msj in mensajes " :class="{'selected': msj.visto != 1} " v-on:click.prevent="updateView(msj)">
                     <span class="circle red lighten-1">S</span>
                     <span class="email-title">Para @{{msj.email_destino}}</span>
                     <p class="truncate grey-text ultra-small">Mensaje enviado por @{{msj.enviado_por}}</p>
                     <a href="#!" class="secondary-content email-time">
                     <span class="blue-text ultra-small"> @{{msj.fecha}}</span>
                     </a>
                  </li>
               </ul>
            </div>
            <div id="email-list" class="col s10 m4 l4 card-panel z-depth-1" v-if="(bandeja == 2)">
               <ul class="collection">
                  <li class="collection-item avatar email-unread">
                     <i class="material-icons blue-text">group</i>
                     <span class="email-title">Bandeja de Salida</span>
                     <p class="truncate grey-text ultra-small">@{{contador_salida}} mensajes.</p>
                  </li>
                  <li class="collection-item avatar" v-for="msjsa in mensajes_salida" v-on:click.prevent="viewOutbox(msjsa)">
                     <span class="circle red lighten-1">S</span>
                     <span class="email-title">Para @{{msjsa.email_destino}}</span>
                     <p class="truncate grey-text ultra-small">Mensaje enviado por @{{msjsa.enviado_por}}</p>
                     <a href="#!" class="secondary-content email-time">
                     <span class="blue-text ultra-small"> @{{msjsa.fecha}}</span>
                     </a>
                  </li>
               </ul>
            </div>
            <div id="email-list" class="col s10 m4 l4 card-panel z-depth-1" v-if="(bandeja == 3)">
               <ul class="collection">
                  <li class="collection-item avatar email-unread">
                     <i class="material-icons blue-text">group</i>
                     <span class="email-title">Bandeja Mensajes entrantes Vistos </span>
                     <p class="truncate grey-text ultra-small">@{{contador_vistos}} mensajes.</p>
                  </li>
                  <li class="collection-item avatar" v-for="msjsa in mensajes_vistos" v-on:click.prevent="viewOutbox(msjsa)">
                     <span class="circle red lighten-1">S</span>
                     <span class="email-title">Para @{{msjsa.email_destino}}</span>
                     <p class="truncate grey-text ultra-small">Mensaje enviado por @{{msjsa.enviado_por}}</p>
                     <a href="#!" class="secondary-content email-time">
                     <span class="blue-text ultra-small"> @{{msjsa.fecha}}</span>
                     </a>
                  </li>
               </ul>
            </div>
            <div id="email-details" class="col s12 m7 l7 card-panel" v-if="(cabecera == 2)">
               <p class="email-subject truncate" v-text="'Asunto: '+detalle_salida.asunto">
               </p>
               <hr class="grey-text text-lighten-2">
               <div class="email-content-wrap">
                  <div class="row">
                     <div class="col s10 m10 l10">
                        <ul class="collection">
                           <li class="collection-item avatar">
                              <span class="circle light-blue" >D</span>
                              <span class="email-title" v-text="'Para: '+detalle_salida.email_destino"></span>
                              <p class="truncate grey-text ultra-small" v-text="'De: '+detalle_salida.enviado_por"></p>
                              <p class="grey-text ultra-small" v-text="detalle_salida.fecha"></p>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="email-content">
                     <p v-text="detalle_salida.mensaje"></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div id="newMessage" class="modal modal-fixed-footer">
      <div class="modal-content">
         <div id="mail-app" class="section">
            <form action="{{ url('/mails/store') }}" method="POST">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="row">
                  <div class="col s12">
                     <nav class="gradient-45deg-blue-grey-blue-grey">
                        <div class="nav-wrapper">
                           <div class="left col s12 m5 l5">
                              <ul>
                                 <li>
                                    <a href="#!" class="email-menu">
                                    <i class="material-icons">menu</i>
                                    </a>
                                 </li>
                                 <li><a href="#!" class="email-type">Nuevo Mensaje</a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </nav>
                  </div>
                  <div class="col s12">
                     <div class="row">
                        @if (count($errors)>0)
                        <div id="card-alert" class="card red lighten-5">
                           <div class="card-content red-text">
                              <ul>
                                 @foreach ($errors->all() as $error)
                                 <li>{{$error}}</li>
                                 @endforeach
                              </ul>
                           </div>
                           <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">×</span>
                           </button>
                        </div>
                        @endif
                     </div>
                  </div>
                  <div class="col s12">
                     <div class="row">
                        <div class="input-field col s12">
                           <i class="material-icons prefix">email</i>
                           <input id="to" name="to" value="{{old('to')}}" type="text" class="validate">
                           <label for="to">Destinatario</label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="input-field col s12">
                           <i class="material-icons prefix">bookmark_border</i>
                           <input id="subject" name="subject" value="{{old('subject')}}" type="text" class="validate">
                           <label for="subject">Asunto</label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="input-field col s12">
                           <i class="material-icons prefix">question_answer</i>
                           <textarea id="message" name="message" value="{{old('message')}}" class="materialize-textarea"></textarea>
                           <label for="message">Mensaje</label>
                        </div>
                        <button class="btn gradient-45deg-indigo-light-blue right" type="submit">Enviar
                        <i class="material-icons right">send</i>
                        </button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div class="modal-footer">                
         <a id="cierra" href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Regresar</a>
      </div>
   </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
<script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>
<script type="text/javascript" >
   var app = new Vue({      
     el: '#app',
     data: {
       subject: 'hola',
       contador: '',
       contador_salida: '', 
       contador_vistos: '',  
       cabecera: '',
       encabezado : '',
       mensajes: [],
       mensajes_salida: [],      
       mensajes_vistos: [],     
       detalle_salida: [],       
       detalle_vistos: [],      
       detalles: [],
       errors: [],
       bandeja: '1',
     },
     created: function () {
       this.inbox();        
     },
     methods: {
       inbox: function(){
        var urlInbox = 'inbox';
         axios.get(urlInbox).then(response => {
             this.mensajes = response.data.mensajes; 
             this.contador = response.data.contador;
         });
       },
       outbox: function(){
         var urlOutbox = 'outbox';
         axios.get(urlOutbox).then(response => {
             this.mensajes_salida = response.data.mensajes; 
             this.contador_salida = response.data.contador;
         });
       },
       inboxHistorial: function(){
        var urlInboxH = 'inboxhistorial';
         axios.get(urlInboxH).then(response => {
             this.mensajes_vistos = response.data.mensajes; 
             this.contador_vistos = response.data.contador;
         });
       }, 
       updateView: function(msj){  
           console.log("ingreso");
           var urlVisto = 'inbox/visto/' + msj.id;            
           axios.get(urlVisto).then(response => {
             this.detalle_salida = response.data.detalle_salida;
             this.cabecera='2';
           }); 
         /* var urlInbox = 'inbox/' + msj.id;
           axios.get(urlInbox).then(response => {              
               this.encabezado = response.data.cabecera; 
               this.detalles = response.data.detalles;
               this.cabecera='2'; 
           }); */
         /* var urlOutboxDetail = 'outbox/' + msj.id;
         axios.get(urlOutboxDetail).then(response => {
             
         }); */
       }, 
       viewOutbox: function(msjsa){            
         var urlOutboxDetail = 'outbox/' + msjsa.id;
         axios.get(urlOutboxDetail).then(response => {
             this.detalle_salida = response.data.detalle_salida;
             this.cabecera='2';
         });
         
       },   
       showInbox: function(){
           this.bandeja= '1';
           this.cabecera= '';
           this.inbox();
   
       },
       showOutbox: function(){
           this.bandeja= '2';
           this.cabecera= '';            
           this.outbox();
   
       }, 
       showInboxHistorial: function(){
           this.bandeja= '3';
           this.cabecera= '';
           this.inboxHistorial();
            
   
       },
   
     }
   })
</script>
@endsection