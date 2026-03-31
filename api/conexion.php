<?php
// 🔥 MOSTRAR ERRORES (solo en desarrollo)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 🔌 DATOS DE CONEXIÓN
$host = "localhost";
$user = "root";
$pass = "root1234";
$db   = "vitrina_digital";

// 🔗 CREAR CONEXIÓN
$conn = new mysqli($host, $user, $pass, $db);

// ❌ VALIDAR CONEXIÓN
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// ✅ OPCIONAL: MENSAJE DE PRUEBA
 //echo "Conectado correctamente";
?>