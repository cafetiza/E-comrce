<h1>Carrito de la compra</h1>
<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
<table class="">
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
    <?php foreach ($carrito as $indice => $elemento) :
        $producto = $elemento['producto'];
        /* var_dump($producto); */
    ?>
        <tr>
            <td><?php if ($producto->imagen != null) : ?>
                    <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito"/>
                <?php else : ?>
                    <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito"/>
                <?php endif; ?>
            </td>

            <td>
            <a href="<?= base_url ?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
            </td>

            <td>
                <?=$producto->precio?>
            </td>

            <td>
                <?=$elemento['unidades']?>
            </td>
        </tr>
    <?php endforeach ?>
</table>

<br/>
<div class="total-carrito">
	<?php $stats = Utils::statsCarrito(); ?>
	<h3>Precio total: <?=$stats['total']?> $</h3>
	<a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
    <a href="<?=base_url?>carrito/delete_all" class="button button-pedido">Borrar pedido</a>
</div>  

<?php else: ?>
	<p>El carrito está vacio, añade algun producto</p>
<?php endif; ?>