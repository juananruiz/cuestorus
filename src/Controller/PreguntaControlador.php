<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 30/6/15
 * Time: 23:32
 */

namespace US\RRHH\Girhus\Encuesta\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use US\RRHH\Girhus\Encuesta\Entity\Pregunta;
use US\RRHH\Girhus\Encuesta\Repository\PreguntaRepositorio;
use US\RRHH\Girhus\Encuesta\Entity\PreguntaFactory;


/**
 * Class PreguntaControlador
 *
 * Es la encargada de atender las peticiones que se realicen sobre las preguntas
 *
 * @package US\RRHH\Girhus\Encuesta\Controller
 */
class PreguntaControlador
{
    /**
     * @var PreguntaRepositorio $repositorioPreguntas
     */
    protected $repositorioPreguntas;

    /**
     * @param PreguntaRepositorio $repositorioPreguntas
     */
    function __construct($repositorioPreguntas)
    {
        $this->repositorioPreguntas = $repositorioPreguntas;
    }

    /**
     * Devuelve un listado de preguntas
     * @param Application $app
     * @param int $paginaActual
     * @param int $limite
     * @return Response
     */
    public function listarAccion(Application $app, $paginaActual, $limite)
    {
        // Paginación
        $total = $this->repositorioPreguntas->contar();
        $numPaginas = ceil($total / $limite);
        if ($paginaActual < 1) {
            $paginaActual = 1;
        } else if ($paginaActual > $numPaginas) {
            $paginaActual = $numPaginas;
        }
        $desplazamiento = ($paginaActual - 1) * $limite;

        $criterio = array();
        $ordenarPor = array('id' => 'ASC');
        $listaPreguntas = $this->repositorioPreguntas->listar($criterio, $ordenarPor, $limite, $desplazamiento);
        $parametros = array(
            'preguntas' => $listaPreguntas,
            'numPaginas' => $numPaginas,
            'paginaActual' => $paginaActual,
            'url' => $app['url_generator']->generate('preguntas'),
        );
        return $app['twig']->render('pregunta/pregunta_listar.html.twig', $parametros);
    }

    /**
     * Crea una nueva pregunta a partir de los datos del formulario
     * @param Application $app
     * @return mixed
     */
    public function crearAccion(Application $app)
    {
        //TODO: No se si este es el mejor sitio para declarar esto
        $tipos = array(
            array("discriminador" => "texto",
                "etiqueta" => "Tipo texto"
            ),
            array("discriminador" => "opcion",
                "etiqueta" => "Tipo opción"
            ),
            array("discriminador" => "gradiente",
                "etiqueta" => "Tipo gradiente")
        );

        return $app['twig']->render('pregunta/pregunta_crear.html.twig', array('tipos' => $tipos));
    }

    /**
     * @param Application $app
     * @param integer $id
     * @return Response
     */
    public function mostrarAccion(Application $app, $id)
    {
        $pregunta = $this->repositorioPreguntas->find($id);
        return $app['twig']->render('pregunta/pregunta_mostrar.html.twig', array("pregunta" => $pregunta));
    }

    /**
     * @param Application $app
     * @param integer $id
     * @return Response
     */
    public function editarAccion(Application $app, $id)
    {
        $pregunta = $this->repositorioPreguntas->find($id);
        return $app['twig']->render('pregunta/pregunta_editar.html.twig', array("pregunta" => $pregunta));
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return RedirectResponse
     */
    public function grabarAccion(Request $request, Application $app)
    {
        $tipo = $request->get('tipo');
        $propiedades = array(
            'enunciado' => $request->get('enunciado'),
            'id_grupo' => $request->get('id_grupo'),
            'orden' => $request->get('orden')
        );
        $pregunta = PreguntaFactory::crear($tipo, $propiedades);

        $this->repositorioPreguntas->guardar($pregunta);
        $redirect = $app['url_generator']->generate('preguntas');
        return $app->redirect($redirect);
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function borrarAccion(Request $request, Application $app)
    {
        $id = $request->get('id');
        /** @var Pregunta $pregunta */
        $pregunta = $this->repositorioPreguntas->cargar($id);
        $this->repositorioPreguntas->borrar($pregunta);
        $redirect = $app['url_generator']->generate('preguntas');
        return $app->redirect($redirect);
    }
}