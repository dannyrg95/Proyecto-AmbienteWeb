<?php
    include("../../global.php");
    include_once(VIEWS_PATH . "/layout.php");
    include_once(CONTORLLERS_PATH . "/usuariosController.php");
?>
<!DOCTYPE html>
<html>
    <?php MostrarHead("Usuarios")?>
    <body>
        <?php MostrarHeader()?>
        <h1 class="usuarios-titulo">Usuarios</h1>

        <div class="usuarios-container">
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
