<?php
//quitar notificaciones de error de php
error_reporting(0);
//importa las variables de conexion
require_once('conexion.php');
//conectar a la base de datos escuela con mysqli
$con = mysqli_connect($hostname_escuela, $username_escuela, $password_escuela, $database_escuela);
//comprobar la conexion
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<!-- crear link que mande al archivo insertar.php -->
<a href="insertar.php">Insertar</a>
<!-- crear una tabla con los datos de la tabla alumnos -->
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Edad</th>
        <th>Acciones</th>
    </tr>
    <?php
    //crear la consulta
    $query = "SELECT * FROM alumnos";
    //ejecutar la consulta
    $result = mysqli_query($con, $query);
    //recorrer el resultado de la consulta
    ?>
    <tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['edad']; ?></td>
            <td><a href="editar.php?id=<?php echo $row['id'];?>">Editar</a> | 
            <a href="eliminar.php?id=<?php echo $row['id'];?>">Eliminar</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<?php
//cerrar la conexion
mysqli_close($con);
?>

