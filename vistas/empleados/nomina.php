<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../modelos/empleados.php';
require '../../modelos/areas.php';
require '../../modelos/puestos.php';
    try {
        $id = $_GET['emp_cod'];
        $empleados = new empleados();

        $nomina = $empleados->nomina($id);

 
        // $productos = $detalle->buscar();
        // echo "<pre>";
        // var_dump($empleadoss);
        // echo "</pre>";
        // echo "<pre>";
        // var_dump($puestos);
        // echo "</pre>";
        // exit;
        // // $error = "NO se guardó correctamente";
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>NOMINA</title>
</head>
<body>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 table-responsive">
                <table class="table table-bordered">
                    <thead >
                        <tr class="text-center table-dark">
                            <th colspan="7">PRODUCTOS</th>
                        </tr>
                    <thead class="table-dark">
                        <tr>
                            <th>NO.</th>
                            <th>PRODUCTO</th>
                            <th>PRECIO</th>
                            <th>CANTIDAD</th>
                            <th>SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($factura) > 0) : ?>
                            <?php foreach ($factura as $key => $venta) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $venta ['PRODUCTO_NOMBRE'] ?></td>
                                    <td><?= $venta['PRODUCTO_PRECIO'] ?></td>
                                    <td><?= $venta['DETALLE_CANTIDAD'] ?></td>
                                    <td><?= $venta['TOTAL'] ?></td>
                                    
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="8">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif ?>
                        <tr>
                        <td colspan="4">Total:</td>
                        <td><?= $venta['TOTAL'] ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/practica9/vistas/ventas/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>