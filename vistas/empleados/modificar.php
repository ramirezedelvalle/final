<?php
require '../../modelos/empleados.php';
    try {
        $empleados = new empleados($_GET);

        $empleados = $empleados->buscar();
        // echo "<pre>";
        // var_dump($empleados[0]['EMP_COD']);
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
                <input type="hidden" name="emp_cod" value="<?= $empleados[0]['EMP_COD'] ?>" >
                <div class="row mb-3">
                    <div class="col">
                        <label for="emp_nom">Nombre del Empleado</label>
                        <input type="text" name="emp_nom" id="emp_nom" class="form-control" value="<?= $empleados[0]['EMP_NOM'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="emp_ape">Apellido del Empleado</label>
                        <input type="text" name="emp_ape" id="emp_ape" class="form-control" value="<?= $empleados[0]['EMP_APE'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="emp_dpi">DPI del Empleado</label>
                        <input type="number" step="1" min="1111111111111" max="9999999999999" name="emp_dpi" id="emp_dpi" class="form-control" value="<?= $empleados[0]['EMP_DPI'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="emp_edad">Edad del Empleado</label>
                        <input type="number" step="1" min="18" max="65" name="emp_edad" id="emp_edad" class="form-control" value="<?= $empleados[0]['EMP_EDAD'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="emp_puesto_cod">Puesto del Empleado</label>
                        <input type="number" step="1" min="1" name="emp_puesto_cod" id="emp_puesto_cod" class="form-control" value="<?= $empleados[0]['EMP_PUESTO_COD'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="emp_sex_cod">Sexo del Empleado</label>
                        <input type="number" step="1" min="1" max="2" name="emp_sex_cod" id="emp_sex_cod" class="form-control" value="<?= $empleados[0]['EMP_SEX_COD'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="emp_area_cod">Area Asignada</label>
                        <input type="number" step="1" min="1" name="emp_area_cod" id="emp_area_cod" class="form-control" value="<?= $empleados[0]['EMP_AREA_COD'] ?>">
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