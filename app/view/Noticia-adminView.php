{{> header-adm}}

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;">

    <div id="myTop" class="w3-container w3-top w3-theme w3-large">
        <p><i class="fa fa-bars w3-button w3-blue w3-hide-large w3-xlarge" onclick="w3_open()"></i>
            <span id="myIntro" class="w3-hide">Portal Administrativo</span></p>
    </div>

    <header class="w3-container w3-theme" style="padding:64px 32px">
        <h1 class="w3-xxxlarge">Portal Administrativo</h1>
    </header>

        <section style="margin: 30px 50px;">
            <h1>Noticias</h1>

            <table class="w3-table-all w3-bordered w3-hoverable">
                <tr class="w3-large">
                    <th>Título</th>
                    <th>Bajada</th>
                    <th>Sección</th>
                    <th>Fecha</th>
                    <th>Autor</th>
                    <th class="w3-center">Autorizada</th>
                    <th class="w3-center">Acción</th>
                    </tr>
                {{#Noticias}}
                <tr>
                    <td>{{titulo}}</td>
                    <td>{{bajada}}</td>
                    <td>{{descripcion}}</td>
                    <td>{{fecha}}</td>
                    <td>{{nombre}} {{apellido}}</td>

                    <td class="w3-center">
                        {{#autorizada}}
                        Si
                        {{/autorizada}}
                        {{^autorizada}}
                        No
                        {{/autorizada}}
                    </td>

                    <td class="w3-center">
                        {{#autorizada}}
                        <a class="w3-btn w3-red" href="administrador/validarDesAutorizacion?id_publicacion={{id_publicacion}}&autorizada={{autorizada}}"> Desautorizar</a>
                        {{/autorizada}}
                        {{^autorizada}}
                            <a class="w3-btn w3-green" href="administrador/validarAutorizacion?id_publicacion={{id_publicacion}}&autorizada={{autorizada}}"> Autorizar</a>
                        {{/autorizada}}
                       </td>
                    </td>
                </tr>

                {{/Noticias}}
            </table>

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