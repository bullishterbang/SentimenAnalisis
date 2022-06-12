<?php
error_reporting(E_ALL & ~E_NOTICE);
include("koneksi.php");
$page = $_GET['p'] == FALSE ? 1 : $_GET['p'];
$row = ($page - 1 ) * 30;
$sql ="SELECT ulasantesting FROM tb_normalisasi WHERE CAST(positif AS DOUBLE) > CAST(negatif AS DOUBLE) LIMIT $row ,30";
$result = $koneksi->query($sql);
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
<center>
<div class="col-md-16">
			<h2 class="judul">
				Sentimen Analisis Game PUBG Mobile
			</h2>
			<hr style="border: 1px solid black">

		</div>
			
		<div class="col-md-6">
			
			<table class="table">
				<tr>
					<td><a href="index.php" role="button" class="btn btn-default">Uji Sentimen</a></td>
					<!-- <td><a href="tambahdata.php" role="button" class="btn btn-default">Tambah Data</a></td> -->
					<td><a href="ulasanpositif.php" role="button" class="btn btn-primary">Kumpulan Positif</a></td>
					<td><a href="ulasannegatif.php" role="button" class="btn btn-default">Kumpulan Negatif</a></td>
				</tr>
				<tr>
					<td colspan="3">
						
						<table class="table table-bordered">
							
							<tr>
								<td style="text-align: center; font-weight: bold;">No</td>
								<td style="column-width: 500px; text-align: center; font-weight: bold;">Ulasan</td>
							</tr>
							<?php
							$nu= 1 + ($page-1)*30;
							if ($result->num_rows > 0) {
 							// output data of each row
  								while($row = $result->fetch_assoc()) {

    								echo"
    								<tr>
    									<td>" . $nu++ . "</td>
    									<td>" . $row['ulasantesting'] . "</td>
    								</tr>
    								";
  								}
							} else {
  								echo "0 results";
							}
							$koneksi->close();
							?>
						</table>

					</td>
				</tr>
				
			</table>
		</div>
</center>
</body>
</html>
