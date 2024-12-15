<h2 class="dashboard__heading"><?php echo $titulo?></h2>

<div class="dashboard__grafica">
  <div>
    <canvas id="myChart"></canvas>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const grafica = document.querySelector('#myChart');
  if (grafica) {
    obtenerDatos();
    
    async function obtenerDatos() {
      const url = '/api/regalos'; // URL de la API
      try {
        const respuesta = await fetch(url);
        const resultado = await respuesta.json();

        // Extraer datos dinámicamente
        const nombres = resultado.map(regalo => regalo.nombre); // Nombres para las etiquetas
        const cantidades = resultado.map(regalo => regalo.total); // Cantidades para el dataset

        // Crear la gráfica
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: nombres,
            datasets: [{
              label: 'Number of Gifts',
              data: cantidades,
              backgroundColor: [
                '#ea580c',
                '#84cc16',
                '#22d3ee',
                '#a855f7',
                '#ef4444',
                '#14b8a6'
              ]
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            },
            plugins: {
              legend: {
                display: false
              }
            }
          }
        });
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    }
  }
</script>