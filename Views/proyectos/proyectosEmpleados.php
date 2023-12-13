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

        <div class="pop-up-reporte close">
            <?php echo ProyectoController::agregarReporte()?>
        </div>

        <div class="pop-up-agregar-tarea-empleados-proyecto close">
            <?php echo ProyectoController::agregarTareaEmpleadoPopUp()?>
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

        const closeEmpleados = document.querySelector(".close-pop-up");
        const openEmpleados = document.querySelector(".new-empleado") || document.querySelector(".new-empleado-empty")
        const modalEmpleados = document.querySelector(".pop-up-agregar-empleados-proyecto");

        const modalTareas = document.querySelector(".pop-up-agregar-tarea-empleados-proyecto");
        const closeTareas = document.querySelector(".close-pop-up-tareas");


        const closeReporte = document.querySelector(".close-pop-up-reportes");
        const openReporte = document.querySelector(".reporte-proyecto");
        const modalReporte = document.querySelector(".pop-up-reporte")

        openReporte.addEventListener("click", () => {
            modalReporte.classList.toggle("close");
        })

        closeReporte.addEventListener("click", () => {
            modalReporte.classList.toggle("close");
        })


        closeEmpleados.addEventListener("click", () => {            
            modalEmpleados.classList.toggle("close");
        })

        openEmpleados.addEventListener("click", () => {            
            modalEmpleados.classList.toggle("close");
        })

        closeTareas.addEventListener("click", () => {
            modalTareas.classList.toggle("close");
        })



        function openModalTareas(idEmpleado) {
            modalTareas.classList.toggle("close");
            
            const boton = document.querySelector(".inner-container-agregar-tarea-empleado-proyecto button");
            boton.setAttribute("empleado", idEmpleado);
        }


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

        function addTarea() {
            const tarea = document.querySelector('input[name="id_tarea"]:checked').value;
            const boton = document.querySelector(".inner-container-agregar-tarea-empleado-proyecto button");
        
            $.ajax({
                url: "<?php echo ROOT?>/api/rest/apiRest.php",
                method: "POST",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: "addTarea=1&idTarea=" + encodeURIComponent(tarea) + "&proyecto=" + encodeURIComponent(<?php echo $_GET["id"]?>) + "&empleado=" + encodeURIComponent(boton.getAttribute("empleado"))
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
                data: "deleteEmpleado=1&proyecto=" + encodeURIComponent(<?php echo $_GET["id"]?>) + "&idEmpleado=" + encodeURIComponent(id)
            }).done(function(response) {
                const result = JSON.parse(response);
                
                if (result.success) {
                    location.reload();
                } 
            });
        }

        function deleteProyecto() {
            $.ajax({
                url: "<?php echo ROOT?>/api/rest/apiRest.php",
                method: "POST",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: "deleteProyecto=1&proyecto=" + encodeURIComponent(<?php echo $_GET["id"]?>)
            }).done(function(response) {
                const result = JSON.parse(response);
                
                if (result.success) {
                    location.replace("http://localhost/<?php echo ROOT?>/Views/proyectos/");
                } 
            });
        }

        // function reportesProyecto(id) {
        //     $.ajax({
        //         url: "<?php echo ROOT?>/api/rest/apiRest.php",
        //         method: "POST",
        //         contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        //         data: "proyecto=1&idProyecto=" + encodeURIComponent(id)
        //     }).done(function(response) {
        //         const result = JSON.parse(response);
                
        //         if (result.success) {
        //             location.replace("http://localhost/<?php echo ROOT?>/Views/proyectos/");
        //         } 


        //     });
        // }



    </script>

</html>
