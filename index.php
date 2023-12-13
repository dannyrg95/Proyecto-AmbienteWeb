<?php
    include_once("global.php");
    include_once(VIEWS_PATH . "/layout.php");
    session_start();
?>
<!DOCTYPE html>
    <html lang="en">
        <?php MostrarHead("Inicio")?>
        <body>
            <?php MostrarHeader()?>
            <div class="info-integrantes">
                <h1>Grupo 6 Ambiente Web Cliente/Servidor</h1>
                <ul>
                    <li>Joel García Rojas</li>
                    <li>Berlín Cordero Brenes</li>
                    <li>Carlos Calderón Leiva</li>
                    <li>Adrián Campos Montealegre</li>
                    <li>Diego Piedra Mena</li>
                    <li>Danny Rojas García</li>
                </ul>
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