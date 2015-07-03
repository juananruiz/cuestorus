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
class PreguntaOpcion extends Opcion
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

    public function agregaOpcion(Opcion $opcion)
    {
        $this->opciones[] = $opcion;
    }

}

