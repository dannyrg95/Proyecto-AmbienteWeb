<?php
session_start();
include(MODELS_PATH . "/proyectoModel.php");
class ProyectoController {

    public function getProyecto($proyectoId) {
        // Aquí puedes implementar la lógica para obtener y mostrar la información del proyecto con el ID proporcionado
        // Puedes utilizar esta función para cargar una página de detalles del proyecto o devolver datos JSON, por ejemplo.
        // Ejemplo:
        $proyecto = $this->obtenerProyectoPorId($proyectoId);
        echo json_encode($proyecto);
    }

    public function crearProyecto($datosProyecto) {
        // Aquí puedes implementar la lógica para crear un nuevo proyecto con los datos proporcionados
        // Puedes utilizar esta función después de enviar un formulario de creación de proyectos, por ejemplo.
        // Ejemplo:
        $nuevoProyectoId = $this->insertarProyectoEnBaseDeDatos($datosProyecto);
        echo "Proyecto creado con éxito. ID: $nuevoProyectoId";
    }

    public function editarProyecto($proyectoId, $nuevosDatos) {
        // Aquí puedes implementar la lógica para editar un proyecto existente con los nuevos datos proporcionados
        // Puedes utilizar esta función después de enviar un formulario de edición de proyectos, por ejemplo.
        // Ejemplo:
        $this->actualizarProyectoEnBaseDeDatos($proyectoId, $nuevosDatos);
        echo "Proyecto actualizado con éxito. ID: $proyectoId";
    }

    public function borrarProyecto($proyectoId) {
        // Aquí puedes implementar la lógica para borrar un proyecto con el ID proporcionado
        // Puedes utilizar esta función después de confirmar la eliminación desde la interfaz de usuario, por ejemplo.
        // Ejemplo:
        $this->eliminarProyectoDeBaseDeDatos($proyectoId);
        echo "Proyecto eliminado con éxito. ID: $proyectoId";
    }

    // Métodos auxiliares (simulados para el ejemplo)

    private function obtenerProyectoPorId($proyectoId) {
        // Aquí deberías implementar la lógica para obtener datos del proyecto desde tu base de datos
        // Este es solo un ejemplo simulado
        return array('id' => $proyectoId, 'nombre' => 'Proyecto de ejemplo', 'descripcion' => 'Descripción del proyecto.');
    }

    static function mostrarProyectos() {
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
}

?>