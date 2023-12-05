<?php

require_once '../Model/Producto.php';

class ProductoController {

    public static function insertar($p) {
        try {
            $conex = new Conexion();
            $conex->query("INSERT INTO producto VALUES ($p->codigo, '$p->nombre', $p->precio)");
            $reg = $conex->affected_rows;
            $conex->close();
            return $reg;
        } catch (Exception $ex) {
            die($ex->getMessage());
            $reg = false;
        }
    }

    public static function buscarProducto($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM productos WHERE codigo = $cod");
            if ($result->num_rows) {
                $reg = $result->fetch_object();
                $p = new self($reg->codigo, $reg->nombre, $reg->precio);
            } else {
                $p = 0;
            }
        } catch (Exception $ex) {
            $p = false;
            echo $ex->getMessage();
        }
        return $p;
    }

    public static function recuperaTodos() {
        $products = []; // Declarar $products antes del bloque try-catch
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM productos");
            if ($result->num_rows) {
                while ($reg = $result->fetch_object()) {
                    $p = new self($reg->codigo, $reg->nombre, $reg->precio);
                    $products[] = $p;
                }
            } else {
                $products = 0;
            }
        } catch (Exception $ex) {
            $products = false;
            echo $ex->getMessage(); // Agregar paréntesis para invocar el método getMessage
        }

        return $products; // Devolver $products al final del método
    }
}
