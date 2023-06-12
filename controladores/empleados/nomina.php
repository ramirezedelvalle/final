<?php
require '../../modelos/empleados.php';
try {
    $empleados = new empleados($_GET);
    
    $empleados = $empleados->registro();

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
        <tr><th colspan="9">Nomina del Personal</th></tr>
    </thead>
    <tbody>
        <?php
        $areas = array();
        foreach ($empleados as $key => $empleado) {
            $area = $empleado['AREA_DESCR'];
            if (!isset($areas[$area])) {
                $areas[$area] = array();
            }
            $areas[$area][] = $empleado;
        }

        if (count($areas) > 0) {
            foreach ($areas as $area => $empleados) {
                echo '<tr><th colspan="9">' . $area . '</th></tr>'; // Encabezado de área
                echo '<tr>'; // Encabezados de columna
                echo '<th>NO.</th>';
                echo '<th>NOMBRE</th>';
                echo '<th>APELLIDO</th>';
                echo '<th>DPI</th>';
                echo '<th>EDAD</th>';
                echo '<th>PUESTO</th>';
                echo '<th>SUELDO</th>';
                echo '<th>SEXO</th>';
                echo '</tr>';

                foreach ($empleados as $key => $empleado) {
                    echo '<tr>';
                    echo '<td>' . ($key + 1) . '</td>';
                    echo '<td>' . $empleado['EMP_NOM'] . '</td>';
                    echo '<td>' . $empleado['EMP_APE'] . '</td>';
                    echo '<td>' . $empleado['EMP_DPI'] . '</td>';
                    echo '<td>' . $empleado['EMP_EDAD'] . '</td>';
                    echo '<td>' . $empleado['PUE_DESCR'] . '</td>';
                    echo '<td>Q. ' . $empleado['PUE_SUEL'] . '</td>';
                    echo '<td>' . $empleado['EMP_SEXO'] . '</td>';   
                    echo '</tr>';
                }
            }
        } else {
            echo '<tr><td colspan="9">NO EXISTEN REGISTROS</td></tr>';
        }
        ?>
    </tbody>
</table>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/final/vistas/empleados/buscar.php" class="btn btn-info w-100">Atrás</a>
            </div>
        </div>
    </div>
</body>
</html>