<?php

    include_once('../../global.php');
    include_once MODELS_PATH . '/rolesModel.php';
    include_once MODELS_PATH . '/proyectoModel.php';
    session_start();


    ob_start();
    $response  = '';
    $success;

    if (isset($_POST["deleteRole"])) {
        $role = $_POST["role"];
        $idUsuario = $_POST["idUsuario"];
        if (!isset($role)) {
            $response = '{"success": false, "errorMessage": "Rol no encontrado"}';
        }
        RolModel::Eliminar($idUsuario, $role);
        
        
        $response = '{"success": true}';

    }

    if (isset($_POST["addRole"])) {
        $role = $_POST["role"];
        $idUsuario = $_POST["idUsuario"];
        if (!isset($role)) {
            $response = '{"success": false, "errorMessage": "Rol no encontrado"}';
        }

        if (!isset($idUsuario)) {
            $response = '{"success": false, "errorMessage": "Usuario no encontrado"}';
        }
        RolModel::Agregar($role, $idUsuario);
        
        
        $response = '{"success": true}';

    }

    if (isset($_POST["addEmpleado"])) {
        $idsEmpleados = explode(",", $_POST["idsEmpleado"]);
        $idProyecto = $_POST["proyecto"];
        
        if (!isset($idsEmpleados)) {
            $response = '{"success": false, "errorMessage": "Empleados no encontrado"}';
        }

        if (!isset($idProyecto)) {
            $response = '{"success": false, "errorMessage": "Proyecto no encontrado"}';
        }
        foreach ($idsEmpleados as $idEmpleado) {
            ProyectoModel::agregarEmpleadoProyecto($idEmpleado, $idProyecto);
            echo $idEmpleado;
        }
        
        
        $response = '{"success": true}';

    }

    if (isset($_POST["deleteEmpleado"])) {
        $idEmpleado = $_POST["idEmpleado"];
        $idProyecto = $_POST["proyecto"];
        
        if (!isset($idEmpleado)) {
            $response = '{"success": false, "errorMessage": "Empleado no encontrado"}';
        }

        if (!isset($idProyecto)) {
            $response = '{"success": false, "errorMessage": "Proyecto no encontrado"}';
        }
       ProyectoModel::deleteEmpleadoProyecto($idEmpleado, $idProyecto);
        
        
        $response = '{"success": true}';

    }

    if (isset($_POST["deleteProyecto"])) {
        $idProyecto = $_POST["proyecto"];
        

        if (!isset($idProyecto)) {
            $response = '{"success": false, "errorMessage": "Proyecto no encontrado"}';
        }
       ProyectoModel::Borrar($idProyecto);
        
        
        $response = '{"success": true}';

    }

    ob_end_clean();
    echo $response;


?>