<?php

namespace Ana\Modelos;

use Ana\Modulos\Database;

final class asignatura
{
    public static function agregarasignatura(string $nombre, string $carrera)
    {
        $sql = "INSERT INTO `asignatura` (`nombre`, `carrera` ) VALUES(:nombre, :carrera)";

        $stmt = Database::prepare_execute($sql, [
            "nombre" => $nombre,
            "carrera" => $carrera
        ]);
        return $stmt;
    }

    public static function getasignaturaById(int $id)
    {
        $sql = "SELECT * FROM asignatura WHERE id = ?";
        $stmt = Database::prepare_fetch_result($sql, [$id]);
        return $stmt;
    }

    public static function getListaasignatura()
    {
        $sql = "SELECT 
        asig.*,
        car.nombre AS nombreCarrera
        FROM asignatura AS asig
        INNER JOIN carrera AS car ON asig.id_carrera = car.id";
        $stmt = Database::prepare_fetch_all($sql);
        return $stmt;
    }

    public static function borrarasignaturaById(int $id)
    {
        $sql = "DELETE FROM asignatura WHERE id = ?";
        $stmt = Database::prepare_execute($sql, [$id]);
        return $stmt;
    }

    public static function updateNombreasignatura(int $id, string $nombre)
    {
        $sql = "UPDATE asignatura SET nombre = :nombre WHERE id = :id";
        $stmt = Database::prepare_execute($sql, [
            "nombre" => $nombre,
            "id" => $id
        ]);
    }
}
