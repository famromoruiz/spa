<?php
use \route\Route;

?>
<div class="container-fluid">
	<div class="card">
  <div class="card-header">
    Dashboard
    <a href="#" onclick="switch_panel('reporte');" class="btn btn-seremas float-right boton_cambia btn-sm" >
 Reporte ventas
</a>
  </div>

  <div class="graficas">
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

  <div class="ventas d-none">
    <br>
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="inicio">Fecha Inicio</label>
                <input type="text" class="form-control datetimepicker1" id="inicio">
                <label for="inicio">Fecha Termino</label>
                <input type="text" class="form-control datetimepicker1" id="termino">

                <button class="btn btn-sm btn-seremas float-right" onclick="reporte();">Ver</button>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">

                    <table class="table" id="report">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Cantidad</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col" class="text-center">Precio</th>
                            </tr>
                        </thead>
                        <tbody class="prod" id="pagos">
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
            
        </div>
    </div>
  </div>

</div>
	
</div>
<script>
    
   
    $('.datetimepicker1').datetimepicker({
   format: 'DD/MM/YYYY'
});

   function switch_panel(panel){

    if (panel == 'reporte') {
        $('.graficas').addClass('d-none');
        $('.ventas').removeClass('d-none');
        $('.boton_cambia').html('Graficas');
        $('.boton_cambia').attr('onclick', 'switch_panel("graficas");');

    }

    if (panel == 'graficas') {
        $('.graficas').removeClass('d-none');
        $('.ventas').addClass('d-none');
        $('.boton_cambia').html('Reporte Ventas');
        $('.boton_cambia').attr('onclick', 'switch_panel("reporte");');
    }

   }

   function reporte(){
    var inicio = $('#inicio').val();
    var termino = $('#termino').val();
      $.ajax({

    data:  {inicio : inicio , termino: termino},
    url:   '<?= Route::Ruta(['ajax' , 'Reporte']) ?>',
    type:  'post',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
        var vts = JSON.parse(response);
        var li = '';
      console.log(vts);

      $.each(vts,function(index, el) {
          li = li+el.descripcion;
      });

      $('#pagos').html(li);

      var table = $('#report').DataTable({
                dom: 'Bfrtip',
        buttons: [
            'excel'
        ],
       "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            }
    });

     // console.log(li);
    }

  });
   }

var montos_ventas;
var total_clientes;
    $(document).ready(function($) {
        $.ajax({

    data:  {grafica : 'ventas'},
    url:   '<?= Route::Ruta(['ajax' , 'Graficas']) ?>',
    type:  'post',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
        montos_ventas = JSON.parse(response);
      console.log(montos_ventas.lunes);

var ctx = document.getElementById("ventas");
var ventas_data = {
  labels: ["LUNES","MARTES","MIERCOLES","JUEVES","VIERNES","SABADO"],
  datasets: [{
    label: "Ventas",
    data: [
    montos_ventas.lunes,
    montos_ventas.martes,
    montos_ventas.miercoles,
    montos_ventas.jueves,
    montos_ventas.viernes,
    montos_ventas.sabado
    ],
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
    }

  });

          $.ajax({

    data:  {grafica : 'clientes'},
    url:   '<?= Route::Ruta(['ajax' , 'Graficas']) ?>',
    type:  'post',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
        total_clientes = JSON.parse(response);

      var clientes = document.getElementById("clientes");
var clientes_data = {
  labels: ["LUNES","MARTES","MIERCOLES","JUEVES","VIERNES","SABADO"],
  datasets: [{
    label: "CLIENTES",
    data: [
    total_clientes.lunes,
    total_clientes.martes,
    total_clientes.miercoles,
    total_clientes.jueves,
    total_clientes.viernes,
    total_clientes.sabado
    ],
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
    }

  });

    });





// var productos = document.getElementById("productos");
// var datos_dona = {
//     datasets: [{
//         data: [10, 20, 30],
//         backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 1)'
//             ],
//     }],

//     // These labels appear in the legend and in the tooltips when hovering different arcs
//     labels: [
//         'Total Eye Care',
//         'Agua Termal 50 Ml',
//         'Magnetic Mask'
//     ]
// };
// var myDoughnutChart = new Chart(productos, {
//     type: 'doughnut',
//     data: datos_dona,
//     options: {
//     	 title: {
//             display: true,
//             text: 'PRODUCTOS'
//         }
//     }
// });

// var servicios = document.getElementById("servicios");
// var datos_dona_serv = {
//     datasets: [{
//         data: [10, 20, 30],
//         backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 1)'
//             ],
//     }],

//     // These labels appear in the legend and in the tooltips when hovering different arcs
//     labels: [
//         'DEP AXILA',
//         'DEP FACIAL',
//         'DEP PIERNA'
//     ]
// };
// var myDoughnutChart_servicios = new Chart(servicios, {
//     type: 'doughnut',
//     data: datos_dona_serv,
//     options: {
//     	 title: {
//             display: true,
//             text: 'SERVICIOS'
//         }
//     }
// });
</script>