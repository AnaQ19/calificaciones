<?php

namespace Ana\Pages;

use Ana\Modelos\Usuarios;
use Ana\Modulos\Page;

final class Registro extends Page
{
    public function __construct()
    {
        parent::__construct("Registrar usuario", "registro.twig");
    }

    public function setUp()
    {
    }

    public function initVars()
    {
    }

    public function CheckPost()
    {
        $user = $this->getPost('username');
        $password = $this->getPost('password');

        if (Usuarios::registrarUsuario($user, $password)) {
            $this->setVar('registro', true);
        }
    }
}
