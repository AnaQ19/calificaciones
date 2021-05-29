<?php

namespace Ana\Pages;

use Ana\Modelos\carrera;
use Ana\Modulos\Page;

final class Inicio extends Page
{
    private $listaCarreras = [];

    public function __construct()
    {
        parent::__construct("Pagina de inicio", 'base.twig');
    }

    public function initVars()
    {
        $this->setVar('nombre', 'Ana');
        $this->setVar('carreras.lista', $this->listaCarreras);
    }
    public function setUp()
    {
        $this->listaCarreras = carrera::getListacarrera();
    }
    public function CheckPost()
    {
    }
}
