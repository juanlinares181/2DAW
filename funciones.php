
<?php

function nomina(&$salario, $comple = 0, $ret = 100) {
    $nomina = $salario - $ret + $comple;
    $salario = 80000;
    return $nomina;
}

function fecha(&$d = 0, &$dia = 0, &$m = 0, &$a = 0, $tunix) {
    $dia=date('N',$tunix);
$mes=date('n',$tunix);

switch ($dia){
    case 1:{
        $d="Lunes";
        break;
    }
    case 2:{
        $d="Martes";
        break;
    }
    case 3:{
        $d="Miércoles";
        break;
    }
    case 4:{
        $d="Jueves";
        break;
    }
    case 5:{
        $d="Viernes";
        break;
    }
    case 6:{
        $d="Sábado";
        break;
    }
    case 7:{
        $d="Domingo";
        break;
    }
}
switch ($mes){
    case 1:{
        $m="Enero";
        break;
    }
    case 2:{
        $m="Febrero";
        break;
    }
    case 3:{
        $m="Marzo";
        break;
    }
    case 4:{
        $m="Abril";
        break;
    }
    case 5:{
        $m="Mayo";
        break;
    }
    case 6:{
        $m="Junio";
        break;
    }
    case 7:{
        $m="Julio";
        break;
    }
    case 8:{
        $m="Agosto";
        break;
    }
    case 9:{
        $m="Septiembre";
        break;
    }
    case 10:{
        $m="Octubre";
        break;
    }
    case 11:{
        $m="Noviembre";
        break;
    }
    case 12:{
        $m="Diciembre";
        break;
    }
}
//$diasem=$d;
$dia=date('d',$tunix);
$a=date('Y',$tunix);
//echo $d.", ".date('d')." de ".$m." de ".date('Y');
}
?>

