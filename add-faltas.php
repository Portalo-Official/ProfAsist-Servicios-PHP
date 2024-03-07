<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servidor = "localhost";
    $usuario = "id21838681_userarroyo";
    $clave = "@Horarios1";
    $bd = "id21838681_profesorbbdd";
    $conexion = mysqli_connect($servidor, $usuario, $clave, $bd);

    $profesor = $_POST["profesor"];
    $fecha = $_POST["fecha"];
    $hora_numero = $_POST["hora_numero"];

    if (!$conexion) {
        die("No se pudo conectar: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO asistencia_faltas (profesor, fecha, hora_numero) VALUES ('$profesor', '$fecha', '$hora_numero')";
    if (mysqli_query($conexion, $sql)) {
        echo "Falta creada correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
    mysqli_close($conexion);
}
?>

