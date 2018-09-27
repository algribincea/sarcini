<html>
<head>
	<title></title>
</head>
<body>
	<? 
	require_once 'functions.php';
	error_reporting(E_ALL);
	$connection = mysqli_connect('localhost', 'root', '', 'studentInfo');
	
	if(mysqli_connect_errno() !== 0){
		die('Database error');
	}


	$result = mysqli_query($connection, 'SELECT * FROM listaStudenti');
	
	
	?>

	<table border="1">
	<thead>
		<tr>
			<th>First name</th>
			<th>Last name</th>
			<th>Media</th>
		</tr>
	</thead>
	<tbody>
	<?
	while ($listaStudenti = mysqli_fetch_assoc($result)) {?>
			<tr>
				<td><?=formatName($listaStudenti['first_name']);?></td>
				<td><?=formatName($listaStudenti['last_name']);?></td>
				<td><?=$listaStudenti['notaMedie'];?></td>
			</tr>	
	<?}?>
	</tbody>
	</table>
	CONTENT 
	<hr>
	FOOTER
</body>
</html>