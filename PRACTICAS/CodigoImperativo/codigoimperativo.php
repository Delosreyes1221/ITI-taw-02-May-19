<?php
    $automovil1 = (object)["marca" => "Toyota", "modelo" => "Corola"];
    $automovil2 = (object)["marca" => "Chevrolet", "modelo" => "Malibu"];
    $automovil3 = (object)["marca" => "Nissan", "modelo" => "Tsuru"];

    function mostrar ($automovil){
        echo "<p> Hola soy un $automovil->marca, modelo $automovil->modelo </p>";
    }

    mostrar($automovil1);
    mostrar($automovil2);
    mostrar($automovil3);

?>