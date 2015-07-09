<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

global $app;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->before(function () {
    // redirect the user to the login screen if access to the Resource is protected
    if (false) {
        return new RedirectResponse('/login');
    }
});

// ESTO ES LO QUE VALE //

// Página inicial
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})->bind('homepage');

// Llamando a un método dentro de una clase
// Silex pasa automáticamente $app, $request y el $id
$app->get('/preguntas', 'US\RRHH\Girhus\Encuesta\Controller\PreguntaControlador::listarAccion')
    ->bind('preguntas');
$app->get('/encuestas/{limite}/{desplazamiento}', 'US\RRHH\Girhus\Encuesta\Controller\EncuestaControlador::listarAccion')
    ->bind('encuestas');
$app->get('/encuesta/{id}', 'US\RRHH\Girhus\Encuesta\Controller\EncuestaControlador::mostrarAccion');
$app->get('/participantes/{limite}/{desplazamiento}', 'controller.participante:listarAccion')
    ->value('limite', '10')
    ->value('desplazamiento', '0')
    ->bind('participantes');
$app->get('/participante/crear', 'controller.participante:crearAccion');
$app->post('/participante/grabar', 'controller.participante:grabarAccion');
$app->get('/participante/{id}', 'controller.participante:mostrarAccion');
$app->get('/participante/editar/{id}', 'controller.participante:editarAccion');
$app->get('/participante/borrar/{id}', 'controller.participante:borrarAccion');

// PRUEBAS Y EJEMPLOS //

$app->get('/request', function () use ($app) {
    return print_r($app['orm.ems']);
});

// Definido en routes_admin
$app->mount('/admin', include 'routes_admin.php');


// GESTIÓN DE ERRORES
$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
