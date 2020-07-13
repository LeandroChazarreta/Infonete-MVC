{{> header}}


    {{#seccion}}
    <section class="seccion contenedor-publicaciones">

        <li class="Catalogonoticias w3-row">
            <div class="w3-quarter">
            <a href="seccion/verPublicacion/descripcion={{descripcion}}&id_publicacion={{id_publicacion}}" style="text-decoration: none;">
            <img src="view/img/{{imagen}}" alt="{{epigrafe_imagen}}" class="imgnoticia">
            </a>
            </div>
            <div class="">
            <a href="seccion/verPublicacion/descripcion={{descripcion}}&id_publicacion={{id_publicacion}}" style="text-decoration: none;">
            <h3>{{titulo}}</h3>
            <p>{{bajada}}</p>
            </a>
            </div>
        </li>

</section>
    {{/seccion}}
{{> footer}}

