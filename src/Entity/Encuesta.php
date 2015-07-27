<?php

/**
 * Proyecto Girhus/Encuesta
 * src/Entity/Encuesta.php
 * Desarrollado por juananruiz
 * Creado el 1/6/15 - 18:51
 * Hecho con PhpStorm.
 */

namespace US\RRHH\Girhus\Encuesta\Entity;


/**
 * @Entity
 * @Table(name="ENCUESTA_encuestas")
 */
class Encuesta
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue *
     */
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param $es_anonima
     */
    public function setEsAnonima($es_anonima)
    {
        $this->es_anonima = $es_anonima;
    }

    /**
     * @return bool
     */
    public function getEsAnonima()
    {
        return $this->es_anonima;
    }

    /**
     * @return string
     */
    public function getTextoInicial()
    {
        return $this->texto_inicial;
    }

    /**
     * @param string $texto_inicial
     */
    public function setTextoInicial($texto_inicial)
    {
        $this->texto_inicial = $texto_inicial;
    }

    /**
     * @return string
     */
    public function getTextoFinal()
    {
        return $this->texto_final;
    }

    /**
     * @param string $texto_final
     */
    public function setTextoFinal($texto_final)
    {
        $this->texto_final = $texto_final;
    }

}

