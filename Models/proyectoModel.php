<?php

include_once('database.php');

class ProyectoModel {
    
    public function obtenerProyectos() {
        $sql = "SELECT * FROM Proyectos";
        $result = ExecuteQuery($sql);

        $proyectos = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $proyecto = array(
                    'id_proyecto' => $row['id_proyecto'],
                    'nombre' => $row['nombre'],
                    'fecha_inicio' => $row['fecha_inicio'],
                    'fecha_fin' => $row['fecha_fin']
                );

                $proyectos[] = $proyecto;
            }
        } else {
            echo 'Error al ejecutar la consulta: ' . mysqli_error();
        }

        return $proyectos;
    }
    
    public function obtenerProyectoPorId($id) {
        $sql = "SELECT * FROM Proyectos WHERE id_proyecto = $id";
        $result = ExecuteQuery($sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            $proyecto = array(
                'id_proyecto' => $row['id_proyecto'],
                'nombre' => $row['nombre'],
                'fecha_inicio' => $row['fecha_inicio'],
                'fecha_fin' => $row['fecha_fin']
            );

            return $proyecto;
        } else {
            echo 'Error al ejecutar la consulta: ' . mysqli_error();
            return null;
        }
    }

    public function agregarProyecto($nombre, $fechaInicio, $fechaFin) {
        $sql = "INSERT INTO Proyectos (nombre, fecha_inicio, fecha_fin) VALUES ('$nombre', '$fechaInicio', '$fechaFin')";
        $result = ExecuteQuery($sql);

        if (!$result) {
            echo 'Error al agregar proyecto: ' . mysqli_error();
            return false;
        }

        return true;
    }

    public function agregarEmpleadoProyecto($idEmpleado, $idProyecto) {
        $database = OpenDataBase();
        $stmt = $database->prepare("INSERT INTO Proyectos_Empleados (id_empleado, id_proyecto) VALUES (?, ?)");
        $stmt->bind_param("ii", $idEmpleado, $idProyecto);
        $stmt->execute();
        closeDataBase($database);
    }

    public function modificarProyecto($idProyecto, $nombre, $fechaInicio, $fechaFin) {
        $sql = "UPDATE Proyectos SET nombre='$nombre', fecha_inicio='$fechaInicio', fecha_fin='$fechaFin' WHERE id_proyecto=$idProyecto";
        $result = ExecuteQuery($sql);

        if (!$result) {
            echo 'Error al modificar proyecto: ' . mysqli_error();
            return false;
        }

        return true;
    }

    public static function obtenerEmpleadosProyecto($id) {
        
        $database = OpenDataBase();
            
        $stmt = $database->prepare("SELECT * FROM 
        (SELECT DISTINCT empleados.*, id_tarea FROM Proyectos_Empleados INNER JOIN Empleados ON proyectos_empleados.id_empleado = empleados.id_empleado AND id_proyecto = ?) EmpleadosProyecto
        LEFT JOIN Tareas ON tareas.id_tarea = EmpleadosProyecto.id_tarea;");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $empleados = $result->fetch_all(MYSQLI_ASSOC);
        closeDataBase($database);
        return $empleados;
    }

    public static function deleteEmpleadoProyecto($idEmpleado, $idProyecto) {
        
        $database = OpenDataBase();
            
        $stmt = $database->prepare("DELETE FROM Proyectos_Empleados WHERE id_proyecto = ? AND id_empleado = ?");
        $stmt->bind_param("ii", $idProyecto, $idEmpleado);
        $stmt->execute();
       closeDataBase($database);
     
    }

    public static function Obtener($id) {
        $database = OpenDataBase();
        $stmt = $database->prepare("SELECT * FROM Proyectos WHERE id_proyecto = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $empleado = $result->fetch_assoc();
        closeDataBase($database);
        return $empleado;
    }

    public static function Borrar($id) {
        $database = OpenDataBase();
        $stmt = $database->prepare("DELETE FROM Proyectos WHERE id_proyecto = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        $stmt = $database->prepare("DELETE FROM Proyectos_Empleados WHERE id_proyecto = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        
        closeDataBase($database);
    }

    public static function AsignarTareaEmpleadoProyecto($idProyecto, $idTarea, $idEmpleado) {
        $database = OpenDataBase();
        $stmt = $database->prepare("UPDATE Proyectos_Empleados SET id_tarea = ? WHERE id_proyecto = ? AND id_empleado = ?");
        $stmt->bind_param("iii", $idTarea, $idProyecto, $idEmpleado);
        $stmt->execute();
        
        closeDataBase($database);
    }


    public static function obtenerTareasSinAsignar() {
        $database = OpenDataBase();
        $result = $database->query("SELECT * FROM Tareas WHERE id_tarea NOT IN (SELECT tareas.id_tarea FROM Proyectos_Empleados INNER JOIN Tareas ON tareas.id_tarea = proyectos_empleados.id_tarea)");
        $tareas = $result->fetch_all(MYSQLI_ASSOC);
        closeDataBase($database);
        return $tareas;
    }
    
    public static function horasProyecto() {
        $database = OpenDataBase();
        $result = $database->query("SELECT tareas.horas FROM Proyectos_Empleados  INNER JOIN Tareas ON tareas.id_tarea = proyectos_empleados.id_tarea AND id_proyecto = ?");
        $horas = $result->fetch_all(MYSQLI_ASSOC);
        closeDataBase($database);
        return $horas;

    }
}

?>
