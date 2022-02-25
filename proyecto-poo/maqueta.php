<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Creaciones craft cirli</title>
</head>

<body>
    <div id="container">
        <!-- CABECERA -->
        <header id="header">
            <div id="logo">
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta Logo" />
                <a href="<?= base_url ?>">
                    Creaciones craft cirli
                </a>
            </div>
        </header>

        <!-- MENU -->
        <?php $categorias = Utils::showCategorias(); ?>
        <nav id="menu">
            <ul>
                <li>
                    <a href="<?= base_url ?>">Inicio</a>
                </li>

                <?php while ($cat = $categorias->fetch_object()) : ?>
                    <li>
                        <a href="<?= base_url ?>categoria/ver&id=<?= $cat->id ?>"><?= $cat->nombre ?></a>
                    </li>
                <?php endwhile; ?>

            </ul>
        </nav>

        <div id="content">
            <!-- BARRA LATERAL -->
            <aside id="lateral">

                <div id="carrito" class="block_aside">
                    <h3>Mi carrito</h3>
                    <ul>
                        <?php $stats = Utils::statsCarrito(); ?>
                        <li><a href="<?= base_url ?>carrito/index">Productos(<?= $stats['count'] ?>)</a></li>
                        <li><a href="<?= base_url ?>carrito/index">Total: <?= $stats['total'] ?> $</a></li>
                        <li><a href="<?= base_url ?>carrito/index">Ver el carrito</a></li>
                    </ul>
                </div>
                <div id="login" class="block_aside">

                    <?php if (!isset($_SESSION['identity'])) : ?>
                        <h3>Entrar a la web</h3>
                        <form action="<?= base_url ?>/usuario/login" method="post">
                            <label for="email">Email</label>
                            <input type="email" name="email" />
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" />
                            <input type="submit" value="Enviar" />
                        </form>

                    <?php else : ?>
                        <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
                    <?php endif; ?>

                    <ul>
                        <?php if (isset($_SESSION['admin'])) : ?>
                            <li><a href="<?= base_url ?>categoria/index">Gestionar categorias</a></li>
                            <li><a href="<?= base_url ?>producto/gestion">Gestionar productos</a></li>
                            <li><a href="<?= base_url ?>pedido/gestion">Gestionar pedidos</a></li>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['identity'])) : ?>
                            <li><a href="<?= base_url ?>pedido/mis_pedidos">Mis pedidos</a></li>
                            <li><a href="<?= base_url ?>usuario/logout">Cerrar sesión</a></li>
                        <?php else : ?>
                            <li><a href="<?= base_url ?>usuario/registro">Registrate aqui</a></li>
                        <?php endif; ?>
                    </ul>
                </div>

            </aside>

            <!-- CONTENIDO CENTRAL -->
            <div id="central">
            </div>
        </div>
        <!-- PIE DE PÁGINA -->
        <footer id="footer">
            <p>Desarrollado por John Ruiz &copy; <?= date('Y') ?></p>
        </footer>
    </div>
</body>

</html>