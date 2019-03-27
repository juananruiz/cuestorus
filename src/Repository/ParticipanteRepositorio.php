<?php
/**
 * Proyecto Girhus/Encuestas
 * ParticipanteRepositorio.php
 * Desarrollado por juananruiz
 * Creado el 7/7/15 - 19:05
 * Hecho con PhpStorm.
 */

namespace US\RRHH\Girhus\Encuesta\Repository;

use US\RRHH\Girhus\Encuesta\Entity\Participante;
use Doctrine\ORM\EntityRepository;

/**
 * Class ParticipanteRepositorio
 *
 * Hereda de la clase EntityRepository de Doctrine para tener cierta funcionalidad básica
 * y poder implementar además métodos específicos de cada entidad basados en la lógica de
 * nuestra aplicación
 *
 * @package US\RRHH\Girhus\Encuesta\Repository
 */
class ParticipanteRepositorio extends EntityRepository
{

    /**
     * @param array $criterio
     * @param array $ordenarPor
     * @param int $limite
     *      Número de participantes a devolver
     * @param int $desplazamiento
     *      Desplazamiento para paginación
     * @return array Colección de participantes
     */
    public function listar($criterio, $ordenarPor, $limite = 10, $desplazamiento = 0)
    {
        return $this->findBy($criterio, $ordenarPor, $limite, $desplazamiento);
    }

    /**
     * Guarda un participante en la base de datos
     * @param Participante $participante
     */
    public function guardar(Participante $participante)
    {
        $this->getEntityManager()->persist($participante);
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

    public function borrar(Participante $participante)
    {
        $this->getEntityManager()->remove($participante);
        $this->getEntityManager()->flush();
    }
}