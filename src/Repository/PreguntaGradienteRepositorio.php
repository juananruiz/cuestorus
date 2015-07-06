<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 6/7/15
 * Time: 13:59
 */

namespace US\RRHH\Girhus\Encuesta\Repository;


use US\RRHH\Girhus\Encuesta\Entity\PreguntaGradiente;

class PreguntaGradienteRepositorio extends PreguntaRepositorio
{

    /**
     * @param PreguntaGradiente $pregunta
     */
    public function guardar($pregunta)
    {
        parent::guardar($pregunta);
    }
}