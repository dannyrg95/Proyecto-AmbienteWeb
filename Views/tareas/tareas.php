<?php

include_once("../../global.php"); 
include_once(MODELS_PATH . "/tareasModel.php");

function mostrarTareas() {
    // Crear una instancia del modelo de tareas
    $tareasModel = new TareasModel(); 
    // Obtener todas las tareas
    $Tareas = $tareasModel->obtenerTarea(); 

    // Mostrar las tareas en una lista HTML
    echo '<ul>';
    foreach ($Tareas as $Tareas) {
        echo '<li>' . $Tareas['titulo'] . ' - Horas: ' . $Tareas['horas'] . ' - Empleado: ' . $Tareas['id_empleado'] . '</li>';
    }
    echo '</ul>';
}

?>
<?php
    include_once(VIEWS_PATH . "/layout.php");
?>
<!DOCTYPE html>
    <html lang="en">
        <?php MostrarHead("Inicio")?>
        <body>
            <?php MostrarHeader()?>
            <?php mostrarTareas()?>

        
            
            
            <?php MostrarFooter()?>
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