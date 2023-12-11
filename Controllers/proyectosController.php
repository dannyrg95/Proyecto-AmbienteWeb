<?php
session_start();
include(MODELS_PATH . "/proyectoModel.php");
include(MODELS_PATH . "/empleadosModel.php");
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
            echo '
            <tr>
                <td>' . $proyecto['id_proyecto'] . '</td>
                <td> <a href="' .  ROOT . "/Views/proyectos/proyectosEmpleados.php?id=" . $proyecto['id_proyecto']  . '">' . $proyecto['nombre'] . '</a></td>
                <td>' . $proyecto['fecha_inicio'] . '</td>
                <td>' . $proyecto['fecha_fin'] . '</td>
            </tr>';
        }
    
        echo '</table>';
    }


    public static function obtenerEmpleadosProyectoTemplate($id) {
        $empleados = ProyectoModel::obtenerEmpleadosProyecto($id);
        $proyecto = ProyectoModel::Obtener($id);
        $template = '<div class="proyecto-empleado-info"><h1 class="proyectos-empleado-titulo">' . $proyecto["nombre"] . '</h1>';
        if (empty($empleados)) {
            return $template . '
                <div class="opciones-proyecto">
                    <a href="' . ROOT . "/Views/proyectos/modificarproyecto.php?id_proyecto=" . $id . '" class="modificar-proyecto">Modificar Proyecto</a>
                    <a onclick="deleteProyecto()" class="eliminar-proyecto">Eliminar Proyecto</a>
                </div>
                </div>
                <div class="empty-container">
                    <h1>El proyecto no cuenta con empleados asignados</h1>
                    <a href=""><i class="fa-solid fa-circle-plus"></i></a>
                </div>
            ';
        }
        $template .= '
        <div class="opciones-proyecto">
            <a class="new-empleado">Agregar</a>
            <a href="' . ROOT . "/Views/proyectos/modificarproyecto.php?id_proyecto=" . $id . '" class="modificar-proyecto">Modificar Proyecto</a>
            <a onclick="deleteProyecto()" class="eliminar-proyecto">Eliminar Proyecto</a>
        </div>
        </div>
        <div class="empleados-proyecto">';
        foreach($empleados as $empleado) {
            $template .= '
            <div>
                <h3>' .  $empleado["nombre"] . " " .  $empleado["apellidos"]  . '</h3>
                <p>' .  $empleado["correo"]  . '</p>
                <div class="opciones">
                    <a href="#" onclick="deleteEmpleado(' . $empleado["id_empleado"] . ')" class="delete-empleado-proyecto"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>';
        }

        $template .= '</div>';
        return $template;
    }

    public static function agregarEmpleadosProyectoPopUp() {
        $empleados = EmpleadoModel::ObtenerTodosAgregados($_GET["id"]);
        
        $template = '
        <div class="inner-container-agregar-empleado-proyecto">
            <a class="close-pop-up" href="#"><i class="fa-solid fa-xmark"></i></a>
            <ul class="agregar-empleado-proyecto">
                <li>
                    <h3>Id</h3>
                    <p>Nombre</p>
                </li>';
        foreach($empleados as $empleado) {
            $template .= '
            <li>
                <h3>' . $empleado["id_empleado"] .'</h3>
                <p>' .  $empleado["nombre"] . " " .  $empleado["apellidos"]  .' </p>
                <div class="container-checkbox">
                    <input id="checkbox-agregar-empleado-proyecto' . $empleado["id_empleado"] . '" type="checkbox">
                    <label for="checkbox-agregar-empleado-proyecto' . $empleado["id_empleado"] . '"></label>
                </div>
            </li>';
        }

        $template .= '
        </ul>
        <button  onclick="addEmpleadoEmpty()"><i class="fa-solid fa-plus"></i> Agregar</button>
        </div>';
        return $template;
    }
}

?>