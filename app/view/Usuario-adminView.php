{{> header-adm}}

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;">

    <div id="myTop" class="w3-container w3-top w3-theme w3-large">
        <p><i class="fa fa-bars w3-button w3-teal w3-hide-large w3-xlarge" onclick="w3_open()"></i>
            <span id="myIntro" class="w3-hide">Portal Administrativo</span></p>
    </div>

    <header class="w3-container w3-theme" style="padding:64px 32px">
        <h1 class="w3-xxxlarge">Portal Administrativo</h1>
    </header>

        <section style="margin: 30px 50px;">

            <h1>Usuarios</h1>

            <input id="buscar" type="text" class="w3-input w3-border w3-padding" placeholder="Escriba algo para filtrar" />

            <br>

            <table id="tabla " class="table table-striped w3-table-all w3-bordered w3-hoverable">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha Nacimiento</th>
                    <th>Mail</th>
                    <th>Permiso</th>
                    <th>Acción</th>
                </tr>
                </thead>
                {{#Usuario}}
                <tr class="tbody">
                    <td>{{apellido}}, {{nombre}}</td>
                    <td>{{fecha_nac}}</td>
                    <td>{{mail}}</td>
                    <td>{{descripcion}}</td>
                    <td>
                        <a href="administrador/borrarUser?id_usuario={{id_usuario}}" class="w3-btn w3-red"> Borrar</a>
                    </td>
                    </td>
                </tr>
                {{/Usuario}}
            </table>

        </section>

    <script>
        function myFunction2() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable2");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>


</div>
</div>
</div>

<script>
    document.getElementById("buscar").onkeyup = function() {
        var buscar_= this.value.toLowerCase() ;
        document.querySelectorAll('.table tbody tr').forEach(function(e){
            var encontro_ =false;
            e.querySelectorAll('td').forEach(function(e){
                if (e.innerHTML.toLowerCase().indexOf(buscar_)>=0){
                    encontro_=true;
                }
            });
            if (encontro_){
                e.style.display = '';
            }else{
                e.style.display = 'none';
            }
        });
    }
</script>

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