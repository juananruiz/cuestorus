<?php

/**
 * Clase PreguntaGradiente
 * Preguntas  de tipo gradiente que conforman las encuestas
 */

namespace US\RRHH\Girhus\Encuesta\Entity;


/**
 * @Entity
 * @Table(name="ENCUESTA_preguntas_gradiente")
 */
class PreguntaGradiente extends Pregunta
{
    /**
     * @Column (type="integer")
     * @var int
     */    
    private $valor_minimo;

    /**
     * @Column (type="integer")
     * @var int
     */    
    private $valor_maximo;

    /**
     * @return int
     */
    public function getTipo()
    {
        return parent::TIPO_GRADIENTE;
    }

    /**
     * @return int
     */
    public function getValorMinimo()
    {
        return $this->valor_minimo;
    }

    /**
     * @param int $valor_minimo
     */
    public function setValorMinimo($valor_minimo)
    {
        $this->valor_minimo = $valor_minimo;
    }

    /**
     * @return int
     */
    public function getValorMaximo()
    {
        return $this->valor_maximo;
    }

    /**
     * @param int $valor_maximo
     */
    public function setValorMaximo($valor_maximo)
    {
        $this->valor_maximo = $valor_maximo;
    }


}


