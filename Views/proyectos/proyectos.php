<?php

include_once("../../global.php"); 
include_once(MODELS_PATH . "/proyectoModel.php");

function mostrarProyectos() {
    $proyectoModel = new ProyectoModel();
    $proyectos = $proyectoModel->obtenerProyectos();

    echo '<table border="1">';
    echo '<tr><th>ID Proyecto</th><th>Nombre</th><th>Fecha Inicio</th><th>Fecha Fin</th></tr>';

    foreach ($proyectos as $proyecto) {
        echo '<tr>';
        echo '<td>' . $proyecto['id_proyecto'] . '</td>';
        echo '<td>' . $proyecto['nombre'] . '</td>';
        echo '<td>' . $proyecto['fecha_inicio'] . '</td>';
        echo '<td>' . $proyecto['fecha_fin'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
}

// Resto del código...
?>
<?php
    include_once(VIEWS_PATH . "/layout.php");
?>
<!DOCTYPE html>
    <html lang="en">
        <?php MostrarHead("Inicio")?>
        <body>
            <?php MostrarHeader()?>
            <?php mostrarProyectos()?>

        
            
            
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