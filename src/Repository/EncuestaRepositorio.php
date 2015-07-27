<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 6/7/15
 * Time: 19:04
 */

namespace US\RRHH\Girhus\Encuesta\Repository;

use Doctrine\ORM\EntityRepository;

class EncuestaRepositorio extends EntityRepository
{
    /**
     * Devuelve un objeto Encuesta
     *
     * @param $id
     * @return null|object
     */
    public function cargar($id)
    {
        return $this->find($id);
    }

    /**
     * Devuelve una colección de objetos Encuesta
     *
     * @param array $criterio
     *  Condiciones que han de cumplir los registros devueltos
     * @param array $ordenarPor
     *   Opcional, campo y dirección par ordenar:  $campo => $dirección
     * @param integer $limite
     *   Número de entidades a devolver.
     * @param integer $desplazamiento
     *   Número de entidades que hay que saltarse desde el principio (paginación)
     *
     * @return array Colección de objetos de tipo encuesta
     */
    public function listar($criterio, $ordenarPor, $limite = 10, $desplazamiento = 0)
    {
        return $this->findBy($criterio, $ordenarPor, $limite, $desplazamiento);
    }
}