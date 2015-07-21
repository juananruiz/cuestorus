<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 29/6/15
 * Time: 19:40
 */

namespace US\RRHH\Girhus\Encuesta\Repository;

use Doctrine\ORM\EntityRepository;

class PreguntaRepositorio extends EntityRepository
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

}