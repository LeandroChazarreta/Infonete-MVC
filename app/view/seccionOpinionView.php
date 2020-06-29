{{> header}}
<?php
echo $_SESSION['usuario'];
?>

<div class="w3-container">

    {{#seccionOpinion}}
    <div class="w3-container">

        <div class="w3-row-padding w3-padding-16">

            <div class="w3-col m4 noticia">
                <div class="cuadrado2"><img src="view/img/{{id}}.jpg" alt="{{titulo}}"></div>
                <h5><b>{{titulo}}</b></h5>
                <p><b>{{bajada}}</b></p>
            </div>
        </div>
        {{/seccionOpinion}}
</div>

{{> footer}}

