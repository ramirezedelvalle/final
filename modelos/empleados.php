<?php
require_once 'Conexion.php';

class empleados extends Conexion{
    public $emp_cod;
    public $emp_nom;
    public $emp_ape;
    public $emp_dpi;
    public $emp_edad;
    public $emp_puesto_cod;
    public $emp_sexo;
    public $emp_area_cod;
    public $emp_situacion;


    public function __construct($args = [] )
    {
        $this->emp_cod = $args['emp_cod'] ?? null;
        $this->emp_nom = $args['emp_nom'] ?? '';
        $this->emp_ape = $args['emp_ape'] ?? '';
        $this->emp_dpi = $args['emp_dpi'] ?? '';
        $this->emp_edad = $args['emp_edad'] ?? '';
        $this->emp_puesto_cod = $args['emp_puesto_cod'] ?? '';
        $this->emp_sexo = $args['emp_sexo'] ?? '';
        $this->emp_area_cod = $args['emp_area_cod'] ?? '';
        $this->emp_situacion = $args['emp_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO empleados(emp_nom, emp_ape, emp_dpi, emp_edad, emp_puesto_cod, emp_sexo, emp_area_cod)
        values('$this->emp_nom', '$this->emp_ape', '$this->emp_dpi', '$this->emp_edad', '$this->emp_puesto_cod', '$this->emp_sexo', '$this->emp_area_cod')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from empleados where emp_situacion = 1";

        if($this->emp_nom != ''){
            $sql .= " and emp_nom like '%$this->emp_nom%' ";
        }

        if($this->emp_ape != ''){
            $sql .= " and emp_ape like '%$this->emp_ape%' ";
        }

        if($this->emp_dpi != ''){
            $sql .= " and emp_dpi = $this->emp_dpi ";
        }

        if($this->emp_edad != ''){
            $sql .= " and emp_edad = $this->emp_edad ";
        }

        if($this->emp_puesto_cod != ''){
            $sql .= " and emp_puesto_cod = $this->emp_puesto_cod ";
        }

        if($this->emp_sexo != ''){
            $sql .= " and emp_sexo = $this->emp_sexo ";
        }

        if($this->emp_area_cod != ''){
            $sql .= " and emp_area_cod = $this->emp_area_cod ";
        }

        if($this->emp_cod != null){
            $sql .= " and emp_cod = $this->emp_cod ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function registro(){
        $sql = "SELECT e.emp_cod, e.emp_nom, e.emp_ape, e.emp_dpi, p.pue_descr, e.emp_edad, a.area_descr,  e.emp_sexo, p.pue_suel
        FROM empleados e
        JOIN puestos p ON e.emp_puesto_cod = p.pue_cod
        JOIN areas a ON e.emp_area_cod = a.area_cod";
        ;

        if($this->emp_nom != ''){
            $sql .= " and emp_nom like '%$this->emp_nom%' ";
        }

        if($this->emp_ape != ''){
            $sql .= " and emp_ape like '%$this->emp_ape%' ";
        }

        if($this->emp_dpi != ''){
            $sql .= " and emp_dpi = $this->emp_dpi ";
        }
      
        if($this->emp_puesto_cod != ''){
            $sql .= " and emp_puesto_cod = $this->emp_puesto_cod ";
        }

        if($this->emp_edad != ''){
            $sql .= " and emp_edad = $this->emp_edad ";
        }

        if($this->emp_sexo != ''){
            $sql .= " and emp_sexo = $this->emp_sexo ";
        }
        if($this->emp_area_cod != ''){
            $sql .= " and emp_area_cod = $this->emp_area_cod ";
        }

        if($this->emp_cod != null){
            $sql .= " and emp_cod = $this->emp_cod ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE empleados SET emp_nom = '$this->emp_nom', emp_ape = '$this->emp_ape', emp_dpi = $this->emp_dpi, emp_edad = $this->emp_edad, emp_puesto_cod = $this->emp_puesto_cod, emp_sexo = $this->emp_sexo, emp_area_cod = $this->emp_area_cod  where emp_cod = $this->emp_cod";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE empleados SET emp_situacion = 0 where emp_cod = $this->emp_cod";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}