<?php
    include_once("database.php");
    class TareasModel {
        
        public function crearTarea ($titulo, $horas, $id_empleado) {
            $database = OpenDataBase();
            $stmt = $database->prepare("INSERT INTO Tareas(titulo, horas, id_empleado) VALUES (?, ?, ?)");
            
            $stmt->bind_param("sii", $titulo, $horas, $id_empleado);
            $stmt->execute();
            closeDataBase($database);
        }
        
        public static function obtenerTareas() {
            $database = OpenDataBase();
            $result = $database->query("SELECT * FROM Tareas");
            $tareas = $result->fetch_all(MYSQLI_ASSOC);
            closeDataBase($database);
            return $tareas;
        }


        public function eliminarTarea($id) {
            $database = OpenDataBase();
            $stmt = $database->prepare("DELETE FROM Tareas WHERE id_tarea = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            closeDataBase($database);
        }

        // Funcion de editarTarea con su preparacion, contruccion y ejecucion de consulta SQL
        public function editarTarea($id_tarea, $titulo, $horas, $id_empleado) {
            $sql = "UPDATE Tareas SET ";
            $params = array();
            $paramTypes = "";
            if ($titulo !== null) {
            array_push($params, "titulo=?");
            $paramTypes .= "s";
            }
            if ($horas !== null) {
            array_push($params, "horas=?");
            $paramTypes .= "s";
            }
            $sql .= join(", ", $params);
            $sql .= " WHERE id_tarea = ?";
            $paramTypes .= "i";
            $paramValues = array_filter([$titulo, $horas, $id_empleado, $id_tarea], function ($value) {
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

}

?>