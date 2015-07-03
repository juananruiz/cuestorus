<?php

/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 29/6/15
 * Time: 19:34
 */

namespace US\RRHH\Girhus\Encuesta\Repository;
use US\RRHH\Girhus\Encuesta\Entity\InterfazEntidad;

/**
 * Interfaz para Repositorios.
 *
 * "The Repository pattern just means putting a façade over your persistence
 * system so that you can shield the rest of your application code from having
 * to know how persistence works."
 *
 * A real project would use Doctrine ORM.
 */
interface InterfazRepositorio
{
    /**
     * Guarda la entidad en la BD.
     *
     * @param InterfazEntidad $entidad
     */
    public function guardar(InterfazEntidad $entidad);

    /**
     * Borra la entidad.
     *
     * @param integer $id
     */
    public function borrar($id);

    /**
     * Devuelve el total de entidades.
     *
     * @return integer Número total de entidades.
     */
    public function contar();

    /**
     * Devuelve la entidad cuya id se ha proporcionado.
     *
     * @param integer $id
     *
     * @return object|false Un objeto entidad si existe y si no, falso.
     */
    public function cargar($id);

    /**
     * Returns a collection of entities.
     *
     * @param integer $limite
     *   Número de entidades a devolver.
     * @param integer $desplazamiento
     *   Número de entidades que hay que saltarse desde el principio (página)
     * @param array $ordenarPor
     *   Optionally, the order by info, in the $column => $direction format.
     *
     * @return array Colección de objetos de tipo entidad.
     */
    public function listar($limite, $desplazamiento = 0, $ordenarPor = array());
}
