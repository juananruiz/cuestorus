<?php

/**
 * Proyecto Girhus/Encuesta
 * src/Entity/Edicion.php
 * Desarrollado por juananruiz
 * Creado el 1/7/15 - 18:51
 * Hecho con PhpStorm.
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

/**
 * @Entity
 * @Table(name="AA_personas")
 */
class Participante
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $nombre;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $apellidos;

    /**
     * @param array $datos
     */
    function __construct($datos)
    {
        $this->nombre = $datos['nombre'];
        $this->apellidos = $datos['apellidos'];
    }

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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

}

