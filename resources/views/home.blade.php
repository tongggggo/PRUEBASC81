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
        $consulta = "SELECT COUNT(*) as total FROM products";
    } elseif (isset($_GET['btnMascotas'])) {
        $consulta = "SELECT COUNT(*) as total FROM mascotas";
    } elseif (isset($_GET['btnPropietarios'])) {
        $consulta = "SELECT COUNT(*) as total FROM propietario";
    } elseif (isset($_GET['btnVeterinarios'])) {
        $consulta = "SELECT COUNT(*) as total FROM veterinarios";
    } elseif (isset($_GET['btnCitas'])) {
        $consulta = "SELECT COUNT(*) as total FROM cita";
    } elseif (isset($_GET['btnVentas'])) {
        $consulta = "SELECT COUNT(*) as total FROM ventas";
    } elseif (isset($_GET['btnDetalle'])) {
        $consulta = "SELECT COUNT(*) as total FROM facturadetalle";
    }

    // Ejecutar la consulta si se ha definido
    if (!empty($consulta)) {
        $resultado = $conexion->query($consulta);

        // Verificar si la consulta fue exitosa
        if ($resultado) {
            // Obtener el resultado como un arreglo asociativo
            $fila = $resultado->fetch_assoc();

            // Imprimir el resultado
            echo "Total de registros: " . $fila['total'];

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