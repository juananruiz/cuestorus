<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 29/6/15
 * Time: 19:40
 */

namespace US\RRHH\Girhus\Encuesta\Repository;

use Doctrine\ORM\EntityManager;
use US\RRHH\Girhus\Encuesta\Entity\InterfazEntidad;

class PreguntaRepositorio implements InterfazRepositorio{

    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Guarda la entidad en la BD.
     *
     * @param InterfazEntidad $pregunta
     */
    public function guardar(InterfazEntidad $pregunta)
    {
        $this->entityManager->persist($pregunta);
        $this->entityManager->flush();
    }

    /**
     * Borra la entidad.
     *
     * @param integer $id
     */
    public function borrar($id)
    {
        $this->entityManager->remove($pregunta);
        $this->entityManager->flush();
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
        return $this->entityManager->getRepository('US\RRHH\Girhus\Encuesta\Entity\Pregunta')->findAll();
    }


}