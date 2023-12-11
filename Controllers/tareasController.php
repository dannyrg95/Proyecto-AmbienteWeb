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