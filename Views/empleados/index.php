<?php
    include("../../global.php");
    include(VIEWS_PATH . "/layout.php")
 ?>
<!DOCTYPE html>
<html>
    <?php MostrarHead("Empleados")?>
    <body>
        <?php MostrarHeader()?>
        <div class="empleados-container">

        
        </div>
        <!-- <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
            </tr>
        </table> -->
        
       
        
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
