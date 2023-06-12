<?php
require_once 'Conexion.php';

class areas extends Conexion{
    public $area_cod;
    public $area_descr;
    public $area_situacion;


    public function __construct($args = [] )
    {
        $this->area_cod = $args['area_cod'] ?? null;
        $this->area_descr = $args['area_descr'] ?? '';
        $this->area_situacion = $args['area_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO areas(area_descr) values('$this->area_descr')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from areas where area_situacion = 1";

        if($this->area_descr != ''){
            $sql .= " and area_descr like '%$this->area_descr%' ";
        }

        if($this->area_cod != null){
            $sql .= " and area_cod = $this->area_cod ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE areas SET area_descr = '$this->area_descr' where area_cod = $this->area_cod";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE areas SET area_situacion = 0 where area_cod = $this->area_cod";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}