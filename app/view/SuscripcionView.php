{{> header2}}




<form action="https://www.mi-sitio.com/procesar-pago" method="POST">
    <div class="w3-row-padding w3-center w3-margin-top">
            <div class="w3-card w3-container w3-third centrar" style="min-height:460px">
                <h3>Suscribite</h3>
                <br>
                <i class="fa fa-desktop w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
                <p>Tene acceso completo a todas las noticias</p>
                <p>Descargas ilimitadas</p>
                <p>Comenta las noticias </p>
                <p>Se parte de la mejor comunidad de noticias</p>
                <script
                        src="https://www.mercadopago.com.ar/integrations/v1/web-tokenize-checkout.js"
                        data-public-key="ENV_PUBLIC_KEY"
                        data-transaction-amount="100.00"></script>
            </div>
    </div>
</form>


{{> footer}}