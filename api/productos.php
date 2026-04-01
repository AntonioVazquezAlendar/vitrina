<?php
// api/productos.php

function obtenerProductos() {
    include("conexion.php");

    $sql = "SELECT 
                p.id_producto,
                p.codigo,
                p.nombre,
                p.marca, -- <--- Nuevo campo agregado
                p.precio,
                p.id_categoria,
                p.etiqueta,
                c.nombre AS categoria_nombre,
                i.url_imagen
            FROM productos p
            LEFT JOIN categorias c ON c.id_categoria = p.id_categoria
            LEFT JOIN productos_imagenes i ON i.id_producto = p.id_producto AND i.principal = 1
            WHERE p.visible = 1
            ORDER BY p.id_producto DESC";

    $result = $conn->query($sql);
    $data = [];
    if ($result) {
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    }
    return $data;
}

function obtenerCategorias() {
    include("conexion.php");
    $sql = "SELECT * FROM categorias WHERE activo = 1";
    $result = $conn->query($sql);
    $data = [];
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    return $data;
}

function obtenerConfiguracion() {
    include("conexion.php");
    $sql = "SELECT * FROM configuracion LIMIT 1";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}
?>