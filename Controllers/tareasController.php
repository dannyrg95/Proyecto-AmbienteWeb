<?php    
    include_once(MODELS_PATH . "/tareasModel.php");

    //Metodo para agregar una nueva tarea
    $tareaModel = new TareaModel();
    if (isset($_POST["crearTarea"])) {
        $tituloTarea = $_POST["tituloTarea"];
        $horasTarea = $_POST["horasTarea"];
        $id_empleadoTarea = $_POST["id_empleadoTarea"];
        $tareaModel->Agregar($titulo, $horas, $id_empleado);
        header('Location: tareas.php');
    }

    if (isset($_GET["eliminar"])) {
        $id_tarea = $_GET["eliminar"];
        TareaModel::Eliminar($id);
        header("Location: " . ROOT . "/Views/tareas");
        }
        if (isset($_POST["actualizarTarea"])) {
        $titulo = $_POST["titulo"];
        $horas = $_POST["horas"];
        $id_tarea = $_GET["actualizar"];
        TareaModel::Actualizar($id_tarea, $titulo, $horas);
        header("Location: " . ROOT . "/Views/tareas");
        }
        function Actualizar() {
        if (isset($_GET["actualizar"])) {
        $id = $_GET["actualizar"];
        $_POST["id_tarea"] = $id_tarea;
        return TareaModel::Obtener($id_tarea);
        }
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
                        <a href="' . ROOT . "/Views/tareas?eliminar=" . $tarea["id_tarea"]  . '" class="delete-empleado">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        <a href="' . ROOT . "/Views/tareas/agregartareas.php?actualizar=" . $tarea["id_tarea"]  . '" class="edit-empleado">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
            </div>';
        }
        echo '</div>';
    }

