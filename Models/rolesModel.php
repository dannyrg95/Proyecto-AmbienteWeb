<?php
    include_once("database.php");

    class RolModel {

        
        public static function Agregar($role, $id) {
            $database = OpenDataBase();
            $stmt = $database->prepare("INSERT INTO Roles(descripcion, id_usuario) VALUES (?, ?)");
            $stmt->bind_param("si", $role, $id);
            $stmt->execute();
            closeDataBase($database);
        }
    
        
        public static function Eliminar($id, $role) {
            $database = OpenDataBase();
            $stmt = $database->prepare("DELETE FROM Roles WHERE id_usuario = ? AND descripcion = ?");
            $stmt->bind_param("is", $id, $role);
            $stmt->execute();
            closeDataBase($database);
        }
               
    
        public static function ObtenerTodos() {
            $database = OpenDataBase();
            $result = $database->query("SELECT * FROM Roles");
            $empleados = $result->fetch_all(MYSQLI_ASSOC);
            closeDataBase($database);
            return $empleados;
        }
        
        public static function Obtener($id) {
            $database = OpenDataBase();
            $stmt = $database->prepare("SELECT * FROM Roles WHERE id_rol = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $empleado = $result->fetch_assoc();
            closeDataBase($database);
            return $empleado;
        }

        public static function ObtenerRolesUsuario($id) {
            $database = OpenDataBase();
            $stmt = $database->prepare("SELECT * FROM Roles WHERE id_usuario = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $empleados = $result->fetch_all(MYSQLI_ASSOC);
            closeDataBase($database);
            return $empleados;
        }
    }
?>