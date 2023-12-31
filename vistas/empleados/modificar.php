<?php

require '../../modelos/puestos.php';
require '../../modelos/empleados.php';
require '../../modelos/areas.php';
    try {
        $empleado = new empleados($_GET);
        $puesto = new puestos();
        $area = new areas();
        $empleados = $empleado->buscar();
        $puestos = $puesto->buscar();
        $areas = $area->buscar();
        
        // echo "<pre>";
        // var_dump($areas[0]['area_ID']);
        // echo "</pre>";
        // exit;
        // $error = "NO se guardó correctamente";
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar Empleados</h1>
        <div class="row justify-content-center">
            <form action="/final/controladores/empleados/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="emp_id" value="<?= $empleados[0]['EMP_COD'] ?>" >
            <div class="row mb-3">
                <div class="col">
                    <label for="emp_nom">Nombre del empleado</label>
                    <input type="text" name="emp_nom" id="emp_nom" class="form-control" value="<?= $empleados[0]['EMP_NOM'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="emp_ape">Apellido del empleado</label>
                    <input type="text" name="emp_ape" id="emp_ape" class="form-control" value="<?= $empleados[0]['EMP_APE'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="emp_dpi">DPI</label>
                    <input type="number" name="emp_dpi" id="emp_dpi" class="form-control" value="<?= $empleados[0]['EMP_DPI'] ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="emp_puesto_cod">Puesto</label>
                    <select name="emp_puesto_cod" id="emp_puesto_cod" class="form-control">
                        <option value="">Seleccione</option>
                        <?php foreach ($puestos as $key => $puesto) : ?>
                            <option value="<?= $puesto['PUE_COD'] ?>"><?= $puesto['PUE_DESCR'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="emp_edad">Edad</label>
                    <input type="number" name="emp_edad" id="emp_edad" class="form-control" value="<?= $empleados[0]['EMP_EDAD'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="emp_sexo">Género del Empleado</label>
                    <select name="emp_sexo" id="emp_sexo" class="form-control">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="emp_area_cod">Area</label>
                    <select name="emp_area_cod" id="emp_area_cod" class="form-control">
                        <option value="">Seleccione</option>
                        <?php foreach ($areas as $key => $area) : ?>
                            <option value="<?= $area['AREA_COD'] ?>"><?= $area['AREA_DESCR'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-warning w-100">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>
