<?php

/**
 * Clase EvaluacionNominal
 * Evaluaciones de encuestas nominales (se registra la identidad del encuestado
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

/**
 * @Entity
 * @Table(name="ENCUESTA_evaluaciones_nominales")
 */
class EvaluacionNominal extends Evaluacion
{
    /**
     * @ManyToOne (targetEntity="Participante")
     */
     private $participante;

}


