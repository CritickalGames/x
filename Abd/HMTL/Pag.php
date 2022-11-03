<!DOCTYPE html>
<html lang="en">
<head>
<?php 
    require 'PHP/Secundarios/conexion.php';
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="CSS/estilos.css">
    
    <title>Document</title>
</head>
<body>
<section>
<div>
<!------------------------------------------------------------------------>
<!------------------------------------------------------------------------>
<form method="POST" action="PHP/Subir.php">
            <h2>ingresar:</h2>
            <select name="Tabla" placeholder="Tabla">
                <option value="Anime">Anime</option>
                <option value="Estado">Estado</option>
            </select><br>
            <input type="text" name="Inicial" placeholder="Inicial">
                <br>
            <input type="text" name="Nombre" placeholder="Nombre">
<br><br>Tabla de estado <br>
            <input type="text" name="ID" placeholder="ID">
                <br>
            <input type="text" name="Capitulo" placeholder="Capitulo"><br>
            <input type="text" name="Estado" placeholder="Estado"><br>
            <input type="text" name="Temporada" placeholder="Temporada"><br>
            <input type="text" name="VecesVisto" placeholder="VecesVisto"><br>


                <br>
            <input type="submit" value="Subir">

        </form>
<!------------------------------------------------------------>
<!------------------------------------------------------------------------>
<form method="POST" action="PHP/Buscar.php">
            <h2>Buscar Por:</h2>
            <p>ID</p>
            <input type="text" name="Inicial" placeholder="Inicial">
                <br>
            <input type="text" name="ID" placeholder="ID">
                <br>
            <p>O buscar por Nombre</p>
            <input type="text" name="Nombre" placeholder="Nombre">
                <br>
            <input type="submit" value="Buscar">
</form>
<!------------------------------------------------------------------------>
</div>
<div>
<!------------------------------------------------------------------------>
<!------------------------------------------------------------------------>
<form method="POST" action="PHP/Eliminar.php">
            <h2>eliminar:</h2>
            <select name="Tabla" placeholder="Tabla">
                <option value="Anime">Anime</option>
                <option value="Estado">Estado</option>
            </select> <br>
            <input type="text" name="Inicial" placeholder="Inicial">
                <br>
            <input type="text" name="ID" placeholder="ID">
                <br>
            <input type="submit" value="Eliminar">
        </form>
<!------------------------------------------------------------------------>
<!------------------------------------------------------------------------>
<form method="POST" action="PHP/Editar.php">
            <h2>editar:</h2>
            <select name="Tabla" placeholder="Tabla">
                <option value="Anime">Anime</option>
                <option value="Estado">Estado</option>
            </select> <br>
            <input type="text" name="Inicial" placeholder="Inicial">
                <br>
            <input type="text" name="ID" placeholder="ID">
                <br>
            <p>Datos a cambiar:</p>
                <br>
            <input type="text" name="Nombre" placeholder="Nombre">
                <br>

            <input type="submit" value="Editar">
        </form>
<!------------------------------------------------------------------------>
<!------------------------------------------------------------------------>
</div>

<form>


        <h3 id="Emperador2">Buscar Por Inicial:</h3>
        <input type="text" name="Inicial" placeholder="Inicial" id="Emperador"
            value="<?php //¡error_reporting(0);
                if (array_key_exists('Inicial', $_GET) ) {
                    echo array_key_exists('Inicial', $_POST) ? $_POST['Inicial'] : $_GET['Inicial'];
                }
            
            ?>">
        <input type="submit" value="Buscar">

<section>
<table border="1" >

        <tr>
            <td>Id</td>
            <td>Nombre</td>
        </tr>
    <?php
    error_reporting(0);
        $Inicial;
        if (empty($Inicial = strtoupper($_GET['Inicial']))) {
            $Inicial = "A";
        }else {
            $Inicial = strtoupper($_GET['Inicial']);
        }

        $sql="SELECT * from anime where IdAnime='$Inicial'";
        $result=mysqli_query($conexion,$sql);

        while($mostrar=mysqli_fetch_array($result)){
    ?>
            <tr>
                <td><?php echo $mostrar['IdAnime'] ?><?php echo $mostrar['IdNumero'] ?></td>
                <td><?php echo $mostrar['nombre'] ?></td>
            </tr>
    <?php 
        }
    ?>
</table>

<table style="margin-left:6px" border="1" >
        <tr>
            <td>Id</td>
            <td>Capitulo</td>
            <td>Estado</td>
            <td>Nombre</td>
            <td>Temporada</td>
            <td>VecesVisto</td>
        </tr>
    <?php
    error_reporting(0);
        $Inicial;
        if (empty($Inicial = strtoupper($_GET['Inicial']))) {
            $Inicial = "A";
        }else {
            $Inicial = strtoupper($_GET['Inicial']);
        }

        $sql="SELECT estado.*, Nombre from estado inner join anime
            ON (IdA,IdN)=(IdAnime,IdNumero) where IdA='$Inicial'";
        $result=mysqli_query($conexion,$sql);

        while($mostrar=mysqli_fetch_array($result)){
    ?>
            <tr>
                <td><?php echo $mostrar['IdA'] ?><?php echo $mostrar['IdN'] ?></td>
                <td><?php echo $mostrar['Capitulo'] ?></td>
                <td><?php echo $mostrar['Estado'] ?></td>
                <td><?php echo $mostrar['Nombre'] ?></td>
                <td><?php echo $mostrar['Temporada'] ?></td>
                <td><?php echo $mostrar['VecesVista'] ?></td>
            </tr>
    <?php 
        }
    ?>
</table>

</section>
</form>

</section>

</body>
</html>