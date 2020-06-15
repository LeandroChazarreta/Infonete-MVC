{{> header}}
<div class="w3-container">


    <form action="./registrar/registrarUsuario" method="post" class="formlogin">


        <div class="container login">
            <h1>Registrar</h1>
            <p>Crea tu usuario para tener acceso a noticias gratuitas</p>
            <hr>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Ingrese su email" name="email" id="email" required>

            <label for="contraseña"><b>Contraseña</b></label>
            <input type="password" placeholder="Ingrese su contraseña" name="psw" id="psw" required>

            <label for="psw-repeat"><b>Repetir Contraseña</b></label>
            <input type="password" placeholder="Repita su contraseña" name="psw-repeat" id="psw-repeat" required>

            <label for="nombre"><b>Nombre</b></label>
            <input type="text" placeholder="Ingrese su nombre" name="nombre" id="nombre" required>

            <label for="apellido"><b>Apellido</b></label>
            <input type="text" placeholder="Ingrese su apellido" name="apellido" id="apellido" required>

            <label for="nacimiento"><b>Fecha de nacimiento</b></label>
            <input type="date" placeholder="Ingrese su fecha de nacimiento" name="nacimiento" id="nacimiento" required>

            <hr>
            <p>Al crear una cuenta usted acepta nuestros terminos y condiciones.</p>

            <button type="submit" class="registerbtn">Registrar</button>
        </div>

        <div class="container signin">
            <p>¿Ya tiene cuenta? <a href="./index.php?module=login&action=registrar">Ingresar</a>.</p>
        </div>
    </form>


</div>

{{> footer}}