<?php

/*
 * App es un contenedor de dependencias basado en Pimple
 * ¡Silex enterito es un Pimple!
 */

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\RoutingServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use US\RRHH\Girhus\Encuesta\Repository\RespuestaRepositorio;
use US\RRHH\Girhus\Encuesta\Repository\PreguntaRepositorio;
use US\RRHH\Girhus\Encuesta\Repository\EvaluacionRepositorio;
use US\RRHH\Girhus\Encuesta\Repository\EncuestaRepositorio;
use US\RRHH\Girhus\Encuesta\Repository\EncuestaRepositorioDoctrine;
use US\RRHH\Girhus\Encuesta\Repository\ParticipanteRepositorioDoctrine;
use US\RRHH\Girhus\Encuesta\Controller\InformeControlador;
use US\RRHH\Girhus\Encuesta\Controller\ParticipanteControlador;

$app = new Application();
$app->register(new RoutingServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider());

// Opciones para el ORM
$app["orm.em.options"] = array(
    "mappings" => array(
        array(
            "type"      => "annotation",
            "namespace" => "US\\RRHH\\Girhus\\Encuesta\\Entity",
            "path"      => realpath(__DIR__."/../src/Entity")
        )
    )
);

// Registra los repositorios.
$app['repository.respuesta'] = function ($app) {
    return new RespuestaRepositorio($app['orm.em']);
};

$app['repository.pregunta'] = function ($app) {
    return new PreguntaRepositorio($app['orm.em']);
};

$app['repository.evaluacion'] = function ($app) {
    return new EvaluacionRepositorio($app['orm.em']);
};

$app['repository.encuesta'] = function ($app) {
    return new EncuestaRepositorio($app['orm.em']);
};

// Estos son repositorios nativo de Doctrine
$app['repository.encuesta_doctrine'] = function ($app) {
    return new EncuestaRepositorioDoctrine($app['orm.em'], $app['orm.em']->getClassMetadata('US\RRHH\Girhus\Encuesta\Entity\Encuesta'));
};

$app['repository.participante'] = function ($app) {
    return new ParticipanteRepositorioDoctrine($app['orm.em'], $app['orm.em']->getClassMetadata('US\RRHH\Girhus\Encuesta\Entity\Participante'));
};

// Registra controladores como servicios
$app['controller.informe'] = function ($app) {
    return new InformeControlador($app['repository.evaluacion']);
};

$app['controller.participante'] = function ($app) {
    return new ParticipanteControlador($app['repository.participante']);
};

$app['twig.path'] = array(__DIR__.'/../app/views');
$app['twig.options'] = array('cache' => __DIR__.'/../app/cache/twig');

// Opciones para Twig
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) use ($app) {
        return $app['request_stack']->getMasterRequest()->getBasepath().'/'.ltrim($asset, '/');
    }));

    return $twig;
});

return $app;
