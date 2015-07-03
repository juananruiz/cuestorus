<?php

/**
 * Clase Encuesta.php
 * src/Entity/Encuesta.php
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

/**
 * @Entity
 * @Table(name="ENCUESTA_encuestas")
 */
class Encuesta
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;

    /** 
     * @Column(type="string")
     * @var string
     */
    private $nombre;

    /**
     * @Column(type="boolean")
     * @var boolean
     */
    private $es_anonima;

    /**
     * @Column(type="text")
     * @var string
     */
    private $texto_inicial;

    /**
     * @Column(type="text")
     * @var string
     */
    private $texto_final;

    /**
     *
     */
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setEsAnonima($es_anonima)
    {
        $this->es_anonima = $es_anonima;
    }

    public function getEsAnonima()
    {
        return $this->es_anonima;
    }

}

