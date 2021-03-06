<?php
 
use InnovaTec\Events\MessageStatusChangedEvent; 
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Ruta para acceder a la Pagina Web
Route::get('/', 'PageController@index'); 

Route::get('/fire2', function () {

    $msjs = DB::table('mensaje')
            ->select('id','enviado_por','email_destino','asunto','mensaje', 'fecha','visto')   
            ->where([
                ['entrante',1],
                ['visto',0]
            ])       
            ->orderBy('fecha', 'desc')        
            ->first(); 
            $cont = 1;    
            
   
        // return ['mensajes' => $msjs, 'contador' => $cont];


    event(new MessageStatusChangedEvent(['mensajes' => $msjs, 'contador' => $cont])); 
	return 'Fired';
});

/* Route::get('/index', 'PaginaController@index'); */
Route::get('/index2', 'PageController@index');
Route::get('/contactanos', 'PageController@contactanos');
Route::post('/constactanos/mensaje', 'PageController@store');
//Contactanos
Route::post('/mensajes/grabar', 'ContactanosController@storeMensajes');
//NOSOTROS
Route::get('nosotros', 'PaginaController@nosotros'); 
//Gestion de Acceso al Cliente
Route::get('/usuarioLogin', 'ClienteController@inicio');
Route::get('/portal-usuario', 'ClienteController@portal');
Route::get('/sistema', 'ClienteController@portal');
Route::get('/registroUsuario', 'ClienteController@registro');
//Login para acceder al cPanel Empresarial
Route::get('/cpanel', 'ClienteController@inicio');
Route::view('/login', 'ClienteController@inicio');
/* Route::get('/userReg', 'Auth\LoginController@usuarioRegistrado'); */
//Pagina de Registro
Route::view('/registrar', 'auth.register');
//Pagina de Inicio del cPanel
Route::get('/home', 'HomeController@index')->name('home');
//Metodo que cierra la sesion del usuario
Route::get('/cerrar', 'HomeController@cerrar');
//Pruebas Exportar/Importar
Route::get('/herr', 'HerramientasController@index')->name('products');
Route::get('descargar-productos', 'HerramientasController@excel')->name('products.excel');
//API SOCIAL LOGIN
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');
//Rutas de Prueba y Testeo
Route::view('mantenedor', 'forms.plantillas.mntBasico');
Route::view('plantilla', 'forms.test.plantilla');
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    //prueba
    Route::get('/prueba', 'PruebaController@index');
    Route::get('/prueba/nuevo', 'PruebaController@create');
    Route::post('/prueba/grabar', 'PruebaController@store');
    //Empresa
    Route::get('/empresa', 'EmpresaController@index');
    Route::get('/empresa/nuevo', 'EmpresaController@create');
    Route::post('/empresa/grabar', 'EmpresaController@store');
    Route::get('/empresa/mostrar/{id}', 'EmpresaController@show');
    Route::post('/empresa/actualizar', 'EmpresaController@update');
    Route::get('/empresa/eliminar/{id}', 'EmpresaController@destroy');
    //Usuarios
    Route::get('/usuarios', 'UsuarioController@index');
    Route::get('/usuario/nuevo', 'UsuarioController@create');
    Route::post('/usuario/grabar', 'UsuarioController@store');
    Route::get('/usuario/mostrar/{id}', 'UsuarioController@show');
    Route::post('/usuario/actualizar', 'UsuarioController@update');
    Route::get('/usuario/eliminar/{id}', 'UsuarioController@destroy');
    Route::post('/usuario/desabilitar', 'UsuarioController@disabled');
    Route::post('/usuario/habilitar', 'UsuarioController@habilitar');
    Route::post('/usuario/updContra', 'UsuarioController@updContra');
    //Parametros
    Route::get('/parametros', 'ParametrosController@index');
    Route::post('/parametros/actualizar', 'ParametrosController@update');
    // -----------------------------------------------------------------PAGINA ------------------------------------------------- 
    
    Route::get('/inicio', 'InicioController@index'); 
    //Carrusel
    Route::get('/carrusel/nuevo', 'CarruselController@create');
    Route::post('/carrusel/grabar', 'CarruselController@store');
    Route::post('/carrusel/grabar2', 'CarruselController@store'); 
    Route::get('/carrusel/mostrar/{id}', 'CarruselController@show');
    Route::post('/carrusel/actualizar', 'CarruselController@update');


    Route::get('/carrusel/eliminar/{id}', 'CarruselController@destroy'); 
    Route::get('/carrusel/desabilitar/{id}', 'CarruselController@disabled'); 
    Route::get('/carrusel/habilitar/{id}', 'CarruselController@habilitar'); 

    //SECCION1
     Route::get('/seccion1/mostrar/{id}', 'InicioController@showSeccion1');
     Route::post('/seccion1Det/actualizar', 'InicioController@updateSeccion1Det');
     Route::post('/seccion1/actualizar', 'InicioController@updateSeccion1');


    //SECCION2
    Route::post('/seccion2/grabar', 'Seccion2Controller@store');
    Route::post('/seccion2/grabarD', 'Seccion2Controller@storeD');
    Route::post('/seccion2/actualizarD', 'Seccion2Controller@actualizarD'); 

    Route::get('/seccion2/mostrar/{id}', 'seccion2Controller@show');
    Route::get('/seccion2/eliminar/{id}', 'seccion2Controller@destroy');
    Route::get('/seccion2/desabilitar/{id}', 'seccion2Controller@desabilitar');
    Route::get('/seccion2/habilitar/{id}', 'Seccion2Controller@habilitar');


     //SECCION4
    Route::post('/seccion4/actualizar', 'InicioController@updateSeccion4');
    //SECCION 5
    Route::post('/seccion5/actualizar', 'InicioController@updateSeccion5');
    //SECCION 6
    Route::post('/seccion6/actualizar', 'InicioController@updateSeccion6');
    Route::get('/seccion6/nuevo'      , 'Seccion6Controller@addSeccion6');

    Route::post('/seccion6Det/actualizar', 'Seccion6Controller@store');
    Route::post('/seccion6Det/actualizarDet', 'Seccion6Controller@update');
    
    Route::get('/seccion6/mostrar/{id}', 'Seccion6Controller@show'); 
    Route::get('/seccion6Det/eliminar/{id}', 'Seccion6Controller@destroy');
    Route::get('/seccion6Det/desabilitar/{id}', 'Seccion6Controller@desabilitar');
    Route::get('/seccion6Det/habilitar/{id}', 'Seccion6Controller@habilitar'); 

    //---------------------------NOSOTROS-------------------------
    //Misión
    Route::get('/mision', 'MisionController@index');
    Route::post('/mision/actualizar', 'MisionController@update');
    //dMisión
    Route::post('/dmision/grabar', 'MisionController@store');
    Route::post('/dmision/actualizar', 'MisionController@dUpdate');
    Route::post('/dmision/iactualizar', 'MisionController@imgUpdate');
    Route::post('/dmision/imgGrabar', 'MisionController@imgStore');
    Route::post('/dmision/desabilitar', 'MisionController@disabled');
    Route::post('/dmision/habilitar', 'MisionController@habilitar');
    Route::post('/dmision/eliminar', 'MisionController@destroy');
    //Visión
    Route::get('/vision', 'VisionController@index');
    Route::post('/vision/actualizar', 'VisionController@update');
    //dVisión
    Route::post('/dvision/grabar', 'VisionController@store');
    Route::post('/dvision/imgGrabar', 'VisionController@imgStore');
    Route::post('/dvision/actualizar', 'VisionController@dUpdate');
    Route::post('/dvision/iactualizar', 'VisionController@imgUpdate');
    Route::post('/dvision/desabilitar', 'VisionController@disabled');
    Route::post('/dvision/habilitar', 'VisionController@habilitar');
    Route::post('/dvision/eliminar', 'VisionController@destroy');
    //General
    Route::get('/general', 'GeneralController@index');
    Route::post('/general/actualizar', 'GeneralController@update');
    //dGeneral
    Route::post('/dgeneral/grabar', 'GeneralController@store');
    Route::post('/dgeneral/imgGrabar', 'GeneralController@imgStore');
    Route::post('/dgeneral/actualizar', 'GeneralController@dUpdate');
    Route::post('/dgeneral/iactualizar', 'GeneralController@imgUpdate');
    Route::post('/dgeneral/desabilitar', 'GeneralController@disabled');
    Route::post('/dgeneral/habilitar', 'GeneralController@habilitar');
    Route::post('/dgeneral/eliminar', 'GeneralController@destroy');
    Route::post('/getImgURL', 'GeneralController@getImgURL');
    //Productos
    Route::get('/productos', 'ProductoController@index');
    Route::get('/producto/nuevo', 'ProductoController@create');
    Route::post('/producto/grabar', 'ProductoController@store');
    Route::get('/producto/mostrar/{id}', 'ProductoController@show');
    Route::post('/producto/actualizar', 'ProductoController@update');
    Route::post('/producto/eliminar', 'ProductoController@destroy');
    Route::post('/producto/desabilitar', 'ProductoController@disabled');
    Route::post('/producto/habilitar', 'ProductoController@habilitar');
    Route::post('/producto/dltImagen', 'ProductoController@dltImagen');
    Route::post('/producto/buscar', 'ProductoController@buscarProducto');
    Route::post('/tipo/buscar', 'ProductoController@buscarTipo');
    //Linea
    Route::get('/grupo', 'GrupoController@index');
    Route::post('/grupo/grabar', 'GrupoController@store');
    Route::post('/grupo/actualizar', 'GrupoController@update');
    Route::post('/grupo/desabilitar', 'GrupoController@disabled');
    Route::post('/grupo/habilitar', 'GrupoController@habilitar');
    Route::post('/grupo/eliminar', 'GrupoController@destroy');
    //Tipo
    Route::get('/tipo', 'TipoController@index');
    Route::post('/tipo/grabar', 'TipoController@store');
    Route::post('/tipo/actualizar', 'TipoController@update');
    Route::post('/getTipo', 'TipoController@getTipo');
    Route::post('/tipo/desabilitar', 'TipoController@disabled');
    Route::post('/tipo/habilitar', 'TipoController@habilitar');
    Route::post('/tipo/eliminar', 'TipoController@destroy');
    //Herramientas
    Route::get('/herramientas', 'HerramientasController@index');
    Route::post('herramientas/importarLinea', 'HerramientasController@importarLinea');
    Route::post('herramientas/importarTipo', 'HerramientasController@importarTipo');
    Route::post('herramientas/importarProductos', 'HerramientasController@importarProductos');
    Route::post('/herramientas/importarImagenes', 'HerramientasController@importarImagenes');
    //Contactanos
    Route::get('/mntContactanos', 'ContactanosController@index');
    Route::post('/contactanos/actualizar', 'ContactanosController@update');
    //Detalle
    Route::post('/contactanos/dGrabar', 'ContactanosController@storeDetalle');
    Route::post('/contactanos/dActualizar', 'ContactanosController@updateDetalle');
    Route::post('/contactanos/dEliminar', 'ContactanosController@destroy');
    Route::post('/contactanos/desabilitar', 'ContactanosController@disabled');
    Route::post('/contactanos/habilitar', 'ContactanosController@habilitar');
    //Nosotros
    Route::get('/mntNosotros', 'NosotrosController@index');
    Route::post('/nosotros/actualizar', 'NosotrosController@update');
    Route::post('/nosotros/iactualizar', 'NosotrosController@imgUpdate');
    //dMisión
    Route::get('/mntMision', 'NosotrosController@mIndex');
    Route::post('/nmision/actualizar', 'NosotrosController@mUpdate');
    Route::post('/nmision/iactualizar', 'NosotrosController@mImgUpdate');
    //dvision
    Route::get('/mntVision', 'NosotrosController@vIndex');
    Route::post('/nvision/actualizar', 'NosotrosController@vUpdate');
    Route::post('/nvision/iactualizar', 'NosotrosController@vImgUpdate');
    //Cliente
    Route::get('/clientes', 'ClienteController@index');
    Route::get('/cliente/nuevo', 'ClienteController@create');
    Route::post('/cliente/grabar', 'ClienteController@store');
    Route::get('/cliente/mostrar/{id}', 'ClienteController@show');
    Route::post('/cliente/actualizar', 'ClienteController@update');
    Route::get('/cliente/eliminar/{id}', 'ClienteController@destroy');
    Route::get('/cliente/desabilitar/{id}', 'ClienteController@disabled');
    Route::get('/cliente/habilitar/{id}', 'ClienteController@habilitar');
    //Perfil Cliente
    Route::get('/perfil', 'ClienteController@perfil');
    Route::post('/perfil/actualizar', 'ClienteController@updPerfil');
    //Formas de Pago
    Route::get('/formas-de-pago', 'FormasPagoController@index');
    Route::post('/fpago/grabar', 'FormasPagoController@store');
    Route::post('/fpago/actualizar', 'FormasPagoController@update');
    Route::post('/fpago/desabilitar', 'FormasPagoController@disabled');
    Route::post('/fpago/habilitar', 'FormasPagoController@habilitar');
    Route::post('/fpago/eliminar', 'FormasPagoController@destroy');
    //Pedidos
    Route::get('/pedidos', 'PedidosController@index');
    //Documentos Electrónicos CPanel Clientes
    Route::get('/eDocs', 'EDocsController@index');
    //Compras
    Route::get('/compras', 'ComprasController@index');
    //Carrito Compras - Validar datos para la Compra
    Route::post('/compras/guardar', 'ComprasController@addCompra');
    Route::get('/compra/mostrar/{id}', 'ComprasController@show');
    Route::get('/compra-finalizada', 'ComprasController@finCompra');
    //Pagos
    Route::get('/pagos', 'PagosController@index');
    Route::get('/pagos/mostrar/{id}', 'PagosController@show');
    Route::get('/pago/mostrar/{id}', 'PagosController@show2');
    Route::post('/pagos/imgGrabar', 'PagosController@imgUpdate');
    Route::post('/pago/rechazar', 'PagosController@rechazar');
    Route::post('/pago/aceptar', 'PagosController@aceptar');
    Route::get('/excel/exportar/{id}', 'PagosController@exportExcelPedido');
    //Helpers
    Route::view('/colores', 'forms.helpers.colores');
    Route::view('/iconos', 'forms.helpers.iconos');
    //Correos
    Route::get('/mails', 'MailController@index');
    Route::post('/mails/store', 'MailController@send');
    Route::get('/inbox', 'MailController@obtenerMensajes');
    Route::get('/outbox', 'MailController@obtenerMensajesSalida');
    Route::get('/inboxhistorial', 'MailController@obtenerMensajesHistorial');
    Route::get('/mensajesNuevos', 'MailController@obtenerMensajesNuevos'); 
    Route::get('/inbox/visto/{id}', 'MailController@visto');
    Route::get('/inbox/{id}', 'MailController@detalle');
    Route::get('/outbox/{id}', 'MailController@detalleSalida');
    Route::get('/inboxUser/{id}', 'MailController@detalleNuevoUsuario');
    //videos
    Route::get('/lstVideos', 'VideoController@lstVideo');
    Route::get('/mntVideos', 'VideoController@mntVideo');
    Route::get('/hotspot/pagina-publicidad', 'VideoController@publicidad');
    Route::get('videos/nuevo', 'VideoController@create');
    Route::post('/carrusel/grabar', 'VideoController@store');
    Route::get('/videos/mostrar/{id}', 'VideoController@show');
    Route::post('/videos/update', 'VideoController@update');
    Route::get('/videos/eliminar/{id}', 'VideoController@destroy');
    Route::get('/videos/desabilitar/{id}', 'VideoController@desabilitar');
    Route::get('/videos/habilitar/{id}', 'VideoController@habilitar');
    //horarios
    Route::get('/lsthorarios', 'HorariosController@lstHorarios');
    Route::get('/addHorarios', 'HorariosController@addHorarios');
    Route::post('/horarios/grabar', 'HorariosController@store');
    Route::post('/horarios/update', 'HorariosController@update');
    Route::get('/horarios/mostrar/{id}', 'HorariosController@show');
    Route::get('/horarios/eliminar/{id}', 'HorariosController@destroy');
    Route::get('/horarios/desabilitar/{id}', 'HorariosController@desabilitar');
    Route::get('/horarios/habilitar/{id}', 'HorariosController@habilitar');
    //Cursos
    Route::get('/lstCursos', 'CursosController@lstCursos');
    Route::get('/addCursos', 'CursosController@addCursos');
    Route::post('/Cursos/grabar', 'CursosController@store');
    Route::post('/Cursos/update', 'CursosController@update');
    Route::get('/Cursos/mostrar/{id}', 'CursosController@show');
    Route::get('/Cursos/eliminar/{id}', 'CursosController@destroy');
    Route::get('/Cursos/desabilitar/{id}', 'CursosController@desabilitar');
    Route::get('/Cursos/habilitar/{id}', 'CursosController@habilitar');
    Route::get('/Curso/{id}', 'CursosController@showClientes');
    Route::get('/Curso/videos/{id}', 'CursosController@showClientesVideos');
    //view clientes
    Route::get('/Cursos/disponibles', 'CursosController@lstcursosCliente');
    //Permisos permisos
    Route::get('/lstPermisos', 'PermisosController@lstPermisos');
    Route::get('/addPermisos', 'PermisosController@addPermisos');
    Route::post('/permisos/grabar', 'PermisosController@store');
    Route::get('/permisos/gestionar/{id}', 'PermisosController@show');
    Route::post('/permisos/gestionar/videos', 'PermisosController@asignarVideos');
    Route::post('/permisos/gestionarClientes', 'PermisosController@asignarClientes');
    Route::get('/permisos/clientesEliminar/{id}', 'CursosController@destroy');
    Route::get('/permisos/clientesDesabilitar/{id}', 'CursosController@desabilitar');
    Route::get('/permisos/clientesHabilitar/{id}', 'CursosController@habilitar');
    Route::get('/permisos/mostrar/{id}', 'PermisosController@show');
    Route::get('/permisos/eliminar/{id}', 'PermisosController@destroy');
    Route::get('/permisos/desabilitar/{id}', 'PermisosController@desabilitar');
    Route::get('/permisos/habilitar/{id}', 'PermisosController@habilitar');
    Route::get('/permisos/eliminarVideo/{id}', 'PermisosController@destroyVideo');
    Route::get('/permisos/desabilitarVideo/{id}', 'PermisosController@desabilitarVideo');
    Route::get('/permisos/habilitarVideo/{id}', 'PermisosController@habilitarVideo');
    // mapa autocomplete
    Route::get('/mapa', 'MapaController@mapaPrueba');
    Route::post('/recibir', 'MapaController@recibir');
    Route::post('/pasar', 'MapaController@pasar');
    Route::post('/pasarCreate', 'MapaController@pasarCreate');
});
