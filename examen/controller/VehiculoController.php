<?php

require_once '../controller/Conexion.php';
require_once '../model/Vehiculo.php';

class VehiculoController {

    public static function recuperarVehiculoItv() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT v.matricula, v.marca, v.modelo, i.fecha, i.hora, i.ficha FROM vehiculo v JOIN itv i ON v.matricula = i.matricula");

            if ($result->rowCount()) {
                $vehiculos = [];

                while ($row = $result->fetchObject()) {
                    $vehiculo = new Vehiculo($row->matricula, $row->marca, $row->modelo, $row->fecha, $row->hora, $row->ficha);
                    $vehiculos[] = $vehiculo;
                }

                return $vehiculos;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            die('Error con la base de datos: ' . $ex->getMessage());
        } finally {
            unset($result);
            unset($conex);
        }
    }

    public static function buscarVehiculo($matricula) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("SELECT * FROM vehiculo WHERE matricula = ?");
            $result->execute([$matricula]);

            if ($result->rowCount()) {
                $vehiculo = $result->fetchObject();
                return new Vehiculo($vehiculo->matricula, $vehiculo->marca, $vehiculo->modelo, $vehiculo->color, $vehiculo->plazas, $vehiculo->fecha_ultima_revision);
            } else {
                return null; // No se encontró ningún vehículo con esa matrícula
            }
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('Error con la base de datos: ' . $ex->getMessage());
        } finally {
            unset($result);
            unset($conex);
        }
    }
}

?>