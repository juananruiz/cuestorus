<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 29/6/15
 * Time: 19:40
 */

namespace US\RRHH\Girhus\Encuesta\Repository;

use Doctrine\ORM\EntityRepository;
use US\RRHH\Girhus\Encuesta\Entity\Pregunta;

/**
 * Class PreguntaRepositorio
 * @package US\RRHH\Girhus\Encuesta\Repository
 */
class PreguntaRepositorio extends EntityRepository
{
    /**
     * @param array $criterio
     * @param array $ordenarPor
     * @param int $limite
     *      Número de preguntas a devolver
     * @param int $desplazamiento
     *      Desplazamiento para paginación
     * @return array Colección de preguntas
     */
    public function listar($criterio, $ordenarPor, $limite, $desplazamiento)
    {
        return $this->findBy($criterio, $ordenarPor, $limite, $desplazamiento);
    }

    /**
     * Guarda una pregunta en la base de datos
     * @param Pregunta $pregunta
     */
    public function guardar(Pregunta $pregunta)
    {
        $this->getEntityManager()->persist($pregunta);
        $this->getEntityManager()->flush();
    }

    /**
     * @param $id
     * @return null|object
     */
    public function cargar($id)
    {
        return $this->find($id);
    }

    /**
     * @param Pregunta $pregunta
     */
    public function borrar(Pregunta $pregunta)
    {
        $this->getEntityManager()->remove($pregunta);
        $this->getEntityManager()->flush();
    }

    /**
     * Cuenta el número de preguntas existente.
     *
     * @return integer Número total de preguntas.
     */
    public function contar()
    {
        $dql = 'SELECT COUNT(p.id) FROM US\RRHH\Girhus\Encuesta\Entity\Pregunta p';
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getSingleScalarResult();
    }
}
