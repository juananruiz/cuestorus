<?php

/**
 * Clase Pregunta
 * Preguntas que conforman las encuestas
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

/**
 * @Entity @Table(name="ENCUESTA_preguntas")
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discriminador", type="string")
 * @DiscriminatorMap({
 *                  "pregunta_texto" = "PreguntaTexto",
 *                  "pregunta_opcion" = "PreguntaOpcion",
 *                  "pregunta_gradiente" = "PreguntaGradiente"
 *                  })
 */
abstract class Pregunta implements InterfazEntidad
{
    /**
     * @Id @Column(type="integer") @GeneratedValue 
     * @var int
     */
    protected $id;

    /**
     * @ManyToOne (targetEntity="GrupoPregunta", inversedBy="preguntas")
     */
    protected $grupo_pregunta;

    /**
     * @Column(type="integer")
     * @var int
     */
    protected $orden;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $enunciado;

    /** 
     * @Column(type="datetime")
     * @var \DateTime
     */
    protected $fecha_alta;

    /** 
     * @Column(type="datetime")
     * @var \DateTime
     */
    protected $fecha_baja;

    public function __construct($grupo_pregunta, $orden, $enunciado, \DateTime $fecha_alta, \DateTime $fecha_baja)
    {
        $this->grupo_pregunta = $grupo_pregunta;
        $this->orden = $orden;
        $this->enunciado = $enunciado;
        $this->fecha_alta = $fecha_alta;
        $this->fecha_baja = $fecha_baja;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setEnunciado($enunciado)
    {
        $this->enunciado = $enunciado;
    }

    public function getEnunciado()
    {
        return $this->enunciado;
    }

    public function setOrden($orden)
    {
        $this->orden = $orden;
    }

    public function getOrden()
    {
        return $this->orden;
    }

    public function setFechaAlta(\DateTime $fecha_alta)
    {
        $this->fecha_alta = $fecha_alta;
    }

    public function getFechaAlta()
    {
        return $this->fecha_alta;
    }

    public function setFechaBaja(\DateTime $fecha_baja)
    {
        $this->fecha_baja = $fecha_baja;
    }

    public function getFechaBaja()
    {
        return $this->fecha_baja;
    }

}

