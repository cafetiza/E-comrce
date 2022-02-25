<?php
require_once 'models/producto.php';
require_once 'models/carrito.php';

class carritoController
{
    /* public function index()
    {
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
            $carrito = $_SESSION['carrito'];
        }else{
            $carrito = array();
        }

        require_once 'views/carrito/index.php';
    } 

    public function add()
    {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            header('Location:' . base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            //conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            //añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );

            }
        }
        header("Location:" . base_url . "carrito/index");
    } 


    public function up(){
		if(isset($_GET['index'])){
			$index = $_GET['index'];
			$_SESSION['carrito'][$index]['unidades']++;
		}
		header("Location:".base_url."carrito/index");
	}
	
	public function down(){
		if(isset($_GET['index'])){
			$index = $_GET['index'];
			$_SESSION['carrito'][$index]['unidades']--;
			
			if($_SESSION['carrito'][$index]['unidades'] == 0){
				unset($_SESSION['carrito'][$index]);
			}
		}
		header("Location:".base_url."carrito/index");
	}

    public function delete()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);
        }
        header("Location:" . base_url . "carrito/index");
    }

    public function delete_all()
    {
        unset($_SESSION['carrito']);
        header("Location:" . base_url . "carrito/index");
    } */ 

    public function index()
    {
        /* $carritoS = $_SESSION['carrito']; */
        require_once 'views/carrito/index2.php';
    }

    public function add(){
        $producto_id = $_GET['id'];
        $unidades = $_POST['unidades'];

        //si existe el registro
        $carritoVerificador = new Carrito();
        $carritos = $carritoVerificador->getOne($producto_id);

        /* var_dump($carritos->fetch_object());
        var_dump($carritos->num_rows); */

        if ($carritos->num_rows == 0) {
            /* echo "no existo"; */

            //conseguir producto
            $producto = new Producto();
            $producto -> setId($producto_id);
            $producto = $producto->getOne(); 

            //añadir al carrito
            if (is_object($producto)) {
                $usuario_id = $_SESSION['identity']->id;
            
                //añadir carrito a BD
                $carrito = new Carrito();
                $carrito -> setUsuario_id($usuario_id);
                $carrito -> setProducto_id($producto->id);
                $carrito -> setCoste($producto->precio);
                $carrito -> setUnidades($unidades);

                $carritos = $carrito->save();
            } 
        }else{
            /* echo "existo"; */
            /* echo $unidades,$producto_id; */

            $carrito = new Carrito(); 
            $carritos = $carrito->update($unidades,$producto_id);

        }
        
        /* header("Location:" . base_url . "carrito/index"); */ 
    }

    public function delete()
    {
        $producto_id = $_GET['p_id'];
        /* echo $producto_id; */
        $carrito = new Carrito();
        $carritos = $carrito->deleteOneByProduct($producto_id);

        
    }

    public function delete_all()
    {
        $usuario_id = $_SESSION['identity']->id;
        $carrito = new Carrito();
        $carritos = $carrito->deleteAllByUsuario($usuario_id);

        unset($_SESSION['carrito']);
        header("Location:" . base_url . "carrito/index");
    }

}
