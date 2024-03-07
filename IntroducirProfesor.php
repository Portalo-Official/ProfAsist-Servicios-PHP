<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducir Receta</title>
</head>
<body>

    <form action="IntroducirRecetas.php" method="post">
        <h1>Introducir Receta</h1>
        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" id="nombre"><br>
        <label for="categoria">Apellido</label><br>
        <input type="text" name="apellido" id="categoria"><br>
        <label for="especialidad">Tiempo de Preparación</label><br>
        <input type="number" name="tiempo_preparacion" id="tiempo_preparacion"><br>
        <label for="dificultad">Dificultad</label><br>
        <input type="text" name="dificultad" id="dificultad"><br>
        <label for="ingredientes">Ingredientes</label><br>
        <textarea name="ingredientes" id="ingredientes" cols="30" rows="10"></textarea><br>
        <label for="instrucciones">Instrucciones</label><br>
        <textarea name="instrucciones" id="instrucciones" cols="30" rows="10"></textarea><br><br>
        <input type="submit" value="Guardar Receta"><br>
    </form>
    
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servidor = "localhost";
    $usuario = "id21838681_userarroyo";
    $clave = "@Horarios1";
    $bd = "id21838681_profesorbbdd";
    $conexion = mysqli_connect($servidor, $usuario, $clave, $bd);

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $especialidad = $_POST["especialidad"];
    $pass = $_POST["pass"];
   

    if (!$conexion) {
        die("No se pudo conectar: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO profesores (nombre, apellido, especialidad, pass) VALUES ('$nombre', '$apellido', $especialidad, '$pass')";
    if (mysqli_query($conexion, $sql)) {
        echo "Profesor creado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
    mysqli_close($conexion);
}
?>

</body>
</html>
