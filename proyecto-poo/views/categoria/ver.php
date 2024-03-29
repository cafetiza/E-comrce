<?php if (isset($categoria)) : ?>
    <h1><?= $categoria->nombre ?></h1>
    <?php if ($productos->num_rows == 0) : ?>
        <p>No hay productos </p>
    <?php else : ?>

        <?php while ($product = $productos->fetch_object()) : ?>
            <div class="product">

                
                <?php if ($product->imagen != NULL) : ?>
                    <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
                <?php else : ?>
                    <img src="<?= base_url ?>assets/img/camiseta.png" />
                <?php endif; ?>
                <h2><?= $product->nombre ?></h2>
                
                <p><?= $product->precio ?></p>
                <a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>" class="button">Detalle</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else : ?>
    <h1>La categoría no existe</h1>
<?php endif; ?>