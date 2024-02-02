<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=+, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    
<h1 class="titulo">Calculo de pago empleados</h1>


<section id="todo" class="todo">

<?php
class Vista {
    public function mostrarFormulario() {
        echo "<form method='post' action=''>";
        for ($i = 1; $i <= 5; $i++) {
            echo "Empleado $i Horas trabajadas: <input type='number' name='horas_empleado_$i' required><br>";
        }
        echo "<button type='submit'>Calcular</button>";
        echo "</form>";
    }

    public function mostrarResultados($nomina) {
        echo "<h2>Resultados:</h2>";
        foreach ($nomina->getEmpleados() as $i => $empleado) {
            $horas = $empleado->getHorasTrabajadas();
            $salarioPorHora = $empleado->getSalarioPorHora();
            $salarioTotal = $empleado->calcularSalarioTotal();
            echo "Empleado $i Horas trabajadas: $horas, Pago por hora: $$salarioPorHora, Total Salario: $$salarioTotal<br>";
        }
        $nominaTotal = $nomina->calcularNominaTotal();
        echo "<br>Nómina total a pagar: $$nominaTotal pelucholares";
    }
}

?>
</section>
</body>
</html>