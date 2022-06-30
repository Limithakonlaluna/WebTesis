<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/test', 'Home::test');
$routes->get('/salir', 'Home::exit');

$routes->get('/quienes_somos', 'Home::quienes_somos');
$routes->get('/contactanos', 'Home::contactanos');
$routes->get('/app_movil', 'Home::app_movil');

// Datos Empresa
$routes->get('/crear_datos_empresa', 'Home::createDatosEmpresa');
$routes->get('/editar_datos_empresa/(:num)', 'Home::editDatosEmpresa/$1');
$routes->post('/guardar_datos_empresa', 'Home::saveDatosEmpresa');
$routes->post('/actualizar_datos_empresa', 'Home::updateDatosEmpresa');


// Reporte
$routes->get('/generar_reportes', 'ReportesController::generarReportes');

// Contactos
$routes->get('/agregar_contactos', 'ContactoController::createContacto');
$routes->get('/listar_contactos', 'ContactoController::listContacto');
$routes->get('/editar_contactos/(:num)', 'ContactoController::editContacto/$1');
$routes->get('/eliminar_contactos/(:num)', 'ContactoController::deleteContacto/$1');

$routes->post('/guardar_contacto', 'ContactoController::saveContacto');
$routes->post('/actualizar_contacto', 'ContactoController::updateContacto');

// usuario
$routes->get('/usuario_inicio', 'UsuarioController::index');
$routes->get('/crear_usuario', 'UsuarioController::createUsuario');
$routes->get('/listar_usuario', 'UsuarioController::listUsuario');
$routes->get('/ver_datos', 'UsuarioController::verDatos');

$routes->post('/guardar_usuario', 'UsuarioController::saveUsuario');
$routes->post('/actualizar_usuario', 'UsuarioController::updateUsuario');

$routes->get('/editar_usuario/(:num)', 'UsuarioController::editUsuario/$1');
$routes->get('/eliminar_usuario/(:num)', 'UsuarioController::deleteUsuario/$1');

// categoria producto
$routes->get('/listar_categoria_producto', 'CategoriaProductoController::listCategoriaProducto');
$routes->get('/editar_categoria_producto/(:num)', 'CategoriaProductoController::editCategoriaProducto/$1');
$routes->get('/eliminar_categoria_producto/(:num)', 'CategoriaProductoController::deleteCategoriaProducto/$1');

$routes->post('/guardar_categoria_producto', 'CategoriaProductoController::saveCategoriaProducto');
$routes->post('/actualizar_categoria_producto', 'CategoriaProductoController::updateCategoriaProducto');

// producto
$routes->get('/crear_producto', 'ProductoController::createProducto');
$routes->get('/listar_producto', 'ProductoController::listProducto');
$routes->post('/listar_producto', 'ProductoController::listProductoFiltro');
$routes->get('/editar_producto/(:num)', 'ProductoController::editProducto/$1');
$routes->get('/eliminar_producto/(:num)', 'ProductoController::deleteProducto/$1');

$routes->get('/productos_invitado', 'ProductoController::productos_invitado');
$routes->post('/productos_invitado', 'ProductoController::invitadoProductoFiltro');
$routes->get('/productos_invitado/ver_detalles/(:num)', 'ProductoController::ver_detalles/$1');

$routes->post('/guardar_producto', 'ProductoController::saveProducto');
$routes->post('/actualizar_producto', 'ProductoController::updateProducto');

// Horario
$routes->get('/listar_horario', 'HorarioController::listHorario');
$routes->get('/editar_horario/(:num)', 'HorarioController::editHorario/$1');
$routes->get('/eliminar_horario/(:num)', 'HorarioController::deleteHorario/$1');

$routes->post('/guardar_horario', 'HorarioController::saveHorario');
$routes->post('/actualizar_horario', 'HorarioController::updateHorario');
$routes->post('/guardar_horario_trabajador', 'HorarioController::saveHorarioTrabajador');

$routes->post('/guardar_datos_empresa', 'Home::saveDatosEmpresa');

// Instalaciones
$routes->get('/listar_instalaciones', 'InstalacionController::listInstalaciones');
$routes->get('/listar_instalacionesSemana', 'InstalacionController::verInstalacionSemana');
$routes->get('/ver_instalacion/(:num)', 'InstalacionController::verInstalacion/$1');
$routes->get('/editar_instalacion/(:num)', 'InstalacionController::editInstalacion/$1');
$routes->get('/eliminar_instalacion/(:num)', 'InstalacionController::deleteInstalacion/$1');
$routes->post('/actualizar_instalacion', 'InstalacionController::updateInstalacion');

$routes->get('/crear_instalacion', 'InstalacionController::asignarInstalaciones');

// Tipo Cultivo
$routes->get('/listar_tipo_cultivo', 'TipoCultivoController::listTipoCultivo');
$routes->get('/editar_tipo_cultivo/(:num)', 'TipoCultivoController::editTipoCultivo/$1');
$routes->get('/eliminar_tipo_cultivo/(:num)', 'TipoCultivoController::deleteTipoCultivo/$1');
$routes->post('/actualizar_tipo_cultivo', 'TipoCultivoController::updateTipoCultivo');
$routes->post('/guardar_tipo_cultivo', 'TipoCultivoController::saveTipoCultivo');

// publicacion
$routes->post('/guardar_publicacion', 'PublicacionController::savePublicacion');
$routes->get('/ver_publicacion/(:num)', 'PublicacionController::verPublicacion/$1');
$routes->get('/listarPublicacion', 'PublicacionController::listPublicacion');
$routes->get('/editarPublicacion/(:num)', 'PublicacionController::editPublicacion/$1');
$routes->get('/eliminarPublicacion/(:num)', 'PublicacionController::deletePublicacion/$1');
$routes->post('/actualizarPublicacion', 'PublicacionController::updatePublicacion');
$routes->get('/ver_mis_publicacion', 'PublicacionController::verMisPublicacion');
$routes->get('/ver_detalles_misp', 'PublicacionController::verMisPublicacionDetalle');

$routes->get('/iniciar_sesion', 'Home::iniciar_sesion');
$routes->post('/iniciar_sesion', 'Home::login');

$routes->get('/Reportes/imprimirCultivo', 'ReportesController::imprimirCultivos');
$routes->get('/Reportes/imprimirProducto', 'ReportesController::imprimirProductos');
$routes->get('/Reportes/imprimirInstalaciones', 'ReportesController::imprimirInstalaciones');

$routes->get('/instalacion/listarInstalacion', 'InstalacionController::imprimirInstalacionesdia');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
