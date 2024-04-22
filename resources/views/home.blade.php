@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Dashboard</h1>
@stop
@section('content')
<p>Welcome to this beautiful admin panel.</p>

<form method="get">
    <input type="submit" name="btnProductos" value="Productos">
    <input type="submit" name="btnMascotas" value="Mascotas">
    <input type="submit" name="btnPropietarios" value="Propietarios">
    <input type="submit" name="btnVeterinarios" value="Veterinarios">
    <input type="submit" name="btnCitas" value="Citas">
    <input type="submit" name="btnVentas" value="Ventas">
    <input type="submit" name="btnDetalle" value="Detalle">
</form>

<?php
// Establecer conexión con la base de datos (reemplaza 'host', 'usuario', 'contraseña' y 'basededatos' con los valores correctos)
$conexion = new mysqli('localhost', 'root', '', 'adminlte');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Definir consultas según el botón presionado
    $consulta = "";

    if (isset($_GET['btnProductos'])) {
        $consulta = "SELECT * FROM products";
    } elseif (isset($_GET['btnMascotas'])) {
        $consulta = "SELECT * FROM mascotas";
    } elseif (isset($_GET['btnPropietarios'])) {
        $consulta = "SELECT * FROM propietario";
    } elseif (isset($_GET['btnVeterinarios'])) {
        $consulta = "SELECT * FROM veterinarios";
    } elseif (isset($_GET['btnCitas'])) {
        $consulta = "SELECT * FROM cita";
    } elseif (isset($_GET['btnVentas'])) {
        $consulta = "SELECT * FROM ventas";
    } elseif (isset($_GET['btnDetalle'])) {
        $consulta = "SELECT * FROM facturadetalle";
    }

    // Ejecutar la consulta si se ha definido
    if (!empty($consulta)) {
        $resultado = $conexion->query($consulta);

        // Verificar si la consulta fue exitosa
        if ($resultado) {
            echo "<table border='1'>";
            if (isset($_GET['btnProductos'])) {
                echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Existencia</th><th>Imagen</th><th>Creado</th><th>Actualizado</th></tr>";
            } elseif (isset($_GET['btnMascotas'])) {
                echo "<tr><th>ID</th><th>Nombre</th><th>Propietario</th><th>Especie</th><th>Edad</th><th>Descripcion</th><th>Foto</th><th>Veterinario</th><th>Creado</th><th>Actualizado</th></tr>";
            } elseif (isset($_GET['btnPropietarios'])) {
                echo "<tr><th>ID</th><th>Nombre</th><th>Telefono</th><th>Correo</th><th>Direccion</th><th>Creado</th><th>Actualizado</th></tr>";
            } elseif (isset($_GET['btnVeterinarios'])) {
                echo "<tr><th>ID</th><th>Nombre</th><th>Especialidad</th><th>Creado</th><th>Actualizado</th></tr>";
            } elseif (isset($_GET['btnCitas'])) {
                echo "<tr><th>ID</th><th>Fecha de cita</th><th>Razon</th><th>Veterinario</th><th>Mascota</th><th>Creado</th><th>Actualizado</th></tr>";
            } elseif (isset($_GET['btnVentas'])) {
                echo "<tr><th>ID</th><th>Nombre</th><th>Cliente</th><th>Descripcion</th><th>Precio</th><th>Cantidad</th><th>Creado</th><th>Actualizado</th></tr>";
            } elseif (isset($_GET['btnDetalle'])) {
                echo "<tr><th>ID</th><th>IdVenta</th><th>Descripcion</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Creado</th><th>Actualizado</th></tr>";
            }
            // Ajusta las columnas según la estructura de tus tablas

            // Recorrer los resultados y mostrarlos en la tabla
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                foreach ($fila as $valor) {
                    echo "<td>".$valor."</td>";
                }
                echo "</tr>";
            }

            echo "</table>";

            // Liberar el resultado
            $resultado->free();
        } else {
            echo "Error al ejecutar la consulta: " . $conexion->error;
        }
    }
}

// Cerrar la conexión
$conexion->close();
?>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop