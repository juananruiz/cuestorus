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
use US\RRHH\Girhus\Encuesta\Repository\EncuestaRepositorio;

/**
 * Class EncuestaControlador
 * @package US\RRHH\Girhus\Encuesta\Controller
 */
class EncuestaControlador {

    /**
     * @var EncuestaRepositorio
     */
    protected $repositorioEncuestas;

    /**
     * @param $repositorioEncuestas
     */
    function __construct($repositorioEncuestas)
    {
        $this->repositorioEncuestas = $repositorioEncuestas;
    }

    /**
     * Devuelve un listado de preguntas
     * @param Request $request
     * @param Application $app
     * @return Response
     */
    public function listarAccion(Request $request, Application $app)
    {
        $criterio = array();
        $ordenarPor = array();
        $desplazamiento = $request->attributes->get('desplazamiento');
        $limite = $request->attributes->get('limite');
        $encuestas = $this->repositorioEncuestas->listar($criterio, $ordenarPor, $limite, $desplazamiento);
        return $app['twig']->render('encuestas.html.twig', array("encuestas" => $encuestas));
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function mostrarAccion(Request $request, Application $app)
    {
        $id = $request->attributes->get('id');
        if (!$id) {
            $app->abort(404, 'Identificador incorrecto.');
        }
        $encuesta = $this->repositorioEncuestas->cargar($id);
        return $app['twig']->render('encuesta.html.twig', array("encuesta" => $encuesta));
    }
}