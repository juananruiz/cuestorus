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

$app->get('/encuestas/{limite}/{desplazamiento}', 'controller.encuesta:listarAccion')
    ->value('limite', '10')
    ->value('desplazamiento', '0')
    ->bind('encuestas');
$app->get('/encuesta/{id}', 'controller.encuesta:mostrarAccion')
    ->bind("'encuesta_mostrar'");

$app->get('/participantes/{limite}/{desplazamiento}', 'controller.participante:listarAccion')
    ->value('limite', '10')
    ->value('desplazamiento', '0')
    ->bind('participantes');
$app->get('/participante/crear', 'controller.participante:crearAccion')
    ->bind("participante_crear");
$app->get('/participante/editar/{id}', 'controller.participante:editarAccion')
    ->bind("participante_editar");
$app->post('/participante/grabar', 'controller.participante:grabarAccion')
    ->bind("participante_grabar");
$app->get('/participante/borrar/{id}', 'controller.participante:borrarAccion')
    ->bind("participante_borrar");
$app->get('/participante/{id}', 'controller.participante:mostrarAccion')
    ->bind('participante_mostrar');

$app->get('/preguntas/{limite}/{desplazamiento}', 'controller.pregunta:listarAccion')
    ->value('limite', '10')
    ->value('desplazamiento', '0')
    ->bind('preguntas');
$app->get('/pregunta/crear', 'controller.pregunta:crearAccion')
    ->bind('pregunta_crear');
$app->get('/pregunta/editar/{id}', 'controller.pregunta:editarAccion')
    ->bind("pregunta_editar");
$app->post('/pregunta/grabar', 'controller.pregunta:grabarAccion')
    ->bind("pregunta_grabar");
$app->get('/pregunta/borrar/{id}', 'controller.pregunta:borrarAccion')
    ->bind("pregunta_borrar");
$app->get('/pregunta/{id}', 'controller.pregunta:mostrarAccion')
    ->bind("pregunta_mostrar");


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
