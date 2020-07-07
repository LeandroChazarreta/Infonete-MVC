{{> header}}
<?php
echo $_SESSION['usuario'];
?>

<div class="w3-container">


    <form action="./publicacion/validarPublicacion" method="post" class="formlogin">


        <div class="container w3-col">

            <h1><b>Generar Publicacion</b></h1>
            <p>Creación de publicaciones para agregar contenido a la página</p>
            <hr>

            <div>
                <h4 for="tipoPublicacion"><b>Tipo de Publicacion</b></h4>
                <select name="tipoPublicacion" id="tipoPublicacion">
                    {{#tipoPublicacion}}
                    <option value="{{id_tipo_publicacion}}">{{descripcion}}</option>
                    {{/tipoPublicacion}}
                </select>
            </div>

            <div>
            <h4 for="seccion"><b>Sección</b></h4>
            <select name="seccion" id="seccion">
                {{#secciones}}
                    <option value="{{id_seccion}}">{{descripcion}}</option>
                {{/secciones}}
            </select>
            </div>

            <h4 for="titulo"><b>Título</b></h4>
            <textarea placeholder="Ingrese el título de la publicacion" name="titulo" id="titulo" required></textarea>

            <h4 for="bajada"><b>Bajada</b></h4>
            <textarea placeholder="Ingrese la breve descripcion dispuesta debajo del titulo de la publicacion" name="bajada" id="bajada" ></textarea>

            <h4 for="imagen"><b>Imagen</b></h4>
            <input type="file" name="imagen" id="imagen">

            <div>
            <h4 for="epigrafeImagen"><b>Epigrafe de la imagen</b></h4>
            <textarea placeholder="Ingrese el epigrafe" name="epigrafeImagen" id="epigrafeImagen" cols="100%" ></textarea>
            </div>

            <h4 for="cuerpo"><b>Cuerpo</b></h4>
            <textarea placeholder="Ingrese el cuerpo" name="cuerpo" id="cuerpo" required></textarea>

            <hr>

            <button type="submit" class="registerbtn">Generar Publicacion</button>
        </div>

    </form>


</div>

{{> footer}}

