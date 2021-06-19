<?php

namespace Ana\Modulos;

use Ana\Modulos\Web\appInit;
use Ana\Modulos\Web\initRoute;
use Ana\Modulos\Web\checkRoute;
use Ana\Modulos\Web\initDisplay;
use Ana\Modulos\WebRoute;

// Sera la encarga de encapsular las clases del sistema como las rutas y modulos controladores.
final class Web
{
    public static $loged = false;

    use appInit,
        initRoute,
        checkRoute,
        initDisplay;

    /**
     *
     * @var WebRoute
     */
    private $Route;

    public function __construct()
    {
        $this->initApp();
        $this->initRoute();
        $this->checkRoute();
        $this->initDisplay();
    }

    /**
     * 
     * @return WebRoute
     */
    public function getRoute()
    {
        return $this->Route;
    }
}
