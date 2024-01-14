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

	
	// $query1 = $connect->query("
	// SELECT count(mark) FROM `students` WHERE mark = 0
	// ");
	// $query2 = $connect->query("
	// SELECT COUNT(mark) FROM `students` WHERE mark = 1
	// ");
	
	// $row = mysqli_fetch_row($query1);
	// //echo $row[0];
	
	// $grData = array($row[0], mysqli_fetch_row($query2));
	// $labs = array("незачет","зачет");

  // // visualization.php
  
  //   $query3 = $connect->query("
	// select extract(MONTH from udate) as month,COUNT(mark) as total_value from `students` where udate IS NOT NULL group by month
	// ");

  // $queryPoints = $connect->query("
  // SELECT SUM(CASE WHEN points<11 THEN 1 ELSE 0 END)f1,SUM(CASE WHEN points<16 and points>10 THEN 1 ELSE 0 END)f2,SUM(CASE WHEN points<21 and points>15 THEN 1 ELSE 0 END)f3,SUM(CASE WHEN points<26 and points>20 THEN 1 ELSE 0 END)f4 FROM walkthrough
  // ");

  //$row = mysqli_fetch_row($query1);

  $queryPoints = $connect->query("
  call get_all_points()
  ");
  $Points = mysqli_fetch_row($queryPoints);
  var_dump($Points);


  //$Points = array();
  $PointsLabels = array("0-10","11-15","16-20","21-25");
  // $Points[0] = $queryPoints['f1'];
  // $Points[1] = $queryPoints['f2'];
  // $Points[2] = $queryPoints['f3'];
  // $Points[3] = $queryPoints['f4'];


	// $monthamount = array();
	// $monthdata = array("январь","февраль","март","апрель","май","июнь","июль","август","сентябрь","октябрь","ноябрь","декабрь");
	
	// while($row = mysqli_fetch_assoc($query3)){
	// 	$monthamount[$row['month']] = $row['total_value'];
	// 	//array_push($monthamount, $row['total_value']);
	// }
	
  
?>

<div style="width: 500px;">
  <canvas id="myChart"></canvas>
</div>

<div style="width: 500px;">
  <canvas id="mynChart"></canvas>
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
      label: 'points',
      data: <?php echo json_encode($Points) ?>,
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


  const config = {
	  type: 'doughnut',
    data: data,
    options: {
    },
  };
  


  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
  


</script>

    <form action="index.php" method="post">
        <button type="submit">get back
    </form>

</body>
</html>