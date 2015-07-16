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
        return $app['twig']->render('participante/participantes.html.twig', array("participantes" => $listaParticipantes));
    }

    /**
     * @param Application $app
     * @param $id Identificador del participante
     */
    public function mostrarAccion(Application $app, $id)
    {
        $participante = $this->repositorioParticipantes->find($id);
        return $app['twig']->render('participante/participante.html.twig', array("participante" => $participante));

    }

    /**
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function grabarAccion(Request $request, Application $app)
    {

        if ($id = $request->get('id')) {
            $participante = $this->repositorioParticipantes->cargar($id);
            $participante->setNombre($request->get('nombre'));
            $participante->setApellidos($request->get('apellidos'));

        } else {
            $datos = array(
                'nombre' => $request->get('nombre'),
                'apellidos' => $request->get('apellidos')
            );
            $participante = new Participante($datos);
        }
        $this->repositorioParticipantes->guardar($participante);
        $redirect = $app['url_generator']->generate('participantes');
        return $app->redirect($redirect);
    }

    /**
     * @param Application $app
     * @return mixed
     */
    public function crearAccion(Application $app)
    {
        return $app['twig']->render('participante/participante_crear.html.twig');
    }

    /**
     * @param Application $app
     * @param $id Identificador del participante
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function editarAccion(Application $app, $id)
    {
        $participante = $this->repositorioParticipantes->find($id);
        return $app['twig']->render('participante/participante_editar.html.twig', array("participante" => $participante));
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function borrarAccion(Request $request, Application $app)
    {
        $id = $request->get('id');
        /** @var Participante $participante */
        $participante = $this->repositorioParticipantes->cargar($id);
        $this->repositorioParticipantes->borrar($participante);
        $redirect = $app['url_generator']->generate('participantes');
        return $app->redirect($redirect);
    }
}