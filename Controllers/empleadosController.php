<?php    
    include_once(MODELS_PATH . "/empleadosModel.php");
    
    $empleadoModel = new EmpleadoModel();
    if (isset($_POST["crearEmpleado"])) {
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $apellidos = $_POST["apellidos"];
        $empleadoModel->Agregar($nombre, $correo, $apellidos);
    }
    
    if (isset($_GET["eliminar"])) {
        $id = $_GET["eliminar"];
        $empleadoModel->Eliminar($id);
        header("Location: " . ROOT . "/Views/empleados");
    }
    if (isset($_POST["actualizarEmpleado"])) {
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $apellidos = $_POST["apellidos"];
        $id = $_GET["actualizar"];
        $empleadoModel->Actualizar($id, $nombre, $correo, $apellidos); 
        header("Location: " . ROOT . "/Views/empleados");
    }



    function Actualizar() {
        global $empleadoModel;

        if (isset($_GET["actualizar"])) {
            $id = $_GET["actualizar"];
            $_POST["id"] = $id;
            return $empleadoModel->Obtener($id);
        }
    }

    function ObtenerTodos() {
        global $empleadoModel;
        $empleados = $empleadoModel->ObtenerTodos();
        
        for ($i = 0; $i < count($empleados); $i++) {
            echo '
            <div class="empleado">
                <h3>Nombre: ' . $empleados[$i]["nombre"] . " " . $empleados[$i]["apellidos"] . '</h3>
                <p>Correo: ' . $empleados[$i]["correo"] . '</p>
                <div class="opciones">
                    <a href="' . ROOT . "/Views/empleados?eliminar=" . $empleados[$i]["id_empleado"]  . '" class="delete-empleado">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                    <a href="' . ROOT . "/Views/empleados/agregarEmpleados.php?actualizar=" . $empleados[$i]["id_empleado"]  . '" class="edit-empleado">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
            </div>';
        }
    }


?>
