<?php
$servidor = "localhost";
$usuario = "id21838681_userarroyo";
$clave = "@Horarios1";
$bd = "id21838681_profesorbbdd";
$conexion = mysqli_connect($servidor, $usuario, $clave, $bd);

if (!$conexion) {
    die("No se pudo conectar: " . mysqli_connect_error());
}

$ssql = "SELECT
        P.nombre,
        P.apellido,
        AF.hora_numero as hora,
        HP.dia_semana as dia,
        HP.grupo
        FROM
        Profesores P
        INNER JOIN
        asistencia_faltas AF ON P.id_profesor = AF.profesor
        INNER JOIN
        Horario_profesor HP ON  AF.hora_numero = HP.hora_numero
        WHERE
        AF.fecha = DATE_ADD(CURDATE(), INTERVAL 1 DAY) AND HP.dia_semana=DAYNAME(AF.fecha);";
        //  SELECT DISTINCT profesor, fecha, hora_numero FROM asistencia_faltas WHERE fecha = CURDATE();

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
