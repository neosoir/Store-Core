<?php
$categories = Utils::showCategories();
?>

<?php if ( isset( $edit ) && isset( $pro ) && is_object( $pro ) ): ?>
    <h1>Editar producto <?= $pro->nombre ?></h1>
    <?php $url_action = base_url . "product/save&id=" . $pro->id ?>
<?php else: ?>
    <h1>Crear nuevo producto</h1>
    <?php $url_action = base_url . "product/save" ?>
<?php endif; ?>

<div class="form_container">
    <form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
    
        <label for="name">Nombre</label>
        <input type="text" name="name" value="<?= ( isset($pro) && is_object($pro) ) ? $pro->nombre : '' ?>">
    
        <label for="description">Descripcion</label>
        <textarea name="description"><?= ( isset($pro) && is_object($pro) ) ? $pro->descripcion : '' ?></textarea>
    
        <label for="price">Precio</label>
        <input type="text" name="price" value="<?= ( isset($pro) && is_object($pro) ) ? $pro->precio : '' ?>">
    
        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?= ( isset($pro) && is_object($pro) ) ? $pro->stock : '' ?>">

        <label for="category">Categorias</label>
        <select name="category" id="">
            <?php while( $category = $categories->fetch_object() ) : ?>
                <option value="<?= $category->id ?>" <?= ( isset($pro) && is_object($pro) && ( $category->id == $pro->id ) ) ? 'selected' : '' ?>><?= $category->nombre ?></option>
            <?php endwhile; ?>
        </select>

        <label for="image">Imagen</label>
        <?php if( isset($pro) && is_object($pro) && !empty( $pro->imagen ) ): ?>
            <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" alt="" class="thumb">
        <?php endif; ?>
        <input type="file" name="image">

        <input type="submit" value="Guardar">
    
    </form>
</div>