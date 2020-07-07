{{> header}}

    <section class="publicaciones contenedor-publicaciones">

        {{#publicacionesAutorizadas}}
        <article class="publicacion">
            <a href="seccion/{{descripcion}}/{{id_publicacion}}">
                <img src="view/img/{{imagen}}" alt="{{epigrafe_imagen}}">
                <h3>{{titulo}}</h3>
                <p>{{bajada}}</p>
            </a>
        </article>
        {{/publicacionesAutorizadas}}

    </section>

{{> footer}}