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
            $sql = "UPDATE Empleados SET ";
            $params = array();
            $paramTypes = "";
            
            if ($nombre !== null) {
                array_push($params, "nombre=?");
                $paramTypes .= "s";
            }
            
            if ($correo !== null) {
                array_push($params, "correo=?");
                $paramTypes .= "s";
            }
            
            if ($apellidos !== null) {
                array_push($params, "apellidos=?");
                $paramTypes .= "s";
            }
        
            $sql .= join(", ", $params);
            $sql .= " WHERE id_empleado = ?";
            $paramTypes .= "i"; 
        
            $paramValues = array_filter([$nombre, $correo, $apellidos, $id], function ($value) {
                return $value !== null;
            });
        
            $database = OpenDataBase();
            $stmt = $database->prepare($sql);
            if (!$stmt) {
                die('Error en la preparación de la consulta: ' . $database->error);
            }
        
    
            array_unshift($paramValues, $paramTypes);            
            $stmt->bind_param(...$paramValues);    
            $stmt->execute();

            if ($stmt->error) {
                die('Error en la ejecución de la consulta: ' . $stmt->error);
            }
        
            
            $stmt->close();
            closeDataBase($database);
        }
    
        public static function ObtenerTodos() {
            $database = OpenDataBase();
            $result = $database->query("SELECT * FROM Empleados");
            $empleados = $result->fetch_all(MYSQLI_ASSOC);
            closeDataBase($database);
            return $empleados;
        }

        public static function ObtenerTodosAgregados($idProyecto) {
            $database = OpenDataBase();
            $stmt = $database->prepare("SELECT * FROM Empleados 
                WHERE id_empleado NOT IN 
                (SELECT DISTINCT empleados.id_empleado FROM Proyectos_Empleados INNER JOIN Empleados ON proyectos_empleados.id_empleado = empleados.id_empleado AND id_proyecto = ?);");
            $stmt->bind_param("i", $idProyecto);
            $stmt->execute();
            $result = $stmt->get_result();
            $empleados = $result->fetch_all(MYSQLI_ASSOC);
            closeDataBase($database);
            return $empleados;
        }
    
        public static function Obtener($id) {
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