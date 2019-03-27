<?php
/**
 * Created by PhpStorm.
 * User: juananruiz
 * Date: 26/6/15
 * Time: 23:10
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

$admin = $app['controllers_factory'];
$admin->get('/', function () { return 'Admin home page'; });

// ensure that all Controller require logged-in users
$admin->before(function (Request $request) {
    // redirect the user to the login screen if access to the Resource is protected
    if (true) {
        return new RedirectResponse('login');
    }
});

return $admin;

