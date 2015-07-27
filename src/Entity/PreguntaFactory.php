<?php
/**
 * Proyecto Girhus/Encuestas
 * PreguntaFactory.php
 * Desarrollado por juananruiz
 * Creado el 24/7/15 - 12:41
 * Hecho con PhpStorm.
 */

namespace US\RRHH\Girhus\Encuesta\Entity;


/**
 * Class PreguntaFactory
 * @package US\RRHH\Girhus\Encuesta\Entity
 */
class PreguntaFactory
{
    /**
     * Crea una nueva Pregunta del tipo indicado
     *
     * @param string $tipo
     * @param array $propiedades
     * @return Pregunta
     * @throws \Exception
     */
    public static function crear($tipo, $propiedades)
    {
        switch ($tipo) {
            case 'texto':
                $pregunta = new PreguntaTexto($propiedades);
                break;
            case 'opcion':
                $pregunta = new PreguntaOpcion($propiedades);
                break;
            case 'gradiente':
                $pregunta = new PreguntaGradiente($propiedades);
                break;
            default:
                throw new \Exception('Tipo de pregunta inválido');
        }

        return $pregunta;
    }
}