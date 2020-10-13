<?php

    include("conexion.php");

    // $conexion = $base->query("SELECT * FROM datos_usuarios");

    // $registros = $conexion->fetchAll(PDO::FETCH_OBJ);

    $registros = $base->query("SELECT * FROM datos_usuarios")->fetchAll(PDO::FETCH_OBJ);


    if (isset($_POST["cr"])) {
        # code...

        $nombre = $_POST["Nom"];
        $apellidos = $_POST["Ape"];
        $direccion = $_POST["Dir"];

        $sql = "INSERT INTO datos_usuarios ( Nombre, Apellido, Direccion )
                    VALUES ( :nom, :ape, :dir )";

        $result = $base->prepare($sql);

        $result ->execute(array(
            ":nom"=>$nombre,
            ":ape"=>$apellidos,
            ":dir"=>$direccion
        )); 

        header("Location:index.php");

    }


?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table>
        <tr>
            <td class="primera_fila" >Id</td>
            <td class="primera_fila" >Nombre</td>
            <td class="primera_fila" >Apellido</td>
            <td class="primera_fila" >Dirección</td>
            <td class="sin" >&nbsp;</td>
            <td class="sin" >&nbsp;</td>
            <td class="sin" >&nbsp;</td>
        </tr>
        
<?php 

    foreach( $registros as $personas ):?>

        <tr>
            <td> <?php echo $personas->Id        ?> </td>
            <td> <?php echo $personas->Nombre    ?> </td>
            <td> <?php echo $personas->Apellido  ?> </td>
            <td> <?php echo $personas->Direccion ?> </td>
            <td class="bot" >
                <a href="borrar.php?Id=<?php echo $personas->Id ?>">
                    <input
                        type='button'
                        name='del'
                        id='del'
                        value='Borrar'
                    />
                </a>
            </td>
            <td>
            <a href="editar.php?Id=<?php echo $personas->Id ?>&nom=<?php echo $personas->Nombre ?>&ape=<?php echo $personas->Apellido ?>&dir=<?php echo $personas->Direccion ?>">
                <input
                    type='button'
                    name='up'
                    id='up'
                    value='Actualizar'
                />
            </a>
            </td>

<?php
    endforeach;
?>
            <tr>
                <td></td>
                <td>
                    <input type="text" name="Nom" id="Nom" >
                </td>
                <td>
                    <input type="text" name="Ape" id="Ape" >
                </td>
                <td>
                    <input type="text" name="Dir" id="Dir" >
                </td>
                <td colspan="2" >
                    <input name="cr" id="cr" class="btn btn-primary" type="submit" value="Insertar">
                </td>
            </tr>
    </form>
    </table>