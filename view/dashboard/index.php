<div class="container-fluid">
	<div class="card">
  <div class="card-header">
    Dashboard
  </div>
  
<div class="row">
		<div class="col-md-6">
			<canvas id="ventas" ></canvas>
		</div>
		<div class="col-md-6">
			<canvas id="clientes" ></canvas>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-6">
			<canvas id="productos" ></canvas>
		</div>
		<div class="col-md-6">
			<canvas id="servicios" ></canvas>
		</div>
	</div>

</div>
	
</div>
<script>
var ctx = document.getElementById("ventas");
var ventas_data = {
  labels: ["LUNES","MARTES","MIERCOLES","JUEVES","VIERNES","SABADO"],
  datasets: [{
    label: "Ventas",
    data: [1000,2500,500,4000,600,0],
    lineTension: 0,
    fill: false,
    borderColor: 'orange',
    backgroundColor: 'transparent',
    borderDash: [5, 5],
    pointBorderColor: 'orange',
    pointBackgroundColor: 'rgba(255,150,0,0.5)',
    pointRadius: 5,
    pointHoverRadius: 10,
    pointHitRadius: 30,
    pointBorderWidth: 2,
    pointStyle: 'rectRounded'
  }]
};
var myChart = new Chart(ctx, {
    type: 'line',
    data: ventas_data,
    options: {
        
    }
});

var clientes = document.getElementById("clientes");
var clientes_data = {
  labels: ["LUNES","MARTES","MIERCOLES","JUEVES","VIERNES","SABADO"],
  datasets: [{
    label: "CLIENTES",
    data: [1,5,7,2,8,0],
    lineTension: 0,
    fill: false,
    borderColor: 'orange',
    backgroundColor: 'transparent',
    borderDash: [5, 5],
    pointBorderColor: 'orange',
    pointBackgroundColor: 'rgba(255,150,0,0.5)',
    pointRadius: 5,
    pointHoverRadius: 10,
    pointHitRadius: 30,
    pointBorderWidth: 2,
    pointStyle: 'rectRounded'
  }]
};
var myChart = new Chart(clientes, {
    type: 'line',
    data: clientes_data,
    options: {
        
    }
});

var productos = document.getElementById("productos");
var datos_dona = {
    datasets: [{
        data: [10, 20, 30],
        backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 1)'
            ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Total Eye Care',
        'Agua Termal 50 Ml',
        'Magnetic Mask'
    ]
};
var myDoughnutChart = new Chart(productos, {
    type: 'doughnut',
    data: datos_dona,
    options: {
    	 title: {
            display: true,
            text: 'PRODUCTOS'
        }
    }
});

var servicios = document.getElementById("servicios");
var datos_dona_serv = {
    datasets: [{
        data: [10, 20, 30],
        backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 1)'
            ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'DEP AXILA',
        'DEP FACIAL',
        'DEP PIERNA'
    ]
};
var myDoughnutChart_servicios = new Chart(servicios, {
    type: 'doughnut',
    data: datos_dona_serv,
    options: {
    	 title: {
            display: true,
            text: 'SERVICIOS'
        }
    }
});
</script>