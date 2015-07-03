<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 3/7/15
 * Time: 18:23
 */

namespace US\RRHH\Girhus\Encuesta\Repository;


use US\RRHH\Girhus\Encuesta\Entity\InterfazEntidad;

class EvaluacionRepositorio implements InterfazRepositorio{
    /**
     * Guarda la entidad en la BD.
     *
     * @param InterfazEntidad $entidad
     */
    public function guardar(InterfazEntidad $entidad)
    {
        // TODO: Implement guardar() method.
    }

    /**
     * Borra la entidad.
     *
     * @param integer $id
     */
    public function borrar($id)
    {
        // TODO: Implement borrar() method.
    }

    /**
     * Devuelve el total de entidades.
     *
     * @return integer Número total de entidades.
     */
    public function contar()
    {
        // TODO: Implement contar() method.
    }

    /**
     * Devuelve la entidad cuya id se ha proporcionado.
     *
     * @param integer $id
     *
     * @return object|false Un objeto entidad si existe y si no, falso.
     */
    public function cargar($id)
    {
        // TODO: Implement cargar() method.
    }

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
    public function listar($limite, $desplazamiento = 0, $ordenarPor = array())
    {
        // TODO: Implement listar() method.
    }

}