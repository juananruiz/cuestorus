<?php

/**
 * Clase Pregunta
 * Preguntas que conforman las encuestas
 */

namespace US\RRHH\Girhus\Encuesta\Entity;


/**
 * @Entity
 * @Table(name="ENCUESTA_preguntas")
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discriminador", type="string")
 * @DiscriminatorMap({
 *                  "texto" = "PreguntaTexto",
 *                  "opcion" = "PreguntaOpcion",
 *                  "gradiente" = "PreguntaGradiente"
 *                  })
 */
abstract class Pregunta
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
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

    /**
     * @param $propiedades
     */
    public function __construct($propiedades)
    {
        foreach ($propiedades as $propiedad => $valor) {
            $this->$propiedad = $valor;
        }
        $this->fecha_alta = date('Y-m-d H:i:s');
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $enunciado
     */
    public function setEnunciado($enunciado)
    {
        $this->enunciado = $enunciado;
    }

    /**
     * @return string
     */
    public function getEnunciado()
    {
        return $this->enunciado;
    }

    /**
     * @param $orden
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;
    }

    /**
     * @return int
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * @param \DateTime $fecha_alta
     */
    public function setFechaAlta(\DateTime $fecha_alta)
    {
        $this->fecha_alta = $fecha_alta;
    }

    /**
     * @return bool|\DateTime|string
     */
    public function getFechaAlta()
    {
        return $this->fecha_alta;
    }

    /**
     * @param \DateTime $fecha_baja
     */
    public function setFechaBaja(\DateTime $fecha_baja)
    {
        $this->fecha_baja = $fecha_baja;
    }

    /**
     * @return \DateTime
     */
    public function getFechaBaja()
    {
        return $this->fecha_baja;
    }

}

