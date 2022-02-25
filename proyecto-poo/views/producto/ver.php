<?php if (isset($product)) : ?>
	<h1><?= $product->nombre ?></h1>
	<div id="detail-product">
		<div class="image">
			<?php if ($product->imagen != null) : ?>
				<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
			<?php else : ?>
				<img src="<?= base_url ?>assets/img/camiseta.png" />
			<?php endif; ?>
		</div>
		<div class="data">
			<p class="description"><?= $product->descripcion ?></p>
			<p class="price"><?= $product->precio ?>$</p>

			<form action="<?= base_url ?>carrito/add&id=<?= $product->id ?>" method="POST">
				<label for="unidades">Cantidad</label>
				<input type="number" name="unidades">

				<input type="submit" value="Añadir al carrito"> 
			</form>

		</div>
	</div>
<?php else : ?>
	<h1>El producto no existe</h1>
<?php endif; ?>