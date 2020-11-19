<template>
<header id="header" class="page-topbar z-depth-1">
      <!-- start header nav-->
      <div class="navbar-fixed ">
        <nav class="navbar-color blue darken-1" >
            <div class="nav-wrapper">
            <!-- 
            <div class="header-search-wrapper hide-on-med-and-down sideNav-lock">
              <i class="material-icons">search</i>
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Buscar en ardiniTrading" />
            </div>
            -->
            <ul class="right hide-on-med-and-down"  >
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button" data-activates="translation-dropdown">
                  <span class="flag-icon flag-icon-gb"></span>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                  <i class="material-icons">settings_overscan</i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
                  <i class="material-icons">notifications_none
                    <small class="notification-badge" v-text="contador" > </small>
                  </i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <img src="images/avatar/avatar-7.png" alt="avatar"> 
                    <i></i>
                  </span>
                </a>
              </li>
            </ul> 
            <!-- notifications-dropdown --> 
            <ul id="notifications-dropdown" class="dropdown-content" >
               <!-- style="max-width: 10px" -->
              <li>
                <h6>NOTIFICACIONES
                  <span class="new badge" v-text="contador"></span>
                </h6>
              </li>
              <li class="divider"></li>
              <!-- <li  v-for="mensaje  in arrayNotificaciones" >
                <div >
                    <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle red small">stars</span >{{mensaje.asunto}}</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                </div>
              </li>  -->
               
                  <li   v-for="mensaje  in arrayNotificaciones"  >
                    <a href="#!" class="grey-text text-darken-2" >
                    <span class="material-icons icon-bg-circle cyan small" >mail</span>{{mensaje.asunto}}  </a>
                    <time class="media-meta" > <timeago :datetime="mensaje.fecha"  :auto-update="60"></timeago></time>
                </li> 
              <!-- <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
              </li>  -->
            </ul>
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
              <li><a href="#" style="color: black">
                <i class="material-icons">face</i> Perfil</a>
              </li>              
              <li class="divider"></li>                              
              <li style="padding-top: 15px"><a  href="cerrar" style="color: black">
                <i class="material-icons">keyboard_tab</i> Cerrar</a>
              </li>
            </ul>
          </div>
      
        </nav>
      </div>
    </header> 
            
              
            
</template> 
<script>

      import VueTimeago from 'vue-timeago'

      Vue.use(VueTimeago, {
        name: 'Timeago', // Component name, `Timeago` by default 
        locale: 'es', // Default locale
        // We use `date-fns` under the hood
        // So you can use all locales from it
        locales: {
          'es': require('date-fns/locale/es'),
          ja: require('date-fns/locale/ja')
        }
      }) 
    Pusher.logToConsole = false;

    var pusher = new Pusher('72146366323ab1d0cfc2', {
      cluster: 'us2'
    }); 
    export default {
        name: 'notificaciones',  
        data() {
            return { 
                arrayNotificaciones:[],  
                 contador: '0', 
            }
        },
        mounted() { 
            this.listarNotificaciones(); 
             this.obtener(); 
            } ,
        methods: {
            listarNotificaciones() {
                let me =this;  
                axios.get('mensajesNuevos') .then(function (response) {  
                     me.arrayNotificaciones=response.data.mensajes;
                     me.contador=response.data.contador; 
                })
                .catch(function (error) { 
                    console.log(error);
                });
            } ,
            obtener(){
                let me =this; 
                var channel = pusher.subscribe('message-tracker'); 
                    channel.bind('MessageStatusChangedEvent', function(data) {
                    //   app.messages.push(JSON.stringify(data));  
                      me.arrayNotificaciones.push(data.message.mensajes);
                      me.contador=me.contador+data.message.contador; 
                    
                    });
               
            }
              
        }
    }
</script>