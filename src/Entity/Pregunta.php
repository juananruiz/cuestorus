<?php

/**
 * Clase Pregunta
 * Preguntas que conforman las encuestas
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ENCUESTA_preguntas")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discriminador", type="string")
 * @ORM\DiscriminatorMap({
 *                  "texto" = "PreguntaTexto",
 *                  "opcion" = "PreguntaOpcion",
 *                  "gradiente" = "PreguntaGradiente"
 *                  })
 */
abstract class Pregunta
{

    const TIPO_TEXTO = 0;
    const TIPO_OPCION  = 1;
    const TIPO_GRADIENTE = 2;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ORM\ManyToOne (targetEntity="GrupoPregunta", inversedBy="preguntas")
     */
    protected $grupo_pregunta;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $orden;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $enunciado;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    protected $fecha_alta;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    protected $fecha_baja;

    /**
     * @param array $propiedades
     */
    public function __construct($propiedades)
    {
        foreach ($propiedades as $propiedad => $valor) {
            $this->$propiedad = $valor;
        }
        $this->fecha_alta = new \DateTime();
    }

    abstract public function getTipo();

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

