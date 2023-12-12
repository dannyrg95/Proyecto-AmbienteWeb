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
        
        public function obtenerTarea () {
            $database = OpenDataBase();
            $result = $database->query("SELECT * FROM Tareas");
            $tareas = $result->fetch_all(MYSQLI_ASSOC);
            closeDataBase($database);
            return $tareas;
        }

}

?>