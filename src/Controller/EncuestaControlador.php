<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 3/7/15
 * Time: 18:31
 */

namespace US\RRHH\Girhus\Encuesta\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class EncuestaControlador
 * @package US\RRHH\Girhus\Encuesta\Controller
 */
class EncuestaControlador {

    /**
     * Devuelve un listado de preguntas
     * @param Request $request
     * @param Application $app
     * @return Response
     */
    public function listarAccion(Request $request, Application $app)
    {
        $desplazamiento = $request->attributes->get('desplazamiento');
        $limite = $request->attributes->get('limite');
        $encuestas = $app['repository.encuesta']->listar($limite, $desplazamiento);
        return $app['twig']->render('encuestas.html.twig', array("encuestas" => $encuestas));
    }

    public function mostrarAccion(Request $request, Application $app)
    {
        $id = $request->attributes->get('id');
        if (!$id) {
            $app->abort(404, 'Identificador incorrecto.');
        }
        $encuesta = $app['repository.encuesta']->cargar($id);
        return $app['twig']->render('encuesta.html.twig', array("encuesta" => $encuesta));
    }
}