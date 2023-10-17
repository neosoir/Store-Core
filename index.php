<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Camisetas</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

    <div id="container">

        <!-- Header. -->
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="Camiseta Logo">
                <a href="index.php">Tienda de Camisetas</a>
            </div>
        </header>
    
        <!-- Menu. -->
        <nav id="menu">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Categoria 1</a></li>
                <li><a href="#">Categoria 2</a></li>
                <li><a href="#">Categoria 3</a></li>
                <li><a href="#">Categoria 4</a></li>
            </ul>
        </nav>
    
        <!-- Main. -->
        <main id="content">
            
            <!-- Sidebar. -->
            <aside id="lateral">
                <div id="login" class="blok_side">
                    <h3>Entrar a la Web</h3>
                    <form action="" method="post">
    
                        <label for="email">Email</label>
                        <input type="email" name="email">
    
                        <label for="password">Contraseña</label>
                        <input type="password" name="password">
    
                        <input type="submit" value="Enviar">
                    </form>
                    <ul>
                        <li><a href="">Mis Pedidos</a></li>
                        <li><a href="">Gestionar Pedidos</a></li>
                        <li><a href="">Gestionar Categorias</a></li>
                    </ul>
                </div>
            </aside>
    
            <!-- Porducts Loop. -->
            <div id="central">
                <h1>Productos Destacados</h1>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="producto">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>$30</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="producto">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>$30</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="producto">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>$30</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="producto">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>$30</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="producto">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>$30</p>
                    <a href="" class="button">Comprar</a>
                </div>
            </div>
        </main>
    
    
        <!-- Footer. -->
        <footer id="footer">
            <p>Desarrollado por Neos Lab &copy; <?= date('Y') ?></p>
        </footer>

    </div>
</body>
</html>