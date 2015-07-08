<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 6/7/15
 * Time: 13:30
 */

namespace US\RRHH\Girhus\Encuesta\Controller;

use US\RRHH\Girhus\Encuesta\Repository\EvaluacionRepositorio;


/**
 * Class InformeControlador
 * @package US\RRHH\Girhus\Encuesta\Controller
 */
class InformeControlador
{

    /**
     * @var EvaluacionRepositorio
     */
    protected $repositorioEvaluaciones;

    /**
     * @param EvaluacionRepositorio $repositorioEvaluaciones
     */
    function __construct(EvaluacionRepositorio $repositorioEvaluaciones)
    {
        $this->repositorioEvaluaciones = $repositorioEvaluaciones;
    }

    public function listarAccion()
    {
        $this->repositorioEvaluaciones->listarFinalizadas();
    }

    public function mostrarAccion($codigoEdicion)
    {

    }

}