<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

global $app;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->before(function (Request $request) {
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



//PRUEBAS Y EJEMPLOS //

$app->get('/request', function () use ($app) {
    return print_r($app['orm.ems']);
});

// Así se haría una redirección
$app->get('/antigua_pagina', function () use ($app) {
    return $app->redirect('/nueva_pagina');
});

// Esto transforma una variable en otra y se puede reutilizar en varios controladores
$proveedorPersona = function ($id){
    return new Persona($id);
};

$app->get('/usuario/{id}', function (Persona $usuario) {
    // ...
})->convert('usuario', $proveedorPersona);

$app->get('/usuario/{id}/editar', function (Persona $usuario) {
    // ...
})->convert('usuario', $proveedorPersona);

// Capturando parámetros con request
$app->get('/autores/{alias}', function (Request $request){
    return 'La página de ' . $request->get('alias');
});

// Soporte para grupos de controladores
// define Controller for news
$news = $app['controllers_factory'];
$news->get('/', function () {
    return 'News home page';
});

// define Controller for a forum
$forum = $app['controllers_factory'];
$forum->get('/', function () {
    return 'Forum home page';
});

$app->mount('/news', $news);
$app->mount('/forum', $forum);
// Definido en admin_controller
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
