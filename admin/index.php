<?php

use Google\Service\Dfareporting\Order;

$title= "Dashbaord";
require_once "layout/header.php"; 
$ORDERS = new Orders;

?>

    <h1 class="mt-4">Dashboard</h1>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Income'],
          <?php 
            foreach($ORDERS->dailySales() as $daily){
          ?>
          ['<?=$daily['DATE(order_date)']?>', <?=$daily['SUM(amount)']?>],
          <?php
            };
          ?>
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <div>
      <div id="curve_chart" style="width:700px; height:450px"></div>
    </div>

<?php require_once "layout/footer.php" ?>
