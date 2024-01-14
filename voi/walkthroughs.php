
<?php
require_once 'connect.php';
?>

<?php
if(isset($_POST['Date']))
	{
		$result = $connect->query("call SortByDate()");
	}

elseif (isset ($_POST['Mark'])) 
    {
        $result = $connect->query("call SortByMark()");
    }
elseif (isset ($_POST['Points'])) 
    {
        $result = $connect->query("call SortByPoints()");
    }
elseif (isset ($_POST['Test'])) 
    {
        $result = $connect->query("call SortByTest()");
    }
    
 else {
	$result = $connect->query("call get_all_walkthroughs()");
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

		<form action="test.php" method="post">
         
		 <input type="submit" name="Mark" value="sort by mark"><br><br>
		 <input type="submit" name="Date" value="sort by date"><br><br>
		 <input type="submit" name="Points" value="sort by points"><br><br>
		 <input type="submit" name="Test" value="sort by test"><br><br>
	  
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
			 <?php while ($row = mysqli_fetch_array($result)):?>
			 <tr>
				 <td><?php echo $row[0];?></td>
				 <td><?php echo $row[1];?></td>
				 <td><?php echo $row[2];?></td>
				 <td><?php echo $row[3];?></td>
				 <td><?php echo $row[4];?></td>
				 <td><?php echo $row[5];?></td>
				 <td><?php echo $row[6];?></td>
			 </tr>
			 <?php endwhile;?>
		 </table>
		 </form>

  
	
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