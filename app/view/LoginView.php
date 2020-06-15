{{> header}}
<div class="w3-container">


    <form action="./login/login" method="post" class="formlogin">


        <div class="container login">
            <label><b>Usuario</b></label>
            <input type="text" placeholder="Ingrese su usuario" name="user" required>

            <label for=""><b>Password</b></label>

            <input  type="password" placeholder="Ingrese su password" name="clave" required>

            <label>
                <input type="checkbox" checked="checked" name="remember"> Recordar usuario
            </label>

            <button type="submit" class="w3-button w3-white w3-border">Ingresar</button>

        </div>
    </form>


</div>

{{> footer}}
</body>
</html>

