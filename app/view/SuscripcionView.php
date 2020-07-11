{{> header}}


<section class="container">
<div class="w3-row-padding w3-center w3-margin-top">
    <div class="w3-card w3-container w3-third centrar" style="min-height:460px">
        <h3>Suscribite</h3>
        <br>
        <i class="fa fa-desktop w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
        <p>Tene acceso completo a todas las noticias</p>
        <p>Descargas ilimitadas</p>
        <p>Comenta las noticias </p>
        <p>Se parte de la mejor comunidad de noticias</p>
        <h4>$1</h4>
        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">Suscribirse</button>
    </div>
</div>
</section>
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container">
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <div class="col-75">
                    <div class="container">
                        <form action="/action_page.php">

                            <div class="row">
                                <div class="col-50">
                                    <h3 class="icon-container">Payment</h3>

                                    <label for="fname"><i class="fa fa-user"></i> Nombre y apellido</label>
                                    <input type="text" id="fname" name="firstname" placeholder="John M. Doe">

                                    <label for="expmonth">Mes de vencimiento</label>
                                    <select name="mes" class="imput">
                                        <option value="1">Enero</option>
                                        <option value="2">Febrero</option>
                                        <option value="3">Marzo</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Mayo</option>
                                        <option value="6">Junio</option>
                                        <option value="7">Julio</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </select>

                                </div>

                                <div class="col-50">
                                    <div class="icon-container">
                                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                                    </div>

                                    <label for="ccnum">Numero de tarjeta de crédito</label>
                                    <input type="text" id="ccnum" name="cardnumber" placeholder="xxxx-xxxx-xxxx-xxxx">

                                    <div class="row">
                                        <div class="col-50">
                                            <label for="expyear">Año de vencimiento</label>
                                            <input type="number" id="expyear" name="expyear" placeholder="2018" min="1" max="9999" maxlength="4" minlength="4" class="imput">
                                        </div>
                                        <div class="col-50">
                                            <label for="cvv">Codigo de Seguridad</label>
                                            <input type="text" id="cvv" name="cvv" placeholder="352" class="imput">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Pagar   " class="btn w3-blue">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

{{> footer}}