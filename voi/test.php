<?php
require_once 'connect.php';
?>

<?php

if (isset($_POST['Date'])) {
	$result = $connect->query("CALL SortByColumn('uDate')");
	$connect->next_result();
} elseif (isset($_POST['Mark'])) {
	$result = $connect->query("CALL SortByColumn('mark')");
} elseif (isset($_POST['Points'])) {
	$result = $connect->query("CALL SortByColumn('points')");
	$connect->next_result();
} elseif (isset($_POST['Test'])) {
	$result = $connect->query("CALL SortByColumn('test')");
	$connect->next_result();
} else {
	$result = $connect->query("CALL Select_Walkthrough_And_Students()");
	$connect->next_result();
}

?>

<meta charset="UTF-8" />
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>walkthroughs</title>
</head>
<style>
	th,
	td {
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

		<form action="test.php" method="post">

			<input type="submit" name="Mark" value="sort by mark"><br><br>
			<input type="submit" name="Date" value="sort by date"><br><br>
			<input type="submit" name="Points" value="sort by points"><br><br>
			<input type="submit" name="Test" value="sort by test"><br><br>

			<table>
				<tr>
					<th>Name</th>
					<th>Surname</th>
					<th>Group</th>
					<th>Mark</th>
					<th>uTime</th>
					<th>uDate</th>
					<th>points</th>
					<th>test</th>
				</tr>
				<?php while ($row = mysqli_fetch_array($result)) : ?>
					<tr>
						<td><?php echo $row[0]; ?></td>
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[2]; ?></td>
						<td><?php echo $row[3]; ?></td>
						<td><?php echo $row[4]; ?></td>
						<td><?php echo $row[5]; ?></td>
						<td><?php echo $row[6]; ?></td>
						<td><?php echo $row[7]; ?></td>
					</tr>
				<?php endwhile; ?>
			</table>
		</form>



		<form action="index.php" method="post">
			<button type="submit">Get back </button>
		</form>

		<h3>add new walkthrough</h3>
		<form action="create.php" method="post">
			<p>Name</p>
			<input type="text" name="studentName">
			<p>Surname</p>
			<input type="text" name="studentSurname">
			<p>Group</p>
			<input type="text" name="studentGroup">
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


	<div>
		<form method="POST">
			<br><br><br>
			<label>From: </label><input type="date" name="from">
			<label>To: </label><input type="date" name="to">
			<input type="submit" value="Get Data" name="submit">
		</form>
	</div>
	<h2>Data Between Selected Dates</h2>
	<div>

		<table>
			<thead>
			<th>Name</th>
					<th>Surname</th>
					<th>Group</th>
					<th>Mark</th>
					<th>uTime</th>
					<th>uDate</th>
					<th>points</th>
					<th>test</th>
			</thead>
			<tbody>
				<?php
				if (isset($_POST['submit'])) {
					//mysqli_free_result($result);
					$from = date('Y-m-d', strtotime($_POST['from']));
					$to = date('Y-m-d', strtotime($_POST['to']));

					$result = $connect->query("call create_or_replace_view('$from', '$to')");
					$connect->next_result();

					while ($row = mysqli_fetch_array($result)){?>
						<tr>
							<td><?php echo $row[0]; ?></td>
							<td><?php echo $row[1]; ?></td>
							<td><?php echo $row[2]; ?></td>
							<td><?php echo $row[3]; ?></td>
							<td><?php echo $row[4]; ?></td>
							<td><?php echo $row[5]; ?></td>
							<td><?php echo $row[6]; ?></td>
							<td><?php echo $row[7]; ?></td>
						</tr>
				<?php
					}
				}
				?>
			</tbody>
		</table>
	</div>

	<div>
		<form method="post">
		<br><br><br>
		<label>Search</label>
		<input type="text" name="search">
		<input type="submit" name="send">
		</form>
		<?php
			if (isset($_POST["send"])) {
				$str = $_POST["search"];

				
				// $query = "select s.userName, s.userSurname, s.userGroup, w.mark, w.uTime, w.uDate, w.points, w.test from walkthrough w,students s where userSurname = ? and s.id=w.student_id";
				// $stmt = $connect->prepare($query);
				// $stmt->bind_param("s", $str);
				// $stmt->execute();

				// $result = $stmt->get_result();

				$result2 = $connect->query("select s.userName, s.userSurname, s.userGroup, w.mark, w.uTime, w.uDate, w.points, w.test from walkthrough w,students s where userSurname = '$str' and s.id=w.student_id");
				$connect->next_result();

			}


		?>

		<table>
			<tr>
				<th>Name</th>
				<th>Surname</th>
				<th>Group</th>
				<th>mark</th>
				<th>uTime</th>
				<th>uDate</th>
				<th>points</th>
				<th>test</th>
			</tr>
			<?php while ($row = mysqli_fetch_array($result2)) : ?>
				<tr>
					<td><?php echo $row[0]; ?></td>
					<td><?php echo $row[1]; ?></td>
					<td><?php echo $row[2]; ?></td>
					<td><?php echo $row[3]; ?></td>
					<td><?php echo $row[4]; ?></td>
					<td><?php echo $row[5]; ?></td>
					<td><?php echo $row[6]; ?></td>
					<td><?php echo $row[7]; ?></td>
				</tr>
			<?php endwhile; ?>
		</table>
		</form>



	</div>

</body>

</html>