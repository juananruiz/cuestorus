<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 6/7/15
 * Time: 19:04
 */

namespace US\RRHH\Girhus\Encuesta\Repository;

use Doctrine\ORM\EntityRepository;

class EncuestaRepositorioDoctrine extends EntityRepository
{

    /**
     * Devuelve una colección de entidades
     *
     * @param integer $limite
     *   Número de entidades a devolver.
     * @param integer $desplazamiento
     *   Número de entidades que hay que saltarse desde el principio (paginación)
     * @param array $ordenarPor
     *   Opcional, campo y dirección par ordenar:  $campo => $dirección.
     *
     * @return array Colección de objetos de tipo encuesta
     */
    public function listar($limite = 10, $desplazamiento = 0, $ordenarPor = array())
    {
        $criterio = array();
        return $this->findBy($criterio, $ordenarPor, $limite, $desplazamiento);
    }

    public function listarActivas($limite = 5, $desplazamiento = 0, $ordenarPor = array())
    {
        $criterio = array();
        return $this->findBy($criterio, $ordenarPor, $limite, $desplazamiento);
    }
}