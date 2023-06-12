<?php
require_once '../../modelos/Puestos.php';
require_once '../../modelos/Area.php';

try {
    $area = new Area();
    $areas = $area->buscar();
    $puesto = new Puesto();
    $puestos = $puesto->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>

<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Formulario de Empleados</h1>
        <div class="row justify-content-center">
            <form action="/final/controladores/empleados/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="emp_nom">Nombre del Empleado</label>
                        <input type="text" name="emp_nom" id="emp_nom" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="emp_ape">Apellido del Empleado</label>
                        <input type="text" name="emp_ape" id="emp_ape" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="emp_dpi">DPI del Empleado</label>
                        <input type="number" step="1" min="1111111111111" max="9999999999999" name="emp_dpi" id="emp_dpi" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="emp_edad">Edad del Empleado</label>
                        <input type="number" step="1" min="18" max="65" name="emp_edad" id="emp_edad" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="emp_puesto_cod">Puesto del Empleado</label>
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
                        <label for="emp_sex_cod">Sexo del Empleado</label>
                        <select name="emp_sexo" id="emp_sexo" class="form-control">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="emp_area_cod">Area Asignada</label>
                        <select name="emp_area_cod" id="emp_area_cod" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($areas as $key => $area) : ?>
                            <option value="<?= $area['AREA_COD'] ?>"><?= $area['AREA_DESCR'] ?></option>
                        <?php endforeach ?>
                    </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>