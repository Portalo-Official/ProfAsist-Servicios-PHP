 <?php
    // $servidor = 'localhost';
    // $usuario  = 'id21838681_jeronimo'; 
    // $clave    = 'genteFalsa1.';
    $servidor = 'localhost';
    $usuario  = 'id21838681_userarroyo'; 
    $clave    = '@Horarios1';
    $bbdd     = 'id21838681_profesorbbdd';

    $conexion= new mysqli($servidor,$usuario,$clave);

    if($conexion->connect_error)
    {
        die("Error de conexión:" .$conexion->connect_error);
    }

    $sql= `${$servidor} `;
    if($conexion->query($sql)===TRUE){
        echo "Base de datos creada";
    }
    else{
        echo "Error creando la base de datos:"." " . $conexion->error;
    }

    $conexion->close();

?>