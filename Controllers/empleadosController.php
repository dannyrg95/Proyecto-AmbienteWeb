<?php    
    include_once(MODELS_PATH . "/empleadosModel.php");

    $empleadoModel = new EmpleadoModel();
    if (isset($_POST["crearEmpleado"])) {
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $apellidos = $_POST["apellidos"];
        $empleadoModel->Agregar($nombre, $correo, $apellidos);
    }

    function ObtenerTodos() {
        
    }


?>
