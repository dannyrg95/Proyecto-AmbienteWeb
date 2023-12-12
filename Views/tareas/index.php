<?php
include_once("../../global.php"); 
include_once(CONTROLLERS_PATH . "/tareasController.php");
include_once(VIEWS_PATH . "/layout.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php MostrarHead("Tareas") ?>
</head>
<body>
    <?php MostrarHeader() ?>
    <h1 class="tareas-titulo">Tareas</h1>
    <?php tareasController::mostrarTareas() ?>

    <a href="agregartareas.php">Agregar Tarea</a>
    
    <?php MostrarFooter() ?>
</body>

<script>
    const burger = document.querySelector(".hamburger-menu");
    burger.addEventListener("click", () => {
        if (burger.classList.contains("close")) {
            burger.innerHTML = '<i class="fa-solid fa-xmark"></i>';
        } else {
            burger.innerHTML = '<i class="fa-solid fa-bars"></i>'
        }
        
        burger.classList.toggle("close");
    })
</script>
</html>
