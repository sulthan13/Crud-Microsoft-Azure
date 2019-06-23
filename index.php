<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.mid.js"></script>
</head>

<script>
	$(document).ready(function() {
		var table = $('#example').DataTable();
		var tt = new $.fn.dataTable.TableTools( table );
		
		$( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
	} );
	
</script>

<body>
	<div class="container">
		<div class="row">
	

</div>
<div class="row">
	<p>
		<a href ="create.php" button class="btn btn-success">Create</button></a>
		
	</p>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email Address</th>
				<th>Mobile Number</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
			include 'database.php';
			$pdo = Database::connect();
			$sql = 'SELECT * FROM customers ORDER BY id DESC';
			foreach ($pdo->query($sql) as $row){
				echo '<tr>';
				echo '<td>'. $row['name'] . '</td>';
				echo '<td>'. $row['email'] . '</td>';
				echo '<td>'. $row['mobile'] . '</td>';
				echo '<td width=250>';
				echo '<a class="btn" href="read.php?id='.$row['id'].'">Info</a>';
				echo '  ';
				echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
				echo '  ';
				echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
				echo '</td>';
			}
			Database::disconnect();
			?>
		</tbody>
	</table>
</div>
</body>
</html>