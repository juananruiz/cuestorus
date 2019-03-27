<?php

/**
 * Clase Respuesta.php
 * src/Respuesta.php
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

/**
 * @Entity
 * @Table(name="ENCUESTA_respuestas")
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discriminador", type="string")
 * @DiscriminatorMap({"respuesta_texto" = "RespuestaTexto", 
 *                  "respuesta_opcion" = "RespuestaOpcion",
 *                  "respuesta_gradiente" = "RespuestaGradiente"})
 */
abstract class Respuesta
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /**
     * @ManyToOne(targetEntity="Pregunta", inversedBy="respuestaAPregunta")
     **/
    protected $pregunta;

    /**
     * @ManyToOne(targetEntity="Evaluacion", inversedBy="respuestaAPregunta")
     **/
    protected $evaluacion;

    public function getId()
    {
        return $this->id;
    }

    public function setPregunta($pregunta)
    {
        $pregunta->contestadaEnRespuesta($this);
        $this->pregunta = $pregunta;
    }

}

