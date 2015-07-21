<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 30/6/15
 * Time: 23:28
 */

namespace US\RRHH\Girhus\Encuesta\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use US\RRHH\Girhus\Encuesta\Repository\EncuestaRepositorio;
use US\RRHH\Girhus\Encuesta\Entity\Evaluacion;

class EvaluacionControlador {

    /**
     * @var EvaluacionRepositorioDoctrine
     */
    protected $repositorioEvaluaciones;


    /**
     * @param EvaluacionRepositorioDoctrine $repositorioEvaluaciones
     */
    function __construct(EvaluacionRepositorioDoctrine $repositorioEvaluaciones)
    {
        $this->repositorioEvaluaciones = $repositorioEvaluaciones;
    }

    /**
     * @param Application $app
     * @param Request $request
     * @return Response Vista que muestra el inicio de la encuesta
     */
    public function comenzarAccion(Application $app, Request $request)
    {
        $id_encuesta = $request['id_encuesta'];
        $id_edicion = $request['id_edicion'];
        $encuesta = $this->repositorioEncuesta->cargar($id_encuesta);
        $em = $this->repositorioEncuesta->getEntityManager();
        $edicion = $em->find('edicion', $id_edicion);
        return $app['twig']->render('encuesta/encuesta_inicio.html.twig',
            array("encuesta" => $encuesta),
            array("edicion" => $edicion));
    }

    /**
     * @param int $pagina Página de la encuesta que hay que mostrar
     */
    public function mostrarPaginaAccion($pagina)
    {

    }


    public function finalizarAccion(Evaluacion $evaluacion)
    {

    }

}