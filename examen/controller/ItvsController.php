<?php
require_once '../controller/Conexion.php';
require_once '../model/Itvs.php';

class ItvsController {

    public static function recuperarItv() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM itvs");

            // Utiliza fetchAll para obtener todos los resultados
            $itvsData = $result->fetchAll(PDO::FETCH_ASSOC);

            // Convierte los datos en objetos Itvs
            $itvs = [];
            foreach ($itvsData as $row) {
                $itv = new Itvs($row['id'], $row['provincia'], $row['localidad'], $row['direccion'], $row['telefono']);
                $itvs[] = $itv;
            }

            return $itvs;
        } catch (PDOException $ex) {
            // Maneja la excepción de manera más específica
            die('Error con la base de datos: ' . $ex->getMessage());
        } finally {
            // Libera los recursos
            unset($result);
            unset($conex);
        }
    }
}
?>