<?php

/**
 * Clase EvaluacionAnonima
 * Evaluaciones de encuestas anónimas (no se registra la identidad del encuestado
 */

namespace US\RRHH\Girhus\Encuesta\Entity;

/**
 * @Entity
 * @Table(name="AA_personas")
 */
class Participante
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /*
     * @Column(type="string")
     * @var string
     */
    protected $nombre;

    /*
     * @Column(type="string")
     * @var string
     */
    protected $apellidos;
}

