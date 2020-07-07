{{> header}}


    {{#seccion}}
    <section class="seccion contenedor-publicaciones">
        <li class="Catalogonoticias">
            <img src="view/img/{{imagen}}" alt="{{epigrafe_imagen}}" class="imgnoticia">
            <h3><a href="seccion/verPublicacion?descripcion={{descripcion}}&id_publicacion={{id_publicacion}}" style="text-decoration: none;">{{titulo}}</a></h3>
            <p>{{bajada}}</p>
        </li>
</section>
    {{/seccion}}
{{> footer}}

