<?php

namespace Ana\Pages;

use Ana\Funciones;
use Ana\Modelos\Usuarios;
use Ana\Modulos\Cookies;
use Ana\Modulos\Page;
use Ana\Modulos\Web;

final class Logout extends Page
{
    public function __construct()
    {
        parent::__construct("Salir", "base.twig");
    }

    public function setUp()
    {
    }

    public function initVars()
    {
        $user = Web::$loged;
        Usuarios::borrarSesion($user->id_usuario);
        $cookie = new Cookies('sistemanotas');
        $cookie->delCookie('user');
        Funciones::redirect('./login');
    }

    public function CheckPost()
    {
    }
}
