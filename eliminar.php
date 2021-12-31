<?php
//llama la conexion
require_once('conexion.php');
//conectar a la base de datos escuela con mysqli
$con = mysqli_connect($hostname_escuela, $username_escuela, $password_escuela, $database_escuela);
//comprobar la conexion
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// borrar el registro de la tabla alumnos con el id que se pasa por la url
if ( isset( $_REQUEST['id'])) {
    //crear la consulta
    $query = "DELETE FROM alumnos WHERE id = " . $_REQUEST['id'];
    //ejecutar la consulta
    $result = mysqli_query($con, $query);
    //comprobar el resultado de la consulta
    if ($result) {
        echo "Registro borrado correctamente";
        //redireccionar a la pagina principal
        header('Location: index.php');
    } else {
        echo "Error al borrar el registro";
    }
}
//cerrar la conexion
mysqli_close($con);
?>
