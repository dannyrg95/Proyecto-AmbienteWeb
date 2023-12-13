<?php
    include("../../global.php");
    include(VIEWS_PATH . "/layout.php");
    include(CONTORLLERS_PATH . "/empleadosController.php");
 ?>
<!DOCTYPE html>
<html>
    <?php MostrarHead("Empleados")?>
    <body>
        <?php MostrarHeader()?>
        <h1 class="empleados-titulo">Empleados</h1>
        <div class="opciones-empleado">
            <a href="<?php  echo ROOT . "/Views/empleados/agregarEmpleados.php"?>">
                <i class="fa-solid fa-plus"></i>
                Agregar
            </a>   
        </div>

        <div class="empleados-container">
            <?php  ObtenerTodos()?>
        </div>
        
       
        
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
