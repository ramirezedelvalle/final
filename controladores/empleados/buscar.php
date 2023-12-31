<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

<?php
require '../../modelos/empleados.php';
try {
    $empleados = new empleados($_GET);
    
    $empleados = $empleados->buscar();
    // echo "<pre>";
    // var_dump($empleados);
    // echo "</pre>";
    // exit;
    // $error = "NO se guardó correctamente";
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>DPI</th>
                            <th>EDAD</th>
                            <th>PUESTO</th>
                            <th>SEXO</th>
                            <th>AREA</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($empleados) > 0):?>
                        <?php foreach($empleados as $key => $empleados) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $empleados['EMP_NOM'] ?></td>
                            <td><?= $empleados['EMP_APE'] ?></td>
                            <td><?= $empleados['EMP_DPI'] ?></td>
                            <td><?= $empleados['EMP_EDAD'] ?></td>
                            <td><?= $empleados['EMP_PUESTO_COD'] ?></td>
                            <td><?= $empleados['EMP_SEXO'] ?></td>
                            <td><?= $empleados['EMP_AREA_COD'] ?></td>
                            <td><a class="btn btn-warning w-100" href="/final/vistas/empleados/modificar.php?emp_cod=<?= $empleados['EMP_COD']?>">Modificar</a></td>
                            <td><a class="btn btn-danger w-100" href="/final/controladores/empleados/eliminar.php?emp_cod=<?= $empleados['EMP_COD']?>">Eliminar</a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="3">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/final/vistas/empleados/buscar.php" class="btn btn-primary w-100">Atrás</a>
            </div>
        </div>
    </div>
</body>
</html>

<?php include_once '../../includes/footer.php'?>