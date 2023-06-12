<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Formulario de Puestos</h1>
        <div class="row justify-content-center">
            <form action="/final/controladores/puestos/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="pue_descr">Descripcion del Puesto</label>
                        <input type="text" name="pue_descr" id="pue_descr" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="pue_suel">Sueldo por Puesto</label>
                        <input type="number" step="0.01" min="0" name="pue_suel" id="pue_suel" class="form-control">
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