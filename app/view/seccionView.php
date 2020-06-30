{{> header2}}
<?php
echo $_SESSION['usuario'];
?>

<section class="publicaciones contenedor-publicaciones">

    {{#seccion}}
    <article class="publicacion">
        <a href="seccion/{{descripcion}}/{{id_publicacion}}">
            <img src="view/img/{{id_publicacion}}.jpg" alt="{{epigrafe_imagen}}">
            <h3>{{titulo}}</h3>
            <p>{{bajada}}</p>
        </a>
    </article>
    {{/seccion}}

</section>

{{> footer}}

