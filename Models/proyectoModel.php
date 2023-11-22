<?php

include_once('database.php');
include_once("../global"); include_once(MODELS_PATH . "/proyectoModel.php");

class ProyectoModel {
    
    public function obtenerProyectos() {
        $sql = "SELECT * FROM Proyectos";
        $result = ExecuteQuery($sql);

        $proyectos = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $proyecto = array(
                    'id_proyecto' => $row['id_proyecto'],
                    'nombre' => $row['nombre'],
                    'fecha_inicio' => $row['fecha_inicio'],
                    'fecha_fin' => $row['fecha_fin']
                );

                $proyectos[] = $proyecto;
            }
        } else {
            echo 'Error al ejecutar la consulta: ' . mysqli_error();
        }

        return $proyectos;
    }

    // Puedes agregar más funciones aquí según tus necesidades (crear, editar, borrar proyectos, etc.).
}

?>