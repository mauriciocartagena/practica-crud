
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>

<?php 

    include("conexion.php");

    if(!isset($_POST["bot_actualizar"])){

        $Id  = $_GET["Id"];
        $nom = $_GET["nom"];  
        $ape = $_GET["ape"]; 
        $dir = $_GET["dir"]; 
    }
    else{
        $Id  = $_POST["id"];
        $nom = $_POST["nom"];  
        $ape = $_POST["ape"]; 
        $dir = $_POST["dir"]; 

        $sql = "UPDATE datos_usuarios SET Nombre=:miNom, Apellido=:miApe, Direccion=:miDir WHERE Id =:miId";

        $resultado = $base->prepare($sql);

        $resultado->execute(array(
            ":miId"=>$Id,
            ":miNom"=>$nom,
            ":miApe"=>$ape,
            ":miDir"=>$dir    
        ));

        header("Location:index.php");
    }



?>

    <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <table>
            <tr>
                <td></td>
                <td>
                    <label for=id></label>
                    <input type="hidden" name="id" id="id" value="<?php echo $Id ?>" >
                </td>
            </tr>
                
            <tr>
                <td></td>
                <td>
                    <label>Nombre</label>
                    <input type="text" name="nom" id="nom" value="<?php echo $nom ?>" >
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <label>Apellido</label>
                    <input type="text" name="ape" id="ape" value="<?php echo $ape?>" >
                </td>
            </tr>
                
            <tr>
                <td></td>
                <td>
                    <label>Dirección</label>
                    <input type="text" name="dir" id="dir" value="<?php echo $dir?>" >
                </td>
            </tr>
            <tr>
                <td colspan="2" >
                    <input name="bot_actualizar" id="bot_actualizar" class="btn btn-primary" type="submit" value="Actualizar">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>