<?php
$servidor = "localhost";
$usuario = "id21838681_userarroyo";
$clave = "@Horarios1";
$bd = "id21838681_profesorbbdd";
$conexion = mysqli_connect($servidor, $usuario, $clave, $bd);

$nombre =  $_POST["nombre"];
$pass =  $_POST["pass"];

if (!$conexion) {
    die("No se pudo conectar: " . mysqli_connect_error());
}

$ssql = "SELECT  id_profesor, nombre, apellido, especialidad, pass
         FROM Profesores
         WHERE nombre = '{$nombre}' AND pass='{$pass}'";

// Ejecutar sentencia SQL
$result = $conexion->query($ssql);

$json = array();

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($json,$row); // ! ver array_push
    }
}

$conexion->close();
// Formateo a JSON
echo json_encode($json);
?>
