<?php
    include_once("Views/layout.php");
?>
<!DOCTYPE html>
    <html lang="en">
        <?php
            MostrarHead("Inicio");
        ?>
        <body>
            <?php
                MostrarHeader();
            ?>
            
            
            <?php
                Footer();
                ?>
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