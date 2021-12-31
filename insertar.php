<?php
//llama la conexion
require_once('conexion.php');
//conectar a la base de datos escuela con mysqli
$con = mysqli_connect($hostname_escuela, $username_escuela, $password_escuela, $database_escuela);
//comprobar la conexion
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<!-- crear un formulario para insertar registros en la tabla alumnos -->
<form action="insertar.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre">
    <br>
    <label for="apellido">Apellidos:</label>
    <input type="text" name="apellido" id="apellido">
    <br>
    <label for="edad">Edad:</label>
    <input type="text" name="edad" id="edad">
    <br>
    <input type="submit" value="Insertar" name="guardar">
</form>
<?php
// validar que el formulario se ha enviado
if ( isset( $_REQUEST['guardar'])) {
    //crear la consulta
    $query = "INSERT INTO alumnos (nombre, apellido, edad) VALUES ('" . $_POST['nombre'] . "', '" . $_POST['apellido'] . "', '" . $_POST['edad'] . "')";
    //ejecutar la consulta
    $result = mysqli_query($con, $query);
    //comprobar el resultado de la consulta
    if ($result) {
        echo "Registro insertado correctamente";
        //redireccionar a la pagina principal
        header('Location: index.php');
    } else {
        echo "Error al insertar el registro";
    }
}
//cerrar la conexion
mysqli_close($con);
?>

