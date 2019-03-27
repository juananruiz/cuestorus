<?php

/**
 * Clase GrupoPregunta
 * Grupos de preguntas que conforman el cuestionario
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="ENCUESTA_grupos_preguntas")
 */
class GrupoPregunta
{

    /**
     * @Id @Column(type="integer") @GeneratedValue 
     * @var int
     */
    private $id;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $orden;

    /**
     * @Column(type="string")
     * @var string
     */
    private $descripcion;

    /**
     * @OneToMany (targetEntity="Pregunta", mappedBy="pregunta")
     */
    private $preguntas;

    /**
     * @ManytoOne (targetEntity="Encuesta", inversedBy="grupos_preguntas")
     */
    private $encuesta;

    public function __construct()
    {
        $this->preguntas = new ArrayCollection;
    }

    /**
     * @return int
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * @param int $orden
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

}
