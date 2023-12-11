<?php

include_once("../../global.php"); 
include_once(CONTORLLERS_PATH . "/proyectosController.php");
include_once(VIEWS_PATH . "/layout.php");
?>
<!DOCTYPE html>
<html>
    <?php MostrarHead("Proyectos")?>
    <body>
        <?php MostrarHeader()?>
        <div class="pop-up-agregar-empleados-proyecto close">
            <?php echo ProyectoController::agregarEmpleadosProyectoPopUp()?>
        </div>

        <?php echo ProyectoController::obtenerEmpleadosProyectoTemplate($_GET["id"])?>
        
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

        const close = document.querySelector(".close-pop-up");
        const open = document.querySelector(".new-empleado") || document.querySelector(".new-empleado-empty")
        const model = document.querySelector(".pop-up-agregar-empleados-proyecto");
        close.addEventListener("click", () => {            
            model.classList.toggle("close");
        })

        open.addEventListener("click", () => {            
            model.classList.toggle("close");
        })


        function addEmpleadoEmpty() {
            const [first, ...empleados] = Array.from(document.querySelector(".agregar-empleado-proyecto").children);
            

            const checkValues = empleados.flatMap(empleado => empleado.children[2].children[0].checked ? parseInt(empleado.children[0].innerText) : []);
        
            $.ajax({
                url: "<?php echo ROOT?>/api/rest/apiRest.php",
                method: "POST",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: "addEmpleado=1&idsEmpleado=" + encodeURIComponent(checkValues) + "&proyecto=" + encodeURIComponent(<?php echo $_GET["id"]?>)
            }).done(function(response) {
                const result = JSON.parse(response);
                
                if (result.success) {
                    location.reload();
                } 
            });
        }

        function deleteEmpleado(id) {
            $.ajax({
                url: "<?php echo ROOT?>/api/rest/apiRest.php",
                method: "POST",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: "deleteEmpleado=1&idEmpleado=" + encodeURIComponent(id) + "&proyecto=" + encodeURIComponent(<?php echo $_GET["id"]?>)
            }).done(function(response) {
                const result = JSON.parse(response);
                
                if (result.success) {
                    location.reload();
                } 
            });
        }
    </script>

</html>
