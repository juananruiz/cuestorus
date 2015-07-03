<?php

/**
 * Clase Evaluacion.php
 * src/Evaluacion.php
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

/**
 * @Entity
 * @Table(name="ENCUESTA_evaluaciones")
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discriminador", type="string")
 * @DiscriminatorMap({"evaluacion_nominal" = "EvaluacionNominal", 
 *                  "evaluacion_anonima" = "EvaluacionAnonima"})
 */
class Evaluacion
{

    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /**
     * @ManyToOne(targetEntity="Encuesta", inversedBy="evaluacionDeEncuesta")
     * */
    protected $encuesta;

    /**
     * @ManyToOne(targetEntity="Edicion", inversedBy="edicionEvaluada")
     * */
    protected $edicion;

    /**
     * @Column(type="datetime")
     * @var DateTime
     */
    protected $fecha_creacion;

    /**
     *
     */
    public function getId()
    {
        return $this->id;
    }

    public function setFechaCreacion(DateTime $fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

}
