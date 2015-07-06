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
     * OneToMany(targetEntity="Opcion", mappedBy="pregunta")
     */
    private $opciones;

    /**
     * Column(type="integer")
     * @var int
     */
    private $max_selecciones;


    function __construct($grupo_pregunta, $orden, $enunciado, $max_selecciones)
    {
        parent::__construct($grupo_pregunta, $orden, $enunciado);
        $this->max_selecciones = $max_selecciones;
    }


    public function agregaOpcion(Opcion $opcion)
    {
        $this->opciones[] = $opcion;
    }

}

