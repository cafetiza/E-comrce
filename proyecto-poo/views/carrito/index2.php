<h1>Carrito de la compra 2</h1>
<table>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
    <th>Eliminar</th>
    <?php
    $usuario_id = $_SESSION['identity']->id;
    $carrito = new Carrito();
    $carritos = $carrito->getAllByUser($usuario_id);

    foreach ($carritos as $indice => $elemento) :
        /* var_dump($elemento); */

    ?>
        <tr>
            <td>
                <?php if ($elemento['imagen'] != null) : ?>
                    <img src="<?= base_url ?>uploads/images/<?= $elemento['imagen'] ?>" class="img_carrito" />
                <?php else : ?>
                    <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" />
                <?php endif; ?>
            </td>

            <td>
                <?= $elemento['nombre'] ?>
            </td>

            <td>
                <?= $elemento['coste'] ?>
            </td>

            <td>
                <?= $elemento['unidades'] ?>
            </td>

            <td>
                <a href="<?= base_url ?>carrito/delete&p_id=<?= $elemento['producto_id'] ?>" class="button button-carrito button-red">Quitar producto</a>
            </td>
        </tr>
    <?php endforeach ?>

</table>

<br />

<div class="delete-carrito">
    <a href="<?= base_url ?>carrito/delete_all" class="button button-delete button-red">Vaciar carrito</a>
</div>

<div class="total-carrito">
    <?php $stats = Utils::statsCarrito(); ?>
    <h3>Precio total: <?= $stats['total'] ?> $</h3>
    <a href="<?= base_url ?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
</div>