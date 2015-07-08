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
use US\RRHH\Girhus\Encuesta\Entity\PreguntaGradiente;


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
     * Devuelve un listado de preguntas
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function listarAccion(Request $request, Application $app)
    {
        $preguntas = $app['repository.pregunta']->listar(3);
        return $app['twig']->render('preguntas.html.twig', array("preguntas" => $preguntas));
    }

    /**
     * Crea una nueva pregunta a partir de los datos del formulario
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function crearAccion(Request $request, Application $app)
    {

        $tipoPregunta = $request->get('tipo_pregunta');
        $parametros = array(
            'enunciado' => $request->get('enunciado'),
            'id_grupo' => $request->get('id_grupo'),
            'orden' => $request->get('orden'),
        );
        $pregunta = new $tipoPregunta($parametros);


        $form = $app['form.factory']->create(new PreguntaType(), $pregunta);

        if ($request->isMethod('POST')) {
            $form->bind($request);
            if ($form->isValid()) {
                $app['repository.pregunta']->save($pregunta);
                $message = 'La pregunta ' . $pregunta->getName() . ' se ha creado.';
                $app['session']->getFlashBag()->add('success', $message);
                // Redirect to the edit page.
                $redirect = $app['url_generator']->generate('admin$pregunta_edit', array('pregunta' => $pregunta->getId()));
                return $app->redirect($redirect);
            }
        }

        $data = array(
            'form' => $form->createView(),
            'title' => 'Add new pregunta',
        );
        return $app['twig']->render('form.html.twig', $data);

    }

    // TODO: tengo que aclararme con esto
    public function agregarAccion(Request $request, Application $app)
    {

        $pregunta = new PreguntaGradiente($datosPregunta);
        $form = $app['form.factory']->create(new PreguntaTipo(), $pregunta);

        if ($request->isMethod('POST')) {
            $form->bind($request);
            if ($form->isValid()) {
                $app['repository.pregunta']->save($pregunta);
                $message = 'The artist ' . $pregunta->getId() . ' has been saved.';
                $app['session']->getFlashBag()->add('success', $message);
                // Redirect to the edit page.
                $redirect = $app['url_generator']->generate('pregunta_edit', array('pregunta' => $pregunta->getId()));
                return $app->redirect($redirect);
            }
        }

        $data = array(
            'form' => $form->createView(),
            'title' => 'Add new artist',
        );
        return $app['twig']->render('form.html.twig', $data);
    }
}