<form action="" method="POST">
    Usuario: <input type="text" name="usu">  
    Pass: <input type="password" name="pass">
    <input type="submit" name="enviar" value="SQL">
    <input type="submit" name="enviar2" value="PREPARADA">
</form>
<?php
if (isset($_POST['enviar'])) {
    try {
        $conex = new mysqli('lcoalhost', 'dwes', 'abc123.', 'prueba');
        $result = $conex->query("SELECT * FROM empleados WHERE usuario='$_POST[usu]' AND pass='$_POST[pass]'");
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    if ($result->num_rows > 0) {
        echo "Has entrado";
    } else {
        echo "Usuario o Contraseña incorrecta";
    }
}

if (isset($_POST['enviar2'])) {
    try {
        $conex = new mysqli('lcoalhost', 'dwes', 'abc123.', 'prueba');
        $conex->prepare("SELECT * FROM empleados WHERE usuario = ? && pass = ?");
        $stmt->bind_param('ss', $_POST['usu'], $_POST['pass']);
        $stmt->execute();
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
}

