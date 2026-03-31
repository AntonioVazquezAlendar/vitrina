<?php
include(__DIR__ . "/../api/productos.php");

// 🔥 obtener productos desde la lógica
$productos = obtenerProductos();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vitrina Digital</title>
    <link rel="stylesheet" href="/vitrina/assets/css/estilos.css">
</head>

<body>

<header>
    <h1>🛒 Vitrina Digital</h1>
</header>

<div class="contenedor">

<?php if(count($productos) > 0) { ?>

    <?php foreach($productos as $row) { ?>

        <div class="card">

            <div class="card-top">
                <?php if($row['etiqueta']) { ?>
                    <div class="etiqueta"><?php echo $row['etiqueta']; ?></div>
                <?php } ?>

                <img src="<?php echo $row['url_imagen'] ?: 'https://via.placeholder.com/300'; ?>">
            </div>

            <div class="card-body">
                <div class="categoria"><?php echo $row['categoria']; ?></div>

                <div class="titulo"><?php echo $row['nombre']; ?></div>

                <div class="precio">$<?php echo number_format($row['precio'],2); ?></div>

                <a class="btn" target="_blank"
                   href="https://wa.me/5213511234567?text=Hola,%20me%20interesa%20el%20producto%20<?php echo $row['codigo']; ?>">
                    Contactar
                </a>
            </div>

        </div>

    <?php } ?>

<?php } else { ?>

    <p style="padding:20px;">No hay productos disponibles</p>

<?php } ?>

</div>

</body>
</html>