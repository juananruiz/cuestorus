<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 3/7/15
 * Time: 19:16
 */

namespace US\RRHH\Girhus\Encuesta\Repository;

use US\RRHH\Girhus\Encuesta\Entity\InterfazEntidad;
use Doctrine\ORM\EntityManager;

/**
 * Class EncuestaRepositorio
 * @package US\RRHH\Girhus\Encuesta\Repository
 */
class EncuestaRepositorio implements InterfazRepositorio{


    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

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
        $encuesta = $this->entityManager->getRepository('US\RRHH\Girhus\Encuesta\Entity\Encuesta')->find($id);
        return $encuesta ? $encuesta : FALSE;
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
    public function listar($limite = 5, $desplazamiento = 0, $ordenarPor = array())
    {
        return $this->entityManager->getRepository('US\RRHH\Girhus\Encuesta\Entity\Encuesta')->findAll();
    }


}