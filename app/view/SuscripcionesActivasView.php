{{> header}}

<div class="w3-container">

    <div class="container w3-col">


        <h3><b>Suscripciones Activas</b></h3>
        <hr>



        <table class="w3-table-all w3-bordered w3-small">
            <tr>
                <th>Nº Suscripcion</th>
                <th>Fecha adquirida</th>
                <th>Fecha expiracion</th>
                <th>Promocion</th>
                <th>Precio</th>
                <th>Estado</th>

            </tr>
            {{#Suscripciones}}
            <tr>
                <td>{{id_suscripcion}}</td>
                <td>{{fecha_adquirida}}</td>
                <td>{{fecha_expiracion}}</td>
                <td>{{descripcion}}</td>
                <td>{{precio}}</td>
                <td>{{estado}}</td>

            </tr>
            {{/Suscripciones}}
        </table>




    </div>

</div>


{{> footer}}