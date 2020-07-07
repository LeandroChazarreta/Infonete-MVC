{{> header}}

<div class="w3-container">

        <div class="container w3-col">


            <h3><b>Publicaciones</b></h3>
            <hr>

            <h5><b>Gestión de mis aplicaciones</b></h5>

            <a href="./publicacion/crearPublicacion" class="w3-button w3-blue w3-hover-orange w3-margin-bottom">Crear Publicacion </a>

            <table class="w3-table-all w3-bordered w3-small">
                <tr>
                    <th>Identificador</th>
                    <th>Título</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
                {{#publicaciones}}
                <tr>
                    <td>{{id_publicacion}}</td>
                    <td>{{titulo}}</td>
                    <td>{{fecha}}</td>
                    <td>
                        <a href="./publicacion/editarPublicacion?id_publicacion={{id_publicacion}}"
                           class="w3-button w3-blue w3-hover-orange">Editar</a>
                    </td>
                </tr>
                {{/publicaciones}}
            </table>




        </div>

</div>


{{> footer}}