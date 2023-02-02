<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  action ="#" method ="post">
        <br>
        <label for="">Datos Empleado 1:</label><br>
        <br>
        <label for="">Nombre y Apellido:</label>
        <input type="text" name="nameempl1"><br><br>
        <label for="">Edad:</label>
        <input type="number" name="ageemple1"><br><br>
        <label for="">Estado civil</label> <br>
        <label for="soltero">Soltero</label>
        <input type="radio" name="estado" value="soltero" id=""><br>
        <label for="viudo">Viudo</label>
        <input type="radio" name="estado" value="viudo" id=""><br>
        <label for="viudo">Casado</label>
        <input type="radio" name="estado" value="casado" id="">
        <br>
        <label for="">Sexo: </label> <br>
        <label for="hombre">Hombre</label>
        <input type="radio" name="genero" value="hombre" id="0"><br>
        <label >Mujer</label>
        <input type="radio" name="genero" value="feme" id="1">
        <br>
        <label for="">Sueldo: </label> <br>
        <label for="">Menos de 1000 </label>
        <input type="radio" name="salario1" value="menos" id="menos_de_1000"><br>
        <label for="">Entre 1000 y 2500 </label>
        <input type="radio" name="salario1" value="entre" id="entre_1000_2500"><br>
        <label for="">Mas de 2500</label>
        <input type="radio" name="salario1" value="mas" id="mas_2500">
        <br>
        <br>
        <button type="submit" name="btn">enviar</button>
    </form>
</body>
</html>

<?php

include 'clase_empleado.php';

$_SESSION['listadeempleados'] = array();
session_start();

if(isset($_POST["btn"])){
    if(isset($_POST["nameempl1"]) && !empty($_POST["nameempl1"]) && isset($_POST["ageemple1"]) && !empty($_POST["ageemple1"]) && isset($_POST["estado"]) && !empty($_POST["estado"]) && isset($_POST["genero"]) && !empty($_POST["genero"]) && isset($_POST["salario1"]) && !empty($_POST["salario1"]) ){
        
        $arremple = new clase_empleado();
        
        $arremple->setNombre($_POST["nameempl1"]);
        $arremple->setEdad($_POST["ageemple1"]);
        $arremple->setGenero($_POST["genero"]);
        $arremple->setEstado($_POST["estado"]);
        $arremple->setSueldo($_POST["salario1"]);

        array_push($_SESSION['listadeempleados'], $arremple);
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<h1>Resultados</h1>";
        resultados();
        
    }else{
        echo "error";
    }

}

function resultados(){
    $fem = 0;
    $mencondenados = 0;
    $blackwidow = 0;
    $promen = 0;
    $hom = 0;
    $prom = 0;

    $y = count($_SESSION['listadeempleados']);

    //Calcular cantidad de mujeres 
    if(isset($_SESSION['listadeempleados'])){

        for($i=0; $i<$y;$i++){

            if($_SESSION['listadeempleados'][$i]->getGenero() == "feme"){
                $fem++;
            }

        }
        echo "Total de mujeres:  " . $fem . "<br>" ;
        
    }

    //Calcular cant de hombres casados y mas de 2500
    if(isset($_SESSION['listadeempleados'])){
        for ($i=0; $i<$y; $i++){
            if($_SESSION['listadeempleados'][$i]->getGenero() == "hombre" && $_SESSION['listadeempleados'][$i]->getEstado() == "casado" && $_SESSION['listadeempleados'][$i]->getSueldo() == "mas"){
                $mencondenados++;
            }
        }

        echo "Total de empleados masculinos casados con sueldo mayor a 2500:  " . $mencondenados . "<br>" ;

    }

    //total de mujeres viudas  y con sueldo mayor a 1000

    if(isset($_SESSION['listadeempleados'])){
        for ($i=0; $i<$y; $i++){
            if($_SESSION['listadeempleados'][$i]->getGenero() == "feme" && $_SESSION['listadeempleados'][$i]->getEstado() == "viudo" && $_SESSION['listadeempleados'][$i]->getSueldo() == "entre"){
                $blackwidow++;
            }
        }

        echo "Total de empleados femeninos viudas con sueldo mayor a 1000:  " . $blackwidow ."<br>" ;

    }


    //edad promedio de hombres

    if(isset($_SESSION['listadeempleados'])){
        for ($i=0; $i<$y; $i++){
            if($_SESSION['listadeempleados'][$i]->getGenero() == "hombre"){

                $promen += $_SESSION['listadeempleados'][$i]->getEdad();
                $hom++;
            }
        }

        $prom = $promen/$hom;

        echo "Promedio de edades de empleados hombres:  " . $prom;

    }

}

?>

