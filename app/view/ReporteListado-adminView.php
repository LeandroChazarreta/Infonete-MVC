{{> header-adm}}

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;">

    <div id="myTop" class="w3-container w3-top w3-theme w3-large">
        <p><i class="fa fa-bars w3-button w3-teal w3-hide-large w3-xlarge" onclick="w3_open()"></i>
            <span id="myIntro" class="w3-hide">W3.CSS: Introduction</span></p>
    </div>

    <header class="w3-container w3-theme" style="padding:64px 32px">
        <h1 class="w3-xxxlarge">Portal Administrativo</h1>
    </header>

    <section style="margin: 30px 50px;">

        <table class="w3-table">
            <tr>
                <th> <h1>Reporte obtenido</h1></th>

                <th class="w3-right"> <a class="w3-btn w3-blue w3-margin" href="administrador/generarPDF">GENERAR PDF</a></th>

            </tr>
        </table>
        <hr style="margin: 0 0 20px 0;">
            <table class="w3-table-all w3-bordered w3-hoverable">
                <tr>
                    <th>Tipo de Publicación</th>
                    <th>Sección</th>
                    <th>Descripción</th>
                </tr>
                {{#Reporte}}
                <tr>
                    <td>{{tipo}}</td>
                    <td>{{seccion}}</td>
                    <td>{{titulo}}</td>
                </tr>
                {{/Reporte}}
            </table>


        <hr>
        <form action="administrador/Reporte" method="post" enctype="application/x-www-form-urlencoded">
            <button class="w3-button w3-blue w3-hover-orange" type="submit">Volver</button>
        </form>

      </section>


</div>

<script>
    // Open and close the sidebar on medium and small screens
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }

    // Change style of top container on scroll
    window.onscroll = function() {myFunction()};
    function myFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("myTop").classList.add("w3-card-4", "w3-animate-opacity");
            document.getElementById("myIntro").classList.add("w3-show-inline-block");
        } else {
            document.getElementById("myIntro").classList.remove("w3-show-inline-block");
            document.getElementById("myTop").classList.remove("w3-card-4", "w3-animate-opacity");
        }
    }

    // Accordions
    function myAccordion(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-theme";
        } else {
            x.className = x.className.replace("w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-theme", "");
        }
    }
</script>

</body>
</html>
