<?php

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

Route::get('/', 'HomeController@login');
Route::get('error404', [

        'as' => 'error404',
        'uses' => 'HomeController@error404',
]);
    
//LANDING PAGE
Route::get('es/{slug}', 'PageController@landing');

// LOGIN ROUTES
Route::get('access', 'Auth\LoginController@showLoginForm')->name('access');
Route::post('access',[
        'as' => 'login',
        'uses' => 'Auth\LoginController@login'
]);
Route::post('userverified', 'Admin\DashboardController@userverified');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('home', 'Admin\DashboardController@index');

Route::get('test', function(){

        return view('partials.mail3');
});

Route::get('forgotpassword', [
        'as' => 'forgotpassword',
        'uses' => 'Auth\ResetPasswordController@showforgoForm'
    ]);


Route::post('forgotpassword', 'Auth\ResetPasswordController@fortgopass');


Route::get('buscar/departamento', 'Admin\Tablasmaestras\TablasmaestrasController@Departament');

Route::get('buscar/ciudad', 'Admin\Tablasmaestras\TablasmaestrasController@City');


Route::middleware(['auth'])->group(function(){

    // **************************************
    // Dashboard
    Route::get('dashboard', [
            'uses' => 'Admin\DashboardController@index',
            'as' => 'dashboard']);

    Route::get('dashboard/perfil',[
        'as' => 'dashboard/perfil',
        'uses' => 'Admin\DashboardController@perfil'
        ]);

    Route::get('dashboard/cambiar',[
        'as' => 'dashboard/cambiar',
        'uses' => 'Admin\DashboardController@cambiar'
        ]);
	// **************************************
	// Roles
    Route::resource('roles', 'Admin\RoleController');
    Route::resource('permissions', 'Admin\PermissionController');

    // **************************************
	// Usuarios
	Route::resource('users', 'Admin\UsersController');
    Route::resource('userdetails', 'Admin\ProfileController');
    Route::resource('copropiedadxusers', 'Admin\CopropiedadxUsersController');
  
    Route::get('configuracion/{id}', 'Admin\UsersController@configuracion');
    Route::get('show/users/{id}', 'Admin\UsersController@showuser');
    
    Route::get('edit/users/{id}', 'Admin\UsersController@edituser');
    Route::post('savenewuser', 'Admin\UsersController@savenewuser');
    Route::put('updateuser/{id}', 'Admin\UsersController@updateuser');
    Route::get('delete/{id}', 'Admin\ProfileController@delete');
    //CopropiedadxUsers
    Route::post('getcopropiedadesjs', 'Admin\CopropiedadxUsersController@getCopropiedades');
    Route::post('getcopropiedadxusersjs', 'Admin\CopropiedadxUsersController@getCopropiedadUsersjs');
    Route::post('deletecopropiedadxusersjs', 'Admin\CopropiedadxUsersController@deleteCopropiedadUsers');

    // Rutas de Javascript
    Route::post('saveprofilejs', 'Admin\UsersController@saveprofilejs');
    Route::post('getprofilejs', 'Admin\UsersController@getprofilejs');
  

    // **************************************
	// copropiedad
    Route::resource('copropiedad', 'Admin\Miregistro\CopropiedadController');

    Route::get('copropiedad/upload/file',[
        'as'    => 'copropiedad/upload/file',
        'uses'  => 'Admin\Miregistro\CopropiedadController@uploadfile'
    ]);

    Route::get('edit/upload/file/{id}',[
        'as'    => 'edit/upload/file/{id}',
        'uses'  => 'Admin\Miregistro\CopropiedadController@editfile'
    ]);

    Route::post('copropiedad/uploading', [
        'as'  =>'copropiedad/uploading',
        'uses'  => 'Admin\Miregistro\CopropiedadController@uploadingfile'
    ]);

    Route::get('testemail/{id}', 
        'Admin\Miregistro\CopropiedadController@testemail');

     // **************************************
    // inmuebles
    Route::resource('micopropiedad', 'Admin\Miregistro\MicopropiedadController');

    // **************************************
    // inmuebles
    Route::resource('inmueble', 'Admin\Miregistro\InmueblesController');

    // **************************************
    // **************************************
    // **************************************
    // obligaciones
    
    
    Route::resource('obligaciones', 'Admin\Ingresos\ObligacionesController');
    Route::get('obligacion/especial', 'Admin\Ingresos\ObligacionesController@especial');  
    
    Route::get('obligaciones-pagos', [
        'as' => 'obligaciones-pagos',
        'uses' => 'Admin\Ingresos\IngresosController@index'
    ]);

    Route::post('obligaciones-pagos-update', [
        'as' => 'obligaciones-pagos-update',
        'uses' => 'Admin\Ingresos\IngresosController@updatePagos'
    ]);

    Route::post('api/obligaciones-getInvoice', [
        'as' => 'api/obligaciones-getInvoice',
        'uses' => 'Admin\Ingresos\IngresosController@getInvoice'
    ]);
   
    Route::get('desprendibles', 'Admin\Ingresos\ObligacionesController@desprendible'); 
    
      
    
    Route::get('generar/desprendible/{id}', 'Admin\Ingresos\ObligacionesController@desprendible_download');
   
    Route::post('buscar/desprendibles', 'Admin\Ingresos\ObligacionesController@getdesprendible');
   
    
    Route::get('preliminar/obligaciones', function(){
              
            return view('admin.ingresos.preliminar');
    });

    Route::get('preliminar/configuracion', function(){
              
            return view('admin.ingresos.variables_configuracion');
    });
    
    Route::resource('conceptosfinancieros', 'Admin\Ingresos\ConceptosFinancierosController');
    
    Route::resource('configfactura',    'Admin\Ingresos\ConfigfacturaController');
 
    Route::get('buscar/conceptosfinancieros', 'Admin\Ingresos\ConceptosFinancierosController@conceptosquery');
    
    Route::get('get/conceptosfinancieros', 'Admin\Ingresos\ConceptosFinancierosController@getconceptos');
    // TABLAS MAESTRAS *******************************
    Route::get('tablasmaestras', 'Admin\Tablasmaestras\TablasmaestrasController@index');
   
    Route::get('getsession', 'Admin\Tablasmaestras\TablasmaestrasController@getsession');
    Route::get('clearsession', 'Admin\Tablasmaestras\TablasmaestrasController@clearsession');

    Route::resource('bloques', 'Admin\Miregistro\BloquesController');

    Route::resource('tipocopropiedad', 'Admin\Miregistro\TipocopropiedadController');

    Route::resource('tipoinmueble', 'Admin\Miregistro\TipoinmuebleController');

    // **************************************
    // **************************************
    // Copropiedad Usuario administrador Delegado
    // **************************************
    // **************************************

        Route::post('login_copropiedad', 'Admin\DashboardController@copropiedad');
         Route::get('dashboard/no_body', [
            'as'  => 'dashboard/no_body',
            'uses'=> 'Admin\DashboardController@no_body'
            ]);
        Route::get('mail', 'Admin\Miregistro\CopropiedadController@notificable');

        Route::resource('zonascomunes', 'Admin\zonascomunes\ZonasComunesController');
        Route::resource('reservas', 'Admin\zonascomunes\ReservasController');
        Route::get('reserva/zona/{slug}', 'Admin\zonascomunes\ReservasController@Reserva');

      
        // **************************************
        // landing
        //***************************************
     
            Route::resource('landing-page', 'Admin\Landing\LandingController');

            Route::post('landing/upload/logo', 'Admin\Landing\LandingController@logo');

            Route::post('landing/uploads', 'Admin\Landing\LandingController@uploads');

            Route::post('landing/update/text', 'Admin\Landing\LandingController@textinput');

            Route::post('landing_eliminar', 'Admin\Landing\LandingController@delete');

    // **************************************
    // **************************************
    // Usuario Propietario
    //***************************************
    // **************************************
        Route::post('login_inmueble', 'Admin\DashboardController@inmueble');
        Route::get('misobligaciones', 'Propietario\MisObligacionesController@index');
        
        Route::get('cliente/zonascomunes', 'Propietario\ZonasComunesController@index');
        
        Route::get('cliente/zona/{slug}', 'Propietario\ZonasComunesController@detallezona');


        Route::get('cliente/reservas/{slug}', 'Propietario\ReservasController@reserva');

        Route::POST('api/get/reservas', 'Propietario\ReservasController@getreservasjs');

        Route::POST('api/post/reservas', 'Propietario\ReservasController@savereservasjs');

        Route::get('cliente/prueba', 'Propietario\ReservasController@prueba');

         Route::resource('miregistro', 'Propietario\MiregistroController');

         Route::get('cliente/propietario', [
            'as' => 'cliente/propietario',
            'uses'=> 'Propietario\PropietarioController@index'
        ]);
         
        Route::resource('propietario', 'Propietario\PropietarioController');


         Route::post('save/propietario', 'Propietario\PropietarioController@savepropietario');

          Route::post('propietario/residente/savejs', 'Propietario\PropietarioController@savepropietarioresidente');

        Route::post('/propietario/residente/saverarrendatariojs', 'Propietario\PropietarioController@saverarrendatariojs');


          Route::get('cliente/propietario/validacion', [
            'as' => 'cliente/propietario/validacion',
            'uses'=> 'Propietario\PropietarioController@validacion'
        ]);

          Route::post('cliente/getvalidacionpropietario', 'Propietario\PropietarioController@getvalidacion');

          Route::get('cliente/propietario/residentes/form', [
            'as' => 'cliente/propietario/residente/form',
            'uses'=> 'Propietario\PropietarioController@propietarioresidenteform'
        ]);

            Route::get('cliente/propietario/residentes/formresidente', [
            'as' => 'cliente/propietario/residente/formresidente',
            'uses'=> 'Propietario\PropietarioController@residenteform'
        ]);
         


         
         

        // **************************************
        // **************************************
        // Usuario Residente
        //***************************************
        // **************************************

          Route::get('cliente/residente', [
            'as' => 'cliente/residente',
            'uses' => 'Residente\ResidenteController@index'
        ]);



        // **************************************
        // **************************************
        // SOCIAL NETWORK
        //***************************************
        // **************************************


           Route::get('micomunidad', [
            'as' => 'micomunidad',
            'uses' => 'Social\SocialController@index'
        ]);


          // Posts
        Route::get('/posts/list', 'Social\PostController@fetch');
        Route::post('/posts/new', 'Social\PostController@create');
        Route::post('/posts/delete', 'Social\PostController@delete');
        Route::post('/posts/like', 'Social\PostController@like');
        Route::post('/posts/likes', 'Social\PostController@likes');
        Route::post('/posts/comment', 'Social\PostController@comment');
        Route::post('/posts/comments/delete', 'Social\PostController@deleteComment');
        Route::get('/post/{id}', 'Social\PostController@single');


           Route::post('getcomments', 'Social\CommentsController@getcomments');
           Route::post('savecomments', 'Social\CommentsController@savecomments');
           Route::post('deletecomments', 'Social\CommentsController@deletecomments');
           Route::post('searchcomments',  'Social\CommentsController@searchcomments');
           Route::post('updatecomments', 'Social\CommentsController@updatecomments');




   });
Route::get('getsession', 'Admin\Tablasmaestras\TablasmaestrasController@getsession');

