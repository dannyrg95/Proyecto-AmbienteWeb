<?php
    include_once("../../global.php"); 
    include_once(MODELS_PATH . "/tareasModel.php");
    include_once(VIEWS_PATH . "/layout.php");
?>
<!DOCTYPE html>
    <html lang="en">
        <?php MostrarHead("Inicio")?>
        <body>
            <?php MostrarHeader()?>
            <div class="opciones-tarea">
                <a class="new-tarea" href="<?php  echo ROOT . "/Views/empleados/agregarEmpleados.php"?>">
                    <i class="fa-solid fa-plus"></i>
                    Agregar
                </a> 
            </div>
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