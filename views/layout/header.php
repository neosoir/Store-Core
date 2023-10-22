<?php

$categories = Utils::showCategories();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Camisetas</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css">
</head>
<body>

    <div id="container">

        <!-- Header. -->
        <header id="header">
            <div id="logo">
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta Logo">
                <a href="index.php">Tienda de Camisetas</a>
            </div>
        </header>
    
        <!-- Menu. -->
        <nav id="menu">
            <ul>
                <li><a href="#">Inicio</a></li>

                <?php while( $category = $categories->fetch_object() ): ?>

                    <li><a href="#"><?= $category->nombre ?></a></li>
                <?php endwhile; ?>

            </ul>
        </nav>
    
        <!-- Main. -->
        <main id="content">