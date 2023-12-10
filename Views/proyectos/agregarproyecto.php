<?php
include_once("../../global.php");
include_once(MODELS_PATH . "/proyectoModel.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar el formulario de agregar proyectos
    if (isset($_POST['nombre']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
        $nombre = $_POST['nombre'];
        $fechaInicio = $_POST['fecha_inicio'];
        $fechaFin = $_POST['fecha_fin'];

        // Validar los datos según tus necesidades antes de insertarlos en la base de datos

        $proyectoModel = new ProyectoModel();
        $proyectoModel->agregarProyecto($nombre, $fechaInicio, $fechaFin);
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<?php
include_once('../../global.php');
include_once(VIEWS_PATH . '/layout.php');
MostrarHead('Agregar Proyecto');
?>

<body class="grid-container">
    <?php
    MostrarHeader();
    ?>

    <main class="main">
        <h1>Agregar Proyecto</h1>

        <form method="post" action="">
            <label for="nombre">Nombre del Proyecto:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="fecha_inicio">Fecha de Inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" required>

            <label for="fecha_fin">Fecha de Fin:</label>
            <input type="date" id="fecha_fin" name="fecha_fin" required>

            <button type="submit">Agregar Proyecto</button>
        </form>
    </main>

    <?php
    MostrarFooter();
    ?>
</body>

</html>