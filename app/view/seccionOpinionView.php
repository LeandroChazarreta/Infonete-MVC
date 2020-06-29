{{> header}}
<?php
echo $_SESSION['usuario'];
?>

<div class="w3-container">

    {{#seccionOpinion}}

        <div class="w3-col m4 noticia w3-padding w3-border">

            <a href="">
            <div class="">
                <div class="">
                    <img class="imgPublicacion" src="view/img/{{id_publicacion}}.jpg" alt="{{id_publicacion}}">
                </div>
                <h5><b>{{titulo}}</b></h5>
                <p><b>{{bajada}}</b></p>
            </div>
            </a>
        </div>
        {{/seccionOpinion}}
</div>

{{> footer}}

