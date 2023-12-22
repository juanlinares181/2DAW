<?php

require_once '../controller/Conexion.php';
require_once '../model/Usuario.php';

class UsuarioController {

    public static function buscarUser($user, $pass) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("SELECT user, pass FROM usuario WHERE user=? and pass=?");
            $result->execute([$user]);

            if ($result->rowCount()) {
                $user = $result->fetchObject();
                $pass = $result->fetchObject();
            } else {
                echo ("Contraseña incorrecta");
                return null;
            }
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('Error con la base de datos: ' . $ex->getMessage());
        } finally {
            unset($result);
            unset($conex);
        }
    }

    public static function recuperarUsers() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM usuario");

            if ($result->rowCount()) {
                $usuarios = [];

                while ($row = $result->fetchObject()) {
                    $u = new Usuario($row->provincia, $row->nombre, $row->telefono, $row->user, $row->pass);
                    $usuarios[] = $u;
                }

                return $usuarios;
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
}
