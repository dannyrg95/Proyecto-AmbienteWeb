<?php
include_once("../../global.php");
include_once(CONTROLLERS_PATH . "/tareasController.php");
include_once(MODELS_PATH . "/tareasModel.php");

// Obtener el ID de la tarea a modificar
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $taskId = $_GET['id'];
    $tareasModel = new Task($this->connectDB()); // Instancia del modelo

    // Obtener los detalles de la tarea por su ID
    $taskDetails = $tareasModel->getTaskById($taskId);
}

// Si se envía el formulario de modificación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $horas = $_POST['horas'];
    $id_empleado = $_POST['id_empleado'];

    $tareasModel->updateTask($titulo, $horas, $id_empleado);

    // Redirigir después de modificar la tarea
    header('Location: index.php');
    exit();
}
?>

<?php include_once(VIEWS_PATH . "/layout.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php MostrarHead("Modificar Tarea") ?>
</head>
<body>
    <?php MostrarHeader() ?>

    <h1>Modificar Tarea</h1>
    <form action="modificar_tarea.php" method="POST">
        <input type="hidden" name="id_tarea" value="<?php echo $taskDetails['id']; ?>">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?php echo $taskDetails['titulo']; ?>" required><br><br>

        <label for="horas">Horas:</label>
        <input type="number" name="horas" value="<?php echo $taskDetails['horas']; ?>" required><br><br>

        <label for="id_empleado">ID Empleado:</label>
        <input type="number" name="id_empleado" value="<?php echo $taskDetails['id_empleado']; ?>" required><br><br>

        <input type="submit" value="Guardar Cambios">
    </form>

    <?php MostrarFooter() ?>
</body>
</html>
