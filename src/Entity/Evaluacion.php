<?php

/**
 * Proyecto Girhus/Encuesta
 * src/Entity/Evaluacion.php
 * Desarrollado por juananruiz
 * Creado el 1/6/15 - 18:51
 * Hecho con PhpStorm.
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
abstract class Evaluacion
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
