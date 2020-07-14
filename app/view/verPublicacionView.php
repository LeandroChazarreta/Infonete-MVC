{{> header}}
<?php
echo $_SESSION['usuario'];
?>

<div class="contenedor-publicaciones">

        <div class="container">
            {{#publicacion}}

            <table class="w3-table">
                <tr>
                    <th> <h2><b>{{titulo}}</b></h2></th>

                    <th class="w3-right"> <a class="w3-btn w3-blue w3-margin" href="publicacion/generarPublicacionPDF">GENERAR PDF</a></th>

                </tr>
            </table>


            <h6>{{bajada}}</h6>
            <hr>
            <div class="publicaciones">
            <div class="verPublicacion">
                <img src="view/img/{{imagen}}" alt="{{epigrafe_imagen}}">
                <p for="epigrafeImagen" class="epigrafe"><b>{{epigrafe_imagen}}</b></p>
            </div>
            </div>

            <p for="cuerpo">{{cuerpo}}</p>

            <hr>


            {{/publicacion}}
        </div>


</div>

{{> footer}}

