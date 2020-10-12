<?php

    include("conexion.php");

    // $conexion = $base->query("SELECT * FROM datos_usuarios");

    // $registros = $conexion->fetchAll(PDO::FETCH_OBJ);

    $registros = $base->query("SELECT * FROM datos_usuarios")->fetchAll(PDO::FETCH_OBJ);


?>

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
                <input
                    type='button'
                    name='up'
                    id='up'
                    value='Actualizar'
                />
            </td>

<?php
    endforeach;
?>
        </tr>
        <td></td>
    </table>