<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 4/7/15
 */

$console = new Application('My Silex Application', 'n/a');

$entityManager = $console["orm.em"];

for ($i = 0; $i < 100; $i++) {
    $edicion = new \US\RRHH\Girhus\Encuesta\Entity\Edicion();
    $edicion->setCodigo("150" . $i . "/01");
    $entityManager->persist("Edicion");
}
$entityManager->flush();
