 <?php
    $servidor = 'localhost';
    $usuario  = 'root'; 
    $clave    = '';
    $bbdd     = 'id15226450_biblioteca';
   
    $conexion= new mysqli($servidor,$usuario,$clave,$bbdd);
    if($conexion->connect_error)
    {
        die("Error de conexión:" .$conexion->connect_error);
    }

    $sql= "CREATE TABLE libro
        (Codigo INT(10) AUTO_INCREMENT PRIMARY KEY,
        Titulo VARCHAR(50) NOT NULL,
        anno INT(20) NOT NULL, Descripcion
        VARCHAR(200))";

    if($conexion->query($sql)===TRUE){
        echo "Se creó la tabla libros";
    }else
    {echo "Error al crear la tabla, la tabla ya existe";
        $conexion->error;
    }

    $conexion->close();
?>