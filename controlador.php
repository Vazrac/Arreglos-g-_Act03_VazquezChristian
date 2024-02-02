<?php
require_once 'modelo.php';
require_once 'vista.php';

class Controlador {
    private $vista;
    public function __construct($vista) {
        $this->vista = $vista;
    }
    public function calcularNomina($horasTrabajadas) {
        $empleados = array();
        foreach ($horasTrabajadas as $horas) {
            if ($horas < 30) {
                $salarioPorHora = 120;
            } else {
                $salarioPorHora = 200;
            }
            $empleado = new Empleado($horas, $salarioPorHora);
            $empleados[] = $empleado;
        }
        $nomina = new Nomina($empleados);
        $this->vista->mostrarResultados($nomina);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $horasTrabajadas = array();
    for ($i = 1; $i <= 5; $i++) {
        $inputName = "horas_empleado_$i";
        $horasTrabajadas[] = isset($_POST[$inputName]) ? (int)$_POST[$inputName] : 0;
    }
    $vista = new Vista();
    $controlador = new Controlador($vista);
    $controlador->calcularNomina($horasTrabajadas);
} else {
    $vista = new Vista();
    $vista->mostrarFormulario();
}
?>
