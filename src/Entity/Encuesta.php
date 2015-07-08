<?php

/**
 * Proyecto Girhus/Encuesta
 * src/Entity/Encuesta.php
 * Desarrollado por juananruiz
 * Creado el 1/6/15 - 18:51
 * Hecho con PhpStorm.
 */

namespace US\RRHH\Girhus\Encuesta\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Column;

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

