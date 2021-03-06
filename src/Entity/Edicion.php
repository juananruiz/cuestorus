<?php

/**
 * Proyecto Girhus/Encuesta
 * src/Entity/Edicion.php
 * Desarrollado por juananruiz
 * Creado el 1/7/15 - 18:51
 * Hecho con PhpStorm.
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="FORPAS_ediciones")
 */
class Edicion
{
    /** @ORM\Id @Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $codigo;

    /**
     * @ORM\Column(type="DateTime")
     * @var /DateTime
     */
    private $fecha_inicio;

    /**
     * @ORM\Column(type="DateTime")
     * @var /DateTime
     */
    private $fecha_fin;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $dias_cierre_encuesta;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @param mixed $fecha_inicio
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @param mixed $fecha_fin
     */
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }

    /**
     * @return int
     */
    public function getDiasCierreEncuesta()
    {
        return $this->dias_cierre_encuesta;
    }

    /**
     * @param int $dias_cierre_encuesta
     */
    public function setDiasCierreEncuesta($dias_cierre_encuesta)
    {
        $this->dias_cierre_encuesta = $dias_cierre_encuesta;
    }

}
