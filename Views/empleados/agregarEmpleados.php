<?php
    include("../../global.php");
    include_once(CONTORLLERS_PATH . "/empleadosController.php");
    include_once(VIEWS_PATH . "/layout.php");
    $empleado = Actualizar() ?? array("nombre" => "", "apellidos" => "", "correo" => "", "id" => -1);

?>
<!DOCTYPE html>
    <html lang="en">
        <?php MostrarHead("Agregar empleados")?>
        <body>
            <?php MostrarHeader()?>
            <form class="form-empleados" action="" method="post">
                <a href="<?php echo ROOT . "/Views/empleados/"?>" class="atras">
                    <i class="fa-solid fa-arrow-left"></i>
                    Atrás
                </a>
                <h2><?php echo isset($_GET["actualizar"]) ? "Actualizar" : "Agregar"?> Empleado</h2>
                <label for="nombre">Nombre: </label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $empleado["nombre"]?>">


                <label for="apellidos">Apellidos: </label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $empleado["apellidos"]?>">

                <label for="correo">Correo Electrónico: </label>
                <input type="email" id="correo" name="correo" value="<?php echo $empleado["correo"]?>">
                
                <button type="submit" name="<?php echo isset($_GET["actualizar"]) ? "actualizarEmpleado" : "crearEmpleado"?>" ><?php echo isset($_GET["actualizar"]) ? "Actualizar" : "Agregar"?></button>
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