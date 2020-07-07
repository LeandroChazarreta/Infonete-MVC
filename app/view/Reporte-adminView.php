{{> header-adm}}

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;">

    <div id="myTop" class="w3-container w3-top w3-theme w3-large">
        <p><i class="fa fa-bars w3-button w3-teal w3-hide-large w3-xlarge" onclick="w3_open()"></i>
            <span id="myIntro" class="w3-hide">W3.CSS: Introduction</span></p>
    </div>

    <header class="w3-container w3-theme" style="padding:64px 32px">
        <h1 class="w3-xxxlarge">InfoNete - Portal Administrativo</h1>
    </header>
    <section>

       <form action="./administrador/ListadoReporte" method="post" class="formlogin">

                <div class="container w3-col">

                    <h1><b>Generar Reportes</b></h1>
                    <p>Seleccione criterios para armar el reporte</p>
                    <hr>
                    <div>
                        <h4 for="tipoPublicacion"><b>Tipo de Publicacion</b></h4>
                        <select name="tipoPublicacion" id="tipoPublicacion">
                            {{#tipoPublicacion}}
                            <option value="{{id_tipo_publicacion}}">{{descripcion}}</option>
                            {{/tipoPublicacion}}
                        </select>
                   </div>
                    <div>
                        <h4 for="seccion"><b>Sección</b></h4>
                        <select name="seccion" id="seccion">
                            {{#secciones}}
                            <option value="{{id_seccion}}">{{descripcion}}</option>
                            {{/secciones}}
                        </select>
                    </div>
                    <br>
                     <div>
                     <button type="submit" class="registerbtn">Generar Reporte</button>
                     </div>
                    <hr>
       </form>
    </section>


        <h1>Resultado de la consulta</h1>

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
