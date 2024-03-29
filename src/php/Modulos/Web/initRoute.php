<?php

namespace Ana\Modulos\Web;

use Ana\Modulos\WebRoute;
use Ana\Pages;

trait initRoute
{

        /**
         *
         * @var WebRoute
         */
        private $Route;


        /**
         * 
         * @return WebRoute
         */
        public abstract function getRoute();

        private function initRoute()
        {
                $Route = new WebRoute('p', Pages\Inicio::class);

                $Inicio = new WebRoute('inicio', Pages\Inicio::class);

                $Route
                        ->addRoute($Inicio)
                        ->addRoute(new WebRoute('ana', Pages\Ana::class))
                        ->addRoute(new WebRoute('carreras', Pages\Carreras::class))
                        ->addRoute(new WebRoute('asignaturas', Pages\asignaturas::class))
                        ->addRoute(new WebRoute('profesores', Pages\profesores::class))
                        ->addRoute(new WebRoute('estudiantes', Pages\estudiantes::class));

                $this->Route = $Route->init();
                $this->Route = $Route;
        }
}
