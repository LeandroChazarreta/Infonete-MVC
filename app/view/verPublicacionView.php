{{> header}}
<?php
echo $_SESSION['usuario'];
?>

<div class="w3-container">

        <div class="container w3-col">
            {{#publicacion}}

            <h2><b>{{titulo}}</b></h2>

            <h6>{{bajada}}</h6>
            <hr>

            <div>
                <img src="view/img/{{id_publicacion}}.jpg" alt="{{epigrafe_imagen}}">
                <p for="epigrafeImagen"><b>{{epigrafe_imagen}}</b></p>
            </div>

            <p for="cuerpo">{{cuerpo}}</p>

            <hr>


            {{/publicacion}}
        </div>


</div>

{{> footer}}

