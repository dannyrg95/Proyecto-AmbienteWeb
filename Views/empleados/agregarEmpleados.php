<?php
    include("../../global.php");
    include_once(CONTORLLERS_PATH . "/empleadosController.php");
    include_once(VIEWS_PATH . "/layout.php");
?>
<!DOCTYPE html>
    <html lang="en">
        <?php MostrarHead("Agregar empleados")?>
        <body>
            <?php MostrarHeader()?>

            <form class="form-empleados" action="" method="post">
                <h2>Agregar Empleado</h2>
                <label for="nombre">Nombre: </label>
                <input type="text" id="nombre" name="nombre">


                <label for="apellidos">Apellidos: </label>
                <input type="text" id="apellidos" name="apellidos">

                <label for="correo">Correo Electrónico: </label>
                <input type="email" id="correo" name="correo">
                
                <button type="submit" name="crearEmpleado" >Agregar</button>
            </form>
            
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