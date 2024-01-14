<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Visualization page</title>

<?php
	require_once 'connect.php';

    $querryAttempts = $connect->query("call get_attempts()");
    $connect->next_result();

  $attempts = mysqli_fetch_row($querryAttempts);

  $querrypoints = $connect->query("call get_all_points()");
  $connect->next_result();
  $points = mysqli_fetch_row($querrypoints);

  $PointsLabels = array("0-10","11-15","16-20","21-25");
  $PointsLabels2 = array("с 1 ","со 2","с 3","с 4 и более");
?>
<h3><br>Points graphs</h3>
<div style="width: 400px;">
  <canvas id="myChart"></canvas>
</div>

<h3><br>What attempt graph</h3>
<div style="width: 400px;">
  <canvas id="my2Chart"></canvas>
</div>

<style>
	form{
		padding: 4px;
	}
</style>

<body>

	<script>
  const labels = <?php echo json_encode($PointsLabels) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'attempts',
      data: <?php echo json_encode($points) ?>,
      backgroundColor: [
        'rgba(220,20,60, 0.8)',
        'rgba(34, 139, 34, 0.8)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(220,20,60)',
        'rgb(34,139,34)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };
  
  const labels2 = <?php echo json_encode($PointsLabels2) ?>;
  const data2 = {
    labels: labels2,
    datasets: [{
      label: 'points',
      data: <?php echo json_encode($attempts) ?>,
      
      borderWidth: 1
    }]
  };


  const config = {
	  type: 'doughnut',
    data: data,
    options: {
    },
  };

  const config2 = {
	  type: 'doughnut',
    data: data2,
    options: {
    },
  };
  


  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

  var myChart2 = new Chart(
    document.getElementById('my2Chart'),
    config2
  );
  

</script>

    <form action="index.php" method="post">
        <button type="submit">get back
    </form>

</body>
</html>
