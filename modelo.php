<?php

class Empleado {
    private $horasTrabajadas;
    private $salarioPorHora;

    public function __construct($horasTrabajadas, $salarioPorHora) {
        $this->horasTrabajadas = $horasTrabajadas;
        $this->salarioPorHora = $salarioPorHora;
    }

    public function calcularSalarioTotal() {
        return $this->horasTrabajadas * $this->salarioPorHora;
    }

    public function getHorasTrabajadas() {
        return $this->horasTrabajadas;
    }

    public function getSalarioPorHora() {
        return $this->salarioPorHora;
    }
}

class Nomina {
    private $empleados;

    public function __construct($empleados) {
        $this->empleados = $empleados;
    }

    public function calcularNominaTotal() {
        $nominaTotal = 0;
        foreach ($this->empleados as $empleado) {
            $nominaTotal += $empleado->calcularSalarioTotal();
        }
        return $nominaTotal;
    }

    public function getEmpleados() {
        return $this->empleados;
    }
}

?>
