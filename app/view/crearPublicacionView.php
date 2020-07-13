{{> header}}
<?php
echo $_SESSION['usuario'];
?>

<div class="w3-container">


    <form action="./publicacion/validarPublicacion" method="post" enctype="multipart/form-data" class="formlogin">


        <div class="container w3-col">

            <h2>Crear Publicacion</h2>

            <p>Creación de publicaciones para agregar contenido a la página</p>
            <hr>

            <div>
                {{#error}}
                <div class="w3-panel w3-red">
                    <h4>{{error}}</h4>
                </div>
                {{/error}}

                <h5 class="w3-padding-8" for="tipoPublicacion">Tipo de Publicacion</h5>
                <select name="tipoPublicacion" id="tipoPublicacion">
                    {{#tipoPublicacion}}
                    <option value="{{id_tipo_publicacion}}">{{descripcion}}</option>
                    {{/tipoPublicacion}}
                </select>
            </div>

            <div>
            <h5 class="w3-padding-8" for="seccion">Sección</h5>
            <select name="seccion" id="seccion">
                {{#secciones}}
                    <option value="{{id_seccion}}">{{descripcion}}</option>
                {{/secciones}}
            </select>
            </div>

            <h5 class="w3-padding-8" for="titulo">Título</h5>
            <textarea placeholder="Ingrese el título de la publicacion" name="titulo" id="titulo" required></textarea>

            <h5 class="w3-padding-8" for="bajada">Bajada</h5>
            <textarea placeholder="Ingrese la breve descripcion dispuesta debajo del titulo de la publicacion" name="bajada" id="bajada" ></textarea>

            <h5 class="w3-padding-8" for="imagen">Imagen</h5>
            <input type="file" name="file" id="imagen">

            <div>
            <h5 class="w3-padding-8" for="epigrafeImagen">Epigrafe de la imagen</h5>
            <textarea placeholder="Ingrese el epigrafe" name="epigrafeImagen" id="epigrafeImagen" cols="100%"></textarea>
            </div>

            <h5 class="w3-padding-8" for="cuerpo">Cuerpo</h5>
            <textarea placeholder="Ingrese el cuerpo" name="cuerpo" id="cuerpo" required"></textarea>

            <hr>

            <button type="submit" class="registerbtn">Generar Publicacion</button>
        </div>

    </form>


</div>

{{> footer}}

