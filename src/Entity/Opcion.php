<?php

/**
 * Clase Opcion.php
 * src/Opcion.php
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

/**
 * @Entity @Table(name="ENCUESTA_opciones")
 */
class Opcion
{

    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /** @Column(type="string") * */
    protected $enunciado;

    /**
     * @ManyToOne(targetEntity="Pregunta", inversedBy="opciones")
     * */
    private $pregunta;

    public function getId()
    {
        return $this->id;
    }

    public function getEnunciado()
    {
        return $this->enunciado;
    }

    public function setEnunciado($enunciado)
    {
        $this->enunciado = $enunciado;
    }

    public function getPregunta()
    {
        return $this->pregunta;
    }

    public function setPregunta(Pregunta $pregunta)
    {
        $this->pregunta = $pregunta;
    }

}
