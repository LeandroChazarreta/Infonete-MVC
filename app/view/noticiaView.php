{{> header2}}
<?php
echo $_SESSION['usuario'];
?>

<div class="w3-container">


    <form action="./noticia/crearNoticia" method="post" class="formlogin">


        <div class="container login">

            <h1>Generar noticia</h1>
            <p>Creación de noticias para agregar contenido a la página</p>
            <hr>

            <div>
            <label for="seccion"><b>Sección</b></label>
            <select name="seccion" id="seccion">
                {{#secciones}}
                    <option value="{{id_seccion}}">{{descripcion}}</option>
                {{/secciones}}
            </select>
            </div>

            <div>
            <label for="tipoNoticia"><b>Tipo de Nocticia</b></label>
            <select name="tipoNoticia" id="tipoNoticia">
                {{#tipoNoticias}}
                <option value="{{id_tipo_noticia}}">{{descripcion}}</option>
                {{/tipoNoticias}}
            </select>
            </div>

            <label for="titulo"><b>Título</b></label>
            <textarea placeholder="Ingrese el título" name="titulo" id="titulo" required></textarea>

            <label for="bajada"><b>Bajada</b></label>
            <textarea placeholder="Ingrese la bajada" name="bajada" id="bajada" ></textarea>

            <label for="imagen"><b>Imagen</b></label>
            <input type="file">

            <div>
            <label for="epigrafeImagen"><b>Epigrafe de la imagen</b></label>
            <textarea placeholder="Ingrese el epigrafe" name="epigrafeImagen" id="epigrafeImagen" cols="100%" ></textarea>
            </div>

            <label for="cuerpo"><b>Cuerpo</b></label>
            <textarea placeholder="Ingrese el cuerpo" name="cuerpo" id="cuerpo" required></textarea>

            <hr>

            <button type="submit" class="registerbtn">Crear</button>
        </div>

        <div class="container signin">
            <p>¿Ya tiene cuenta? <a href="./index.php?module=login&action=registrar">Ingresar</a>.</p>
        </div>
    </form>


</div>

{{> footer}}

