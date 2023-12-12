<?php
include_once("../../global.php");
include_once(MODELS_PATH . "/tareasModel.php");

// Manejar la adición de una nueva tarea
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Crear una instancia del modelo de tareas
    $tareasModel = new Tarea($this->connectDB()); 
    
    // Obtener los datos del formulario
    $titulo = $_POST['titulo'];
    $horas = $_POST['horas'];
    $id_empleado = $_POST['id_empleado'];

    // Agregar la tarea utilizando el modelo
    $tareasModel->agregarTareas($titulo, $horas, $id_empleado);

    // Redireccionar a la página principal después de agregar la tarea
    header('Location: index.php');
    exit();
}
?>

<?php include_once(VIEWS_PATH . "/layout.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php MostrarHead("Agregar Tarea") ?>
</head>
<body>
    <?php MostrarHeader() ?>

    <h1>Agregar Tarea</h1>
    <form action="agregar_tarea.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br><br>

        <label for="horas">Horas:</label>
        <input type="number" name="horas" required><br><br>

        <label for="id_empleado">ID Empleado:</label>
        <input type="number" name="id_empleado" required><br><br>

        <input type="submit" value="Agregar Tarea">
    </form>

    <?php MostrarFooter() ?>
</body>
</html>
