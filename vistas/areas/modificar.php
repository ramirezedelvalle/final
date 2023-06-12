<?php
require '../../modelos/areas.php';
    try {
        $areas = new areas($_GET);

        $areas = $areas->buscar();
        // echo "<pre>";
        // var_dump($areas[0]['AREA_COD']);
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
        <h1 class="text-center">Modificar Areas</h1>
        <div class="row justify-content-center">
            <form action="/final/controladores/areas/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="area_cod" value="<?= $areas[0]['AREA_COD'] ?>" >
                <div class="row mb-3">
                    <div class="col">
                        <label for="area_descr">Descripcion del Area</label>
                        <input type="text" name="area_descr" id="area_descr" class="form-control" value="<?= $areas[0]['AREA_DESCR'] ?>">
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