<?php

/**
 * Clase Edicion.php
 * src/Evaluacion.php
 */

namespace US\RRHH\Girhus\Encuesta\Entity;
/**
 * @Entity
 * @Table(name="FORPAS_ediciones")
 */
class Edicion
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;

    /**
     * @Column(type="string")
     */
    private $codigo;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }



}
