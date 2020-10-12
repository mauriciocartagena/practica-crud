<?php

    include("conexion.php");

    // $conexion = $base->query("SELECT * FROM datos_usuarios");

    // $registros = $conexion->fetchAll(PDO::FETCH_OBJ);

    $registros = $base->query("SELECT * FROM datos_usuarios")->fetchAll(PDO::FETCH_OBJ);

    print_r( $registros);

?>