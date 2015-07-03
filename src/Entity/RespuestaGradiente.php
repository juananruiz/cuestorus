<?php

/**
 * Clase RespuestaGradiente.php
 * src/RespuestaGradiente.php
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

/**
 * @Entity
 * @Table(name="ENCUESTA_respuestas_gradiente")
 */
class RespuestaGradiente extends Respuesta
{
    /**
     * @Column(type="integer")
     * @var int
     */
    private $valor;

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }
}

