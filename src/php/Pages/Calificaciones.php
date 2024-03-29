<?php

namespace Ana\Pages;

use Ana\Modelos\asignatura;
use Ana\Modelos\calificaciones as ModelosCalificaciones;
use Ana\Modelos\estudiantes;
use Ana\Modelos\profesor;
use Ana\Modulos\Page;


final class Calificaciones extends Page
{

   private $listaCalificaciones = [];

   public function __construct()
   {
      parent::__construct("Calificaciones", "calificaciones.twig");
   }

   public function setUp()
   {
   }

   public function initVars()
   {
      $this->listaCalificaciones = ModelosCalificaciones::getListacalificaciones();
      $asignatura = asignatura::getListaasignatura();
      $estudiantes = estudiantes::getListaestudiantes();
      $profesores = profesor::getListaprofesor();

      $this->setVar('listaCalificaciones', $this->listaCalificaciones);
      $this->setVars([
         'asignaturas' => $asignatura,
         'estudiantes' => $estudiantes,
         'profesores' => $profesores
      ]);
   }

   public function CheckPost()
   {
      $AgregarCalificacion = $this->getPost('AgregarCalificacion');
      $borrar = $this->getPost('id_borrado');


      if ($borrar) {

         ModelosCalificaciones::borrarCalificacionById($borrar);
         $this->setVar('borrado', $borrar);
      }

      if ($AgregarCalificacion) {
         $asignatura = $this->getPostInt('asignatura');
         $estudiante = $this->getPostInt('estudiante');
         $profesor = $this->getPostInt('profesor');
         $trimestre = $this->getPostInt('trimestre');
         $nota = $this->getPostInt('nota');

         ModelosCalificaciones::agregarCalificacion($asignatura, $estudiante, $profesor, $trimestre, $nota);
         $this->setVar('nuevacalificaciones', true);
      }
   }
}
