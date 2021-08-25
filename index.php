<?php

include "koneksi.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">


	<title>Sentimen Analisis Game PUBG Mobile</title>

	<style type="text/css">
		
		.judul{
			margin-top: 15px;
			margin-left: 10px;
			font-family: helvatica;
		}

		.table{

			margin-top: 5px;
			margin-left: 0px;
			border: 1px solid black;
		}

	</style>

</head>
<body>
	<form action="index.php" method="POST">
		<div class="col-md-16">
			<h2 class="judul">
				Sentimen Analisis Game PUBG Mobile
			</h2>
			<hr style="border: 1px solid black">

		</div>
			
		<div class="col-md-6">
			<table class="table">
			<form action=" " method="POST">
				<tr>
					<td><a href="index.php" role="button" class="btn btn-primary">Uji Sentimen</a></td>
					<td><a href="tambahdata.php" role="button" class="btn btn-default">Tambah Data</a></td>
					<td><a href="ulasanpositif.php" role="button" class="btn btn-default">Ulasan Positif</a></td>
					<td><a href="ulasannegatif.php" role="button" class="btn btn-default">Ulasan Negatif</a></td>
				</tr>
				<tr>
					<td>Ulasan : </td>
					<td colspan="3"><textarea class="form-control" rows="3" name="tes"></textarea></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><button type="button" class="btn btn-info">Atur Ulang</button></td>
					<td><button type="button" class="btn btn-success" name="submit">Proses</button></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>Positif</td>
					<td>: 0,0123456789</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>Negatif</td>
					<td>: 0,0123456789</td>
					<td>&nbsp;</td>
				</tr>
			</form>

			<?php
		if(isset($_POST['submit']))
		{
			print_r($_POST);
			$sql = "INSERT INTO tb_coba (tes)
			VALUES ('".$_POST['tes']."')";
		}
		?>
			</table>
		</div>

	

	<table class="table table-bordered">
		<tr>
			<td>
			
			</td>
		</tr>
	</table>
</body>
</html>