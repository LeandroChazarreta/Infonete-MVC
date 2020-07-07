{{> header}}
<?php
echo $_SESSION['usuario'];
?>

<section class="publicaciones contenedor-publicaciones">

    {{#seccion}}
    <article class="publicacion">
        <a href="seccion/verPublicacion?descripcion={{descripcion}}&id_publicacion={{id_publicacion}}">
            <img src="view/img/{{imagen}}" alt="{{epigrafe_imagen}}">
            <h3>{{titulo}}</h3>
            <p>{{bajada}}</p>
        </a>
    </article>
    {{/seccion}}

</section>

{{> footer}}

