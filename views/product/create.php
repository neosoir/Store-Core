<?php
$categories = Utils::showCategories();
?>

<h1>Crear nuevos productos</h1>
<div class="form_container">
    <form action="<?= base_url ?>product/save" method="POST" enctype="multipart/form-data">
    
        <label for="name">Nombre</label>
        <input type="text" name="name">
    
        <label for="description">Descripcion</label>
        <textarea name="description"></textarea>
    
        <label for="price">Precio</label>
        <input type="text" name="price">
    
        <label for="stock">Stock</label>
        <input type="number" name="stock">
    
        <label for="category">Categorias</label>
        <select name="category" id="">
            <?php while( $category = $categories->fetch_object() ) : ?>
                <option value="<?= $category->id ?>"><?= $category->nombre ?></option>
            <?php endwhile; ?>
        </select>

        <label for="image">Imagen</label>
        <input type="file" name="image">

        <input type="submit" value="Guardar">
    
    </form>
</div>