<?php
include_once("../../global.php");
include_once(MODELS_PATH . "/proyectoModel.php");

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí puedes agregar la lógica para procesar el formulario de modificación
    // Puedes acceder a los datos del formulario mediante $_POST
    // Ejemplo:
    $proyectoModel = new ProyectoModel();
    $proyectoId = $_POST['proyecto_id'];
    $nuevosDatos = array(
        'nombre' => $_POST['nombre'],
        'fecha_inicio' => $_POST['fecha_inicio'],
        'fecha_fin' => $_POST['fecha_fin']
    );
    $proyectoModel->modificarProyecto($proyectoId, $nuevosDatos);

    // Redirecciona a la página de proyectos después de la modificación
    header("Location: proyectos_vista.php");
    exit();
} else {
    // Si no se ha enviado el formulario, muestra el formulario de modificación
    mostrarFormularioModificacion();
}

function mostrarFormularioModificacion() {
    // Verifica si se ha proporcionado un ID de proyecto válido en la URL
    if (isset($_GET['id_proyecto']) && is_numeric($_GET['id_proyecto'])) {
        $proyectoModel = new ProyectoModel();
        $proyectoId = $_GET['id_proyecto'];
        $proyecto = $proyectoModel->obtenerProyectoPorId($proyectoId);

        if ($proyecto) {
            // Muestra el formulario de modificación con los datos del proyecto
            ?>
            <!DOCTYPE html>
            <html lang="es">

            <?php
            include_once('../../global.php');
            include_once(VIEWS_PATH . '/layout.php');
            MostrarHead('Modificar Proyecto');
            ?>

            <body class="grid-container">
                <?php
                MostrarHeader();
                ?>
                
                <form class="proyectos-agregar-form" action="modificarproyectos.php" method="post">
                    <a href="<?php echo ROOT . "/Views/proyectos/proyectosEmpleados.php" . "?id=" . $_GET["id_proyecto"] ?>" class="atras">
                        <i class="fa-solid fa-arrow-left"></i>
                        Atrás
                    </a>
                    <h1 class="modificar-proyecto-titulo">Modificar Proyecto</h1>
                    <input type="hidden" name="proyecto_id" value="<?php echo $proyecto['id_proyecto']; ?>">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $proyecto['nombre']; ?>" required>

                    <label for="fecha_inicio">Fecha Inicio:</label>
                    <input type="date" name="fecha_inicio" value="<?php echo $proyecto['fecha_inicio']; ?>" required>

                    <label for="fecha_fin">Fecha Fin:</label>
                    <input type="date" name="fecha_fin" value="<?php echo $proyecto['fecha_fin']; ?>" required>

                    <button type="submit">Guardar Cambios</button>
                </form>

                <?php
                MostrarFooter();
                ?>
            </body>

            </html>
            <?php
        } else {
            echo 'ID de proyecto no válido.';
        }
    } else {
        echo 'ID de proyecto no proporcionado.';
    }
}
?>