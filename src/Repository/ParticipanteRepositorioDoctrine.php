<?php
/**
 * Proyecto Girhus/Encuestas
 * ParticipanteRepositorioDoctrine.php
 * Desarrollado por juananruiz
 * Creado el 7/7/15 - 19:05
 * Hecho con PhpStorm.
 */

namespace US\RRHH\Girhus\Encuesta\Repository;

use US\RRHH\Girhus\Encuesta\Entity\Participante;
use Doctrine\ORM\EntityRepository;

/**
 * Class ParticipanteRepositorioDoctrine
 *
 * "The Repository pattern just means putting a façade over your persistence
 * system so that you can shield the rest of your application code from having
 * to know how persistence works."
 *
 * @package US\RRHH\Girhus\Encuesta\Repository
 */
class ParticipanteRepositorioDoctrine extends EntityRepository
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