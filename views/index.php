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
            <h1 class="catalog-title">Catálogo Zamora</h1>

            <div class="header-icons">
                <button class="icon-btn" title="Mis favoritos">♡</button>

                <a href="https://wa.me/3511489632" class="icon-btn whatsapp-header" target="_blank" title="Enviar mensaje">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766 0-3.18-2.587-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.941-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217s.231.001.332.005c.109.004.258-.041.404.314l.542 1.312c.058.141.096.304.004.49-.09.188-.126.312-.25.455-.125.145-.252.33-.359.444-.122.13-.25.271-.108.517.141.246.628 1.035 1.348 1.675.926.823 1.708 1.077 1.954 1.199.246.123.39.101.534-.061.144-.163.621-.723.787-.968.166-.246.332-.207.56-.123.228.084 1.446.682 1.696.807.249.125.415.187.476.293.061.107.061.616-.083 1.021z" />
                    </svg>
                </a>
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
                        <?php if ($row['por_encargo'] == 1): ?>
                            <span class="order-badge">⏳ Por Encargo</span>
                        <?php endif; ?>

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
                            <span class="price-container"><?php echo $row['codigo']; ?></span>
                        <?php endif; ?>
                        <h2 class="product-title" style="margin-top: 0;"><?php echo $row['nombre']; ?></h2>

                        <div class="price-container">
                            <span class="current-price">$<?php echo number_format($row['precio'], 2); ?></span>
                        </div>

                        <button class="btn-ver-fotos"
                            onclick='abrirDetalleInferior(<?php echo json_encode($row); ?>)'>
                            Ver imágenes y detalles
                        </button>
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