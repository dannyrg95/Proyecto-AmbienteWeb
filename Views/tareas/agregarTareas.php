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

    <form method="POST" class="tareas-form">
        <a href="<?php echo ROOT . "/Views/tareas/"?>" class="atras">
                    <i class="fa-solid fa-arrow-left"></i>
                    Atrás
        </a>
        <h1>Agregar Tarea</h1>
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>
        <label for="horas">Horas:</label>
        <input type="number" name="horas" required>

        <button>Agregar</button>
    </form>

    <?php MostrarFooter() ?>
</body>
</html>
