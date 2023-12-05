<?php

require_once './Conexion.php';

class Producto {

    private $codigo;
    private $nombre;
    private $precio;

    public function __construct($cod = 0, $nom = "", $pre = 0) {
        $this->codigo = $cod;
        $this->nombre = $nom;
        $this->precio = $pre;
    }

    public function modProducto($cod, $nom, $pre) {
        $this->codigo = $cod;
        $this->nombre = $nom;
        $this->precio = $pre;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        return $this->$name = $value;
    }

    public function __toString() {
        return "Codigo: " . $this->codigo . "-Nombre: " . $this->nombre . "-Precio: " . $this->precio . "<br>";
    }

    public function insertar() {
        try {
            $conex = new Conexion();
            $conex->query("INSERT INTO producto VALUES ($this->codigo, '$this->nombre', $this->precio)");
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
            $result = $conex->query("SELECT * FROM producto WHERE codigo = $cod");
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
            $result = $conex->query("SELECT * FROM producto");
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
