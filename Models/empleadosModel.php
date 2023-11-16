<?php
    include_once("database.php");

    class EmpleadoModel {
        public function Agregar($nombre, $correo, $apellidos) {
            $database = OpenDataBase();
            $stmt = $database->prepare("INSERT INTO Empleados(nombre, correo, apellidos, activo) VALUES (?, ?, ?, true)");
            $stmt->bind_param("sss", $nombre, $correo, $apellidos);
            $stmt->execute();
            closeDataBase($database);
        }
    
        public function Eliminar($id) {
            $database = OpenDataBase();
            $stmt = $database->prepare("DELETE FROM Empleados WHERE id_empleado = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            closeDataBase($database);
        }
    
        public function Actualizar($id, $nombre, $correo, $apellidos) {
            $sql = "UPDATE Empleados SET";
            if ($nombre !== null) {
                $sql .= "nombre=?";
            }

            if ($correo !== null) {
                $sql .= ", correo=?";
            }

            if ($apellidos !== null) {
                $sql .= ", apellidos=?";
            }

            $sql .= "WHERE id = ?";

            $paramValues = array_filter([$nombre, $correo, $apellidos], function ($value) {
                return $value !== null;
            });

            $database = OpenDataBase();
            array_unshift($paramValues, str_repeat('s', count($paramValues)));

            call_user_func_array([$stmt, 'bind_param'], $paramValues);
            $stmt->execute();
            closeDataBase($database);
        }
    
        public function ObtenerTodos() {
            $database = OpenDataBase();
            $result = $database->query("SELECT * FROM Empleados");
            $empleados = $result->fetch_all(MYSQLI_ASSOC);
            return $empleados;
        }
    
        public function Obtener($id) {
            $database = OpenDataBase();
            $stmt = $database->prepare("SELECT * FROM Empleados WHERE id_empleado = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $empleado = $result->fetch_assoc();
            closeDataBase($database);
            return $empleado;
        }
    }
?>