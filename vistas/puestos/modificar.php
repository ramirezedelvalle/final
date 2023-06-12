<?php
require '../../modelos/puestos.php';
    try {
        $puesto = new puestos($_GET);

        $puestos = $puesto->buscar();
        // echo "<pre>";
        // var_dump($puestos[0]['PUE_COD']);
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
        <h1 class="text-center">Modificar Puestos</h1>
        <div class="row justify-content-center">
            <form action="/final/controladores/puestos/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="pue_cod" value="<?= $puestos[0]['PUE_COD'] ?>" >
                <div class="row mb-3">
                    <div class="col">
                        <label for="pue_descr">Descripcion del Puesto</label>
                        <input type="text" name="pue_descr" id="pue_descr" class="form-control" value="<?= $puestos[0]['PUE_DESCR'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="pue_suel">Sueldo por Puesto</label>
                        <input type="number" step="0.01" min="0" name="pue_suel" id="pue_suel" class="form-control" value="<?= $puestos[0]['PUE_SUEL'] ?>">
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