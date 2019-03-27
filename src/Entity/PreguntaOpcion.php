<?php

/**
 * Clase PreguntaOpcion
 * Preguntas  de tipo escoger opcion que conforman las encuestas
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="ENCUESTA_preguntas_opcion")
 */
class PreguntaOpcion extends Pregunta
{
    /**
     * @OneToMany(targetEntity="Opcion", mappedBy="pregunta")
     */
    private $opciones;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $max_opciones_permitidas;

    /**
     * @return int
     */
    public function getTipo()
    {
        return parent::TIPO_OPCION;
    }

    /**
     * @return int
     */
    public function getMaxOpcionesPermitidas()
    {
        return $this->max_opciones_permitidas;
    }

    /**
     * @param int $max_opciones_permitidas
     */
    public function setMaxOpcionesPermitidas($max_opciones_permitidas)
    {
        $this->max_opciones_permitidas = $max_opciones_permitidas;
    }

    public function agregarOpcion(Opcion $opcion)
    {
        $this->opciones[] = $opcion;
    }

}

