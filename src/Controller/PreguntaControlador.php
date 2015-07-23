<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 30/6/15
 * Time: 23:32
 */

namespace US\RRHH\Girhus\Encuesta\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use US\RRHH\Girhus\Encuesta\Repository\PreguntaRepositorio;


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
     * @param int $limite
     * @param int $desplazamiento
     * @return mixed
     */
    public function listarAccion(Application $app, $limite, $desplazamiento)
    {
        $criterio = array();
        $ordenarPor = array();
        $listaPreguntas = $this->repositorioPreguntas->listar($criterio, $ordenarPor, $limite, $desplazamiento);
        return $app['twig']->render('pregunta/preguntas.html.twig', array("preguntas" => $listaPreguntas));
    }

    /**
     * Crea una nueva pregunta a partir de los datos del formulario
     * @param Application $app
     * @return mixed
     */
    public function crearAccion(Application $app)
    {
        //TODO: Todavía no se donde colocar las clases de preguntas
        $clases_preguntas = array(
            array("discriminador" => "texto",
                "etiqueta" => "Tipo texto"
            ),
            array("discriminador" => "opcion",
                "etiqueta" => "Tipo opción"
            ),
            array("discriminador" => "gradiente",
                "etiqueta" => "Tipo gradiente")
        );

        return $app['twig']->render('pregunta/pregunta_crear.html.twig', array("clases_preguntas" => $clases_preguntas));
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function mostrarAccion(Request $request, Application $app)
    {

    }

    /**
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function editarAccion(Request $request, Application $app)
    {

    }

    /**
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function grabarAccion(Request $request, Application $app)
    {
        $tipoPregunta = $request->get('tipo_pregunta');
        $parametros = array(
            'enunciado' => $request->get('enunciado'),
            'id_grupo' => $request->get('id_grupo'),
            'orden' => $request->get('orden'),
        );
        $pregunta = new $tipoPregunta($parametros);
    }
}