<?php

    include("conexion.php");
    $Id = $_GET["Id"];
    
    $base->query("DELETE FROM datos_usuarios WHERE Id = '$Id'");

    header('Location:index.php');

?>