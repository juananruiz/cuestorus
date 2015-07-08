<?php
/**
 * Proyecto Girhus/Encuestas
 * ParticipanteControlador.php
 * Desarrollado por juananruiz
 * Creado el 7/7/15 - 19:19
 * Hecho con PhpStorm.
 */

namespace US\RRHH\Girhus\Encuesta\Controller;

use Silex\Application;
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
     * function listarAccion
     * @param Application $app
     * @param $limite
     * @param $desplazamiento
     * @return array
     */
    public function listarAccion(Application $app, $limite, $desplazamiento)
    {
        $criterio = array();
        $ordenarPor = array();
        $listaParticipantes = $this->repositorioParticipantes->listar($criterio, $ordenarPor, $limite, $desplazamiento);
        return $app['twig']->render('participantes.html.twig', array("participantes" => $listaParticipantes));
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

    public function nuevoAccion(Application $app)
    {
        return $app['twig']->render('participante_formulario.html.twig');
    }
}