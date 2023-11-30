<table border="1">
    <?php
    $a = array(
        "Contabilidad" => array(
            "Nombre" => "Andres",
            "Apellidos" => "Fernandez",
            "Salario" => 35000,
            "Edad" => 30
        ),
        "Marketing" => array(
            "Nombre" => "Ricardo",
            "Apellidos" => "Cortes",
            "Salario" => 40000,
            "Edad" => 28
        ),
        "Ventas" => array(
            "Nombre" => "Jesus",
            "Apellidos" => "Serrano",
            "Salario" => 32000,
            "Edad" => 35
        ),
        "Informatica" => array(
            "Nombre" => "Rafa",
            "Apellidos" => "Lopez",
            "Salario" => 45000,
            "Edad" => 27
        ),
        "Direccion" => array(
            "Nombre" => "Daniel",
            "Apellidos" => "Cabello",
            "Salario" => 60000,
            "Edad" => 45
        )
    );

   
    echo '<tr><th></th><th>Nombre</th><th>Apellidos</th><th>Salario</th><th>Edad</th></tr>';

    
    
    
    foreach ($a as $departamento => $empleado) {
        
        echo '<td>'.$departamento.'</td>';
        echo '<td>'.$empleado['Nombre'].'</td>';
        echo '<td>'.$empleado['Apellidos'].'</td>';
        echo '<td>'.$empleado['Salario'].'</td>';
        echo '<td>'.$empleado['Edad'].'</td>';
        echo '</tr>';
    }

    echo '</table>';
    ?>
