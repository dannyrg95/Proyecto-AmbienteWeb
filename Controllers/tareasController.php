<?php    
    include_once(MODELS_PATH . "/tareasModel.php");
    session_start();

    //Metodo para agregar una nueva tarea
    $tareaModel = new TareasModel();
    if (isset($_POST["crearTarea"])) {
        $tituloTarea = $_POST["tituloTarea"];
        $horasTarea = $_POST["horasTarea"];
        $id_empleadoTarea = $_POST["id_empleadoTarea"];
        $tareaModel->Agregar($titulo, $horas, $id_empleado);
        header('Location: tareas.php');
    }

    function mostrarTareas() {
    
        $tareasModel = new TareasModel(); 
        
        $tareas = $tareasModel->obtenerTarea(); 
    
        
        echo '<div class="tareas-container">';
        foreach ($tareas as $tarea) {
            echo '<div class="tarea">
                <h3>Titulo: ' . $tarea["titulo"]  . '</h3>
                <p>Horas: ' . $tarea["horas"] . '</p>
                <div class="opciones">
                        <a href="' . ROOT . "/Views/empleados?eliminar=" . $tarea["id_tarea"]  . '" class="delete-empleado">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        <a href="' . ROOT . "/Views/empleados/agregarEmpleados.php?actualizar=" . $tarea["id_tarea"]  . '" class="edit-empleado">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
            </div>';
        }
        echo '</div>';
    }

