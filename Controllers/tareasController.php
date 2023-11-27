<?php    
    include_once(MODELS_PATH . "/tareasModel.php");

    $tareaModel = new TareaModel();
    if (isset($_POST["crearTarea"])) {
        $nombreTarea = $_POST["nombreTarea"];
        $descripcionTarea = $_POST["descripcionTarea"];
        $fechalimiteTarea = $_POST["fechalimiteTarea"];
        $usuarioTarea = $_POST["usuarioTarea"];
    }