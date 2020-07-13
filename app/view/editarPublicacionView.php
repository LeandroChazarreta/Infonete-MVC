{{> header}}
<?php
echo $_SESSION['usuario'];
?>

<div class="w3-container">


    <form action="./publicacion/validarPublicacionParaActualizar" method="post" enctype="multipart/form-data" class="formlogin">


        <div class="container w3-col">

            <h2>Modificar Publicacion</h2>

            <p>Modificá una publicación para mejorar el contendo de la página</p>
            <hr>

            <div>
                {{#error}}
                <div class="w3-panel w3-red">
                    <h4>{{error}}</h4>
                </div>
                {{/error}}

                <h5 class="w3-padding-16" for="tipoPublicacion">Tipo de Publicacion</h5>
                <select name="tipoPublicacion" id="tipoPublicacion" required>
                    {{#tipoPublicaciones}}

                    {{#seleccionada}}
                    <option selected value="{{id_tipo_publicacion}}">{{descripcion}}</option>
                    {{/seleccionada}}

                    {{^seleccionada}}
                    <option value="{{id_tipo_publicacion}}">{{descripcion}}</option>
                    {{/seleccionada}}

                    {{/tipoPublicaciones}}
                </select>
            </div>

            <div>
            <h5 class="w3-padding-16" for="seccion">Sección</h5>
            <select name="seccion" id="seccion" required>
                {{#secciones}}

                {{#seleccionada}}
                <option selected value="{{id_seccion}}">{{descripcion}}</option>
                {{/seleccionada}}

                {{^seleccionada}}
                <option value="{{id_seccion}}">{{descripcion}}</option>
                {{/seleccionada}}

                {{/secciones}}
            </select>
            </div>

            {{#publicacionAEditar}}
            <h5 class="w3-padding-16" for="titulo">Título</h5>
            <textarea placeholder="Ingrese el título de la publicacion" name="titulo" id="titulo" required>{{titulo}}</textarea>

            <h5 class="w3-padding-16" for="bajada">Bajada</h5>
            <textarea placeholder="Ingrese la breve descripcion dispuesta debajo del titulo de la publicacion" name="bajada" id="bajada" >{{bajada}}</textarea>

            <h5 class="w3-padding-16">Imagen de la publicación</h5>
            <img class="imgPublicacion" src="view/img/{{imagen}}" alt="Error al leer la imagen">

            <h5 class="w3-padding-16" for="imagen">Cambiar imagen</h5>
            <input type="file" name="file" id="imagen">

            <div>
            <h5 class="w3-padding-16" for="epigrafeImagen">Epigrafe de la imagen</h5>
            <textarea placeholder="Ingrese el epigrafe" name="epigrafeImagen" id="epigrafeImagen" cols="100%" required>{{epigrafe_imagen}}</textarea>
            </div>

            <h5 class="w3-padding-16" for="cuerpo">Cuerpo</h5>
            <textarea placeholder="Ingrese el cuerpo" name="cuerpo" id="cuerpo" required>{{cuerpo}}</textarea>
            {{/publicacionAEditar}}
            <hr>

            <button type="submit" class="registerbtn">Guardar Publicacion</button>
        </div>

    </form>


</div>

{{> footer}}

