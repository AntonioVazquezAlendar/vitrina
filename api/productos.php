<?php

function obtenerProductos()
{

    // 🔌 conectar a la BD
    include("conexion.php");

    // 🔍 consulta (con categoría e imagen principal)
    $sql = "SELECT 
                p.*,
                c.nombre AS categoria,
                i.url_imagen
            FROM productos p
            LEFT JOIN categorias c 
                ON c.id_categoria = p.id_categoria
            LEFT JOIN productos_imagenes i 
                ON i.id_producto = p.id_producto 
                AND i.principal = 1
            WHERE p.visible = 1";

    $result = $conn->query($sql);

    $data = [];

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

//print_r(obtenerProductos());
