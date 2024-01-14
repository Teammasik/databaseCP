
<?php
require_once 'connect.php';
?>

<meta charset="UTF-8" />
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>walkthroughs</title>
</head>
<style>
	th, td{
		padding: 10px;
	}
	th {
		background: #606060;
		color: #fff;
	}
	td {
		background: #b5b5b5;
	}
</style>

<body>

	<div class="row">
		<div class="col-md-12 head">
			<div class="float-right">
				<a href="export.php" class="btn btn-success"><i class="dwn"></i> Export</a>
			</div>
		</div>


    <table>
        <tr>
            <th>ID</th>
            <th>student_id</th>
            <th>mark</th>
            <th>uTime</th>
			<th>uDate</th>
			<th>points</th>
			<th>test</th>
        </tr>
		
			<?php
				$products = $connect->query("CALL get_all_walkthroughs()");
				$products = mysqli_fetch_all($products);
				foreach ($products as $item){
					?> 
						<tr>
							<td><?= $item[0] ?></td>
							<td><?= $item[1] ?></td>
							<td><?= $item[2] ?></td>
							<td><?= $item[3] ?></td>
							<td><?= $item[4] ?></td>
							<td><?= $item[5] ?></td>
							<td><?= $item[6] ?></td>
						</tr>
					<?php
				}
				
			?>
    </table>
	
	<form action="index.php" method="post">
        <button type="submit">Get back </button>
    </form>

	<h3>add new walkthrough</h3>
    <form action="create.php" method="post">
		<p>Student_id</p>
		<input type="text" name="studentId">
		<p>uTime</p>
		<input type="text" name="uTime">
		<p>uDate</p>
		<input type="text" name="uDate">
		<p>points</p>
		<input type="text" name="points">
		<p>test</p>
		<input type="text" name="test"> <br><br>

        <button type="submit">add walkthrough</button>
    </form>

	</div>
	
</body>
</html>