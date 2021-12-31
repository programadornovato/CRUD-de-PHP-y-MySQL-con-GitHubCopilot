<?php
//llamar la conexion
require_once('conexion.php');
//conectar a la base de datos escuela con mysqli
$con = mysqli_connect($hostname_escuela, $username_escuela, $password_escuela, $database_escuela);
//comprobar la conexion
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<!-- crear un formulario para editar registros en la tabla alumnos -->
<form action="editar.php" method="post">
    <?php
    // consultar un registro de la tabla alumnos
    $query = "SELECT * FROM alumnos WHERE id = " . $_REQUEST['id'];
    //ejecutar la consulta
    $result = mysqli_query($con, $query);
    //recorrer el resultado de la consulta
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>">
        <br>
        <label for="apellido">Apellidos:</label>
        <input type="text" name="apellido" id="apellido" value="<?php echo $row['apellido']; ?>">
        <br>
        <label for="edad">Edad:</label>
        <input type="text" name="edad" id="edad" value="<?php echo $row['edad']; ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
        <br>
        <input type="submit" value="Guardar" name="guardar">
        <?php
    }
    ?>
</form>
<?php
// validar que el formulario se ha enviado
if ( isset( $_REQUEST['guardar'])) {
    //crear la consulta
    $query = "UPDATE alumnos SET nombre='" . $_POST['nombre'] . "', apellido='" . $_POST['apellido'] . "', edad='" . $_POST['edad'] . "' WHERE id=" . $_REQUEST['id'];
    //ejecutar la consulta
    $result = mysqli_query($con, $query);
    //comprobar el resultado de la consulta
    if ($result) {
        echo "Registro editado correctamente";
        //redireccionar a la pagina principal
        header('Location: index.php');
    } else {
        echo "Error al editar el registro";
    }
}
//cerrar la conexion
mysqli_close($con);
?>