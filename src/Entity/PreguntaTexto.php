<?php

/**
 * Clase PreguntaTexto
 * Preguntas  de tipo texto que conforman las encuestas
 */

namespace US\RRHH\Girhus\Encuesta\Entity;


/**
 * @Entity
 * @Table(name="ENCUESTA_preguntas_texto")
 */
class PreguntaTexto extends Pregunta
{

    /**
     * @return int
     */
    public function getTipo()
    {
        return parent::TIPO_TEXTO;
    }
}


