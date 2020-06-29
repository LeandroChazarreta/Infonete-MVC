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

            <button type="submit" class="registerbtn">Ingresar</button>

        </div>
    </form>


</div>

{{> footer}}
</body>
</html>

