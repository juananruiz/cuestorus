<?php

/**
 * Clase RespuestaTexto.php
 * src/Respuesta.php
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

/**
 * @Entity
 * @Table(name="ENCUESTA_respuestas_texto")
 */
class RespuestaTexto extends Respuesta
{
    /**
     * @Column(type="string")
     * @var string
     */
    private $texto_respuesta;

    public function getTexto_respuesta()
    {
        return $this->texto_respuesta;
    }

    public function setTexto_respuesta($texto_respuesta)
    {
        $this->texto_respuesta = $texto_respuesta;
    }


}

