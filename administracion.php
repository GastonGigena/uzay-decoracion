<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'tu_usuario', 'tu_contraseña', 'tu_base_de_datos');

// Comprobamos si se ha producido un error
if ($conexion->connect_errno) {
    echo 'Error al conectar con la base de datos: ' . $conexion->connect_error;
    exit();
}

// Consulta para obtener todos los productos
$resultado = $conexion->query('SELECT * FROM productos');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Administración de productos</title>
    <link rel="stylesheet" href="styles/administracion.css">
</head>

<body>

    <h1>Administración de productos</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>
                <td><?php echo $fila['precio']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <form action="" method="POST">
        <h2>Modificar producto</h2>
        <input type="hidden" id="id" name="id" value="PRODUCTO_ID">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"></textarea>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required>
        <button type="submit">Modificar producto</button>
    </form>

    <section class="logoadmind" id="logoadmind">
        <img src="images/logoUzayFondoOscuro.png" alt="">
    </section>

</body>

</html>

<?php
// Cerramos la conexión con la base de datos
$conexion->close();

?>