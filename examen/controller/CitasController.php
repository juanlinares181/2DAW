<?php

require_once '../controller/Conexion.php';
require_once '../model/Citas.php';
require_once '../model/Vehiculo.php';

class CitasController {

    public static function insertarCita($matricula, $id_itv, $fecha, $hora, $ficha) {
        try {
            $conex = new Conexion();
            $stmt = $conex->prepare("INSERT INTO citas (matricula, id_itv, fecha, hora, ficha) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$matricula, $id_itv, $fecha, $hora, $ficha]);
        } catch (PDOException $ex) {
            echo 'No se pudo insertar la cita. Error: ' . $ex->getMessage();
            die('Error con la base de datos');
        } finally {
            unset($stmt);
            unset($conex);
        }
    }

    public static function recuperarCitas() {
        try {
            $conex = new Conexion();
            $stmt = $conex->prepare("SELECT matricula, id_itv, fecha, hora, ficha FROM citas");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            die('Error con la base de datos: ' . $ex->getMessage());
        } finally {
            unset($stmt);
            unset($conex);
        }
    }

    public static function anularCita($matricula) {
        try {
            $conex = new Conexion();
            $stmt = $conex->prepare("DELETE FROM citas WHERE matricula = ?");
            $stmt->execute([$matricula]);
        } catch (PDOException $ex) {
            echo 'No se pudo anular la cita. Error: ' . $ex->getMessage();
            die('Error con la base de datos');
        } finally {
            unset($stmt);
            unset($conex);
        }
    }
}
