<?php

    include_once("database.php");

    class TareasModel {
        //Toma los parametros para la nueva tarea y prepara una nueva fila en la tabla Tareas
        public function crearTarea ($titulo, $horas, $id_empleado) {
            $database = OpenDataBase();
            $stmt = $database->prepare("INSERT INTO Tareas(titulo, horas, id_empleado) VALUES (?, ?, ?)");
            // Asocia los valores a los marcadores de posicion en la consulta preparada y luego ejecuta la consulta.
            $stmt->bind_param("sii", $titulo, $horas, $id_empleado);
            $stmt->execute();
            closeDataBase($database);
        }
        //Devuelve las tareas que se encuentran en dicha tabla.
        public function obtenerTarea () {
            $database = OpenDataBase();
            $stmt = "SELECT * FROM Tareas";
            $result = $this->db->query($query);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

}

?>