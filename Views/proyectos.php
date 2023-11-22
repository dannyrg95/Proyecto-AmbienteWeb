<?php

include_once("../global"); include_once(MODELS_PATH . "/proyectoModel.php");

function mostrarProyectos() {
    $proyectoModel = new ProyectoModel();
    $proyectos = $proyectoModel->obtenerProyectos();

    echo '<table border="1">';
    echo '<tr><th>ID Proyecto</th><th>Nombre</th><th>Fecha Inicio</th><th>Fecha Fin</th></tr>';

    foreach ($proyectos as $proyecto) {
        echo '<tr>';
        echo '<td>' . $proyecto['id_proyecto'] . '</td>';
        echo '<td>' . $proyecto['nombre'] . '</td>';
        echo '<td>' . $proyecto['fecha_inicio'] . '</td>';
        echo '<td>' . $proyecto['fecha_fin'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
}

// Resto del código...
?>