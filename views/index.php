<?php
// Incluimos la lógica de productos (que a su vez incluye conexion.php)
include(__DIR__ . "/../api/productos.php");

// Obtenemos los datos necesarios desde la base de datos
$productos = obtenerProductos();
$categorias = obtenerCategorias();
$config = obtenerConfiguracion();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Vitrina Digital | Catálogo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>

    <header class="catalog-header">
        <div class="header-top">
            <h1 class="catalog-title">Colección</h1>
            <div class="header-icons">
                <button class="icon-btn">♡</button>
                <button class="icon-btn">👜</button>
            </div>
        </div>

        <div class="search-bar">
            <input type="text" id="productSearch" placeholder="Buscar productos...">
        </div>
    </header>

    <nav class="catalog-filters">
        <div class="filter-group">
            <button class="filter-btn active" data-filter="all">Todas</button>
            <?php foreach ($categorias as $cat): ?>
                <button class="filter-btn" data-filter="<?php echo $cat['id_categoria']; ?>">
                    <?php echo $cat['nombre']; ?>
                </button>
            <?php endforeach; ?>
        </div>
    </nav>

    <section class="catalog-info-bar">
        <span class="product-count"><?php echo count($productos); ?> productos encontrados</span>
        <button class="sort-btn">Ordenar</button>
    </section>

    <main class="contenedor">
        <div class="grid-catalog" id="gridCatalog">
            <?php foreach ($productos as $row): ?>
                <article class="product-card" data-cat="<?php echo $row['id_categoria']; ?>">

                    <div class="card-image-area">

                        <img src="<?php echo $row['url_imagen'] ?: 'assets/img/default.jpg'; ?>"
                            alt="<?php echo $row['nombre']; ?>" loading="lazy">

                        <?php if (!empty($row['etiqueta'])): ?>
                            <span class="product-tag"><?php echo $row['etiqueta']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="card-details">
                        <span class="product-category"><?php echo $row['categoria_nombre']; ?></span>

                        <?php if (!empty($row['marca'])): ?>
                            <span class="product-brand" style="
                    display: block; 
                    font-size: 0.7rem; 
                    text-transform: uppercase; 
                    letter-spacing: 1px; 
                    color: #999; 
                    margin-bottom: 4px;
                    font-weight: 600;">
                                <?php echo htmlspecialchars($row['marca']); ?>
                            </span>
                        <?php endif; ?>
                        <?php if (!empty($row['codigo'])): ?>
                            <span class="sku-badge"><?php echo $row['codigo']; ?></span>
                        <?php endif; ?>
                        <h2 class="product-title" style="margin-top: 0;"><?php echo $row['nombre']; ?></h2>

                        <div class="price-container">
                            <span class="current-price">$<?php echo number_format($row['precio'], 2); ?></span>
                        </div>

                        <a class="btn-whatsapp" target="_blank"
                            href="https://wa.me/<?php echo $config['whatsapp']; ?>?text=<?php echo urlencode($config['mensaje_default'] . ": " . $row['nombre'] . " (Marca: " . $row['marca'] . ")"); ?>">
                            Contactar
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <script>
        // Lógica para filtrado y búsqueda instantánea
        const searchInput = document.getElementById('productSearch');
        const filterBtns = document.querySelectorAll('.filter-btn');
        const cards = document.querySelectorAll('.product-card');

        function aplicarFiltros() {
            const busqueda = searchInput.value.toLowerCase();
            const categoriaActiva = document.querySelector('.filter-btn.active').dataset.filter;

            cards.forEach(card => {
                const titulo = card.querySelector('.product-title').innerText.toLowerCase();
                const idCat = card.dataset.cat;

                const coincideBusqueda = titulo.includes(busqueda);
                const coincideCategoria = (categoriaActiva === 'all' || idCat === categoriaActiva);

                card.style.display = (coincideBusqueda && coincideCategoria) ? 'flex' : 'none';
            });
        }

        // Eventos
        searchInput.addEventListener('keyup', aplicarFiltros);

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                aplicarFiltros();
            });
        });
    </script>

</body>

</html>