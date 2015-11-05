<?php

/**
 * Proyecto Girhus/Encuesta
 * src/Entity/Evaluacion.php
 * Desarrollado por juananruiz
 * Creado el 1/6/15 - 18:51
 * Hecho con PhpStorm.
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

use Doctrine\ORM\Mapping\Annotation as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ENCUESTA_evaluaciones")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discriminador", type="string")
 * @ORM\DiscriminatorMap({"evaluacion_nominal" = "EvaluacionNominal",
 *                  "evaluacion_anonima" = "EvaluacionAnonima"})
 */
abstract class Evaluacion
{

    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue * */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Encuesta", inversedBy="evaluacionDeEncuesta")
     * */
    protected $encuesta;

    /**
     * @ORM\ManyToOne(targetEntity="Edicion", inversedBy="edicionEvaluada")
     * */
    protected $edicion;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    protected $fecha_creacion;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param DateTime $fecha_creacion
     */
    public function setFechaCreacion(DateTime $fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
    }

    /**
     * @return DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

}
