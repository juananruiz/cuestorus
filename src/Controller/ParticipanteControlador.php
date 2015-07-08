<?php
/**
 * Proyecto Girhus/Encuestas
 * ParticipanteControlador.php
 * Desarrollado por juananruiz
 * Creado el 7/7/15 - 19:19
 * Hecho con PhpStorm.
 */

namespace US\RRHH\Girhus\Encuesta\Controller;

use Symfony\Component\HttpFoundation\Request;
use US\RRHH\Girhus\Encuesta\Entity\Participante;
use US\RRHH\Girhus\Encuesta\Repository\ParticipanteRepositorioDoctrine;

/**
 * Class ParticipanteControlador
 * @package US\RRHH\Girhus\Encuesta\Controller
 */
class ParticipanteControlador
{

    /**
     * @var ParticipanteRepositorioDoctrine
     */
    protected $repositorioParticipantes;

    /**
     * @param ParticipanteRepositorioDoctrine $repositorioParticipantes
     */
    function __construct(ParticipanteRepositorioDoctrine $repositorioParticipantes)
    {
        $this->repositorioParticipantes = $repositorioParticipantes;
    }


    /**
     * @param $limite
     * @param $desplazamiento
     * @return array
     */
    public function listarAccion($limite, $desplazamiento)
    {
        $criterio = array();
        $ordenarPor = array();
        return $this->repositorioParticipantes->listar($criterio, $ordenarPor, $limite, $desplazamiento);
    }

    /**
     * @param $id
     */
    public function mostrarAccion($id)
    {

    }

    /**
     * @param Request $request
     */
    public function crearAccion(Request $request)
    {
        $parametros = array(
            'nombre' => $request->get('nombre'),
            'apellidos' => $request->get('apellidos')
        );
        $participante = new Participante($parametros);
        $this->repositorioParticipantes->guardar($participante);
    }
}