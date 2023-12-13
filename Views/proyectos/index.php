<?php

include_once("../../global.php"); 
include_once(CONTORLLERS_PATH . "/proyectosController.php");
include_once(VIEWS_PATH . "/layout.php");
?>
<!DOCTYPE html>
    <html lang="en">
        <?php MostrarHead("Proyectos")?>
        <body>
            <?php MostrarHeader()?>
            <h1 class="proyectos-titulo">Proyectos</h1>
            <div class="opciones-proyecto-agregar">
            <a href="<?php  echo ROOT . "/Views/proyectos/agregarproyecto.php"?>">
                <i class="fa-solid fa-plus"></i>
                Agregar
            </a>   
        </div>
            <?php ProyectoController::mostrarProyectos()?>
            
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