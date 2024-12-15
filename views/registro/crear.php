<main class="registro">
<h2 class="registro__heading"><?php echo $titulo?></h2>
<p class="registros__descripcion">Choose your plan</p>

<div <?php aos_animacion();?> class="paquetes__grid">

<div class="paquete">
    <h3 class="paquete__nombre">Free Pass</h3>
    <ul class="paquete__lista">
        <li class="paquete__elemento">Virtual Access to DevWebCamp</li>
    </ul>
    <p class="paquete__precio">$0</p>
    <form action="/finalizar-registro/gratis" method="POST">
    <input class="paquete__submit" type="submit" value="Free Pass">
</form>
</div>
<div  class="paquete">
    <h3 class="paquete__nombre">Presential Pass</h3>
    <ul class="paquete__lista">
        <li class="paquete__elemento">Presential access to DevWebCamp</li>
        <li class="paquete__elemento">Pass for 2 days</li>
        <li class="paquete__elemento">Access to workshop and conferences</li>
        <li class="paquete__elemento">Access to records</li>
        <li class="paquete__elemento">Event's shirt</li>
        <li class="paquete__elemento">Food and drinks</li>
        </ul>
        <p class="paquete__precio">$199</p>
        <div id="smart-button-container">
    <div style="text-align: center;">
        <div id="paypal-button-container"></div>
    </div>
</div>
</div>

        <div class="paquete">
    <h3 class="paquete__nombre">Virtual Pass</h3>
    <ul class="paquete__lista">
        <li class="paquete__elemento">Virtual Access to DevWebCamp</li>
        <li class="paquete__elemento">Pass for 2 days</li>
        <li class="paquete__elemento">Access to workshop and conferences</li>
        <li class="paquete__elemento">Access to records</li>
    </ul>
    <p class="paquete__precio">$49</p>
    <div id="smart-button-container">
    <div style="text-align: center;">
        <div id="paypal-button-container-virtual"></div>
    </div>
</div>

</div>    
</div>

</main>
<script src="https://www.paypal.com/sdk/js?client-id=Adc6YGqAvfmtD_7WCDB9mf3AidMfM18ZQr49mGkIHEOF8XuFTW7aAMFuB09wVfMsKy54lOoFfpWqL3HS&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>


<script>
  function initPayPalButton() {
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'pay',
      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{"description":"1","amount":{"currency_code":"USD","value":199}}]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {
          
              const datos = new FormData();
              datos.append('paquete_id', orderData.purchase_units[0].description);
              datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

              fetch('/finalizar-registro/pagar', {
                  method: 'POST',
                  body: datos
              })
              .then( respuesta => respuesta.json())
              .then(resultado => {
                  if(resultado.resultado) {
                      actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                  }
              })
          
        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container');


    // Pase virtual
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'pay',
      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{"description":"2","amount":{"currency_code":"USD","value":49}}]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {

              const datos = new FormData();
              datos.append('paquete_id', orderData.purchase_units[0].description);
              datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

              fetch('/finalizar-registro/pagar', {
                  method: 'POST',
                  body: datos
              })
              .then( respuesta => respuesta.json())
              .then(resultado => {
                  if(resultado.resultado) {
                      actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                  }
              })
              
        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container-virtual');

  }
  initPayPalButton();
</script>