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
					<td colspan="3"><textarea class="form-control" rows="3" name="ulasan"></textarea></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><input name="aturulang" type="submit" class="btn btn-block btn-info" value="Atur Ulang"></td>
					<td><input name="proses" type="submit" class="btn btn-block btn-primary" value="Proses"></td>
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
			if (isset($_POST['proses'])) {
				$sql = "INSERT INTO tb_coba (tes) VALUES
				(
					'$_POST[ulasan]'
				
				)";
				
				$library = [

					".",",","<",">","/","?",";",":","`","~","!","@","#","$","%","^","&","*","-","+","=","\"", //menghapus karakter
					"1","2","3","4","5","6","7","8","9","0", //menghapus angka
					"lu","loe","lo"," lo","lw","gw","gue","nyokap","bokap","doang" //kamus gaul
				];

				$casefoldinggaul = strtolower($sql); //fungsi casefolding kata gaul
				$cleansing = str_replace($library,"",$sql); // fungsi cleansing
				$casefolding = strtolower ($cleansing); // fungsi casefolding
				if ($koneksi->query($casefolding) === TRUE) {
					echo "Data berhasil ditambahkan";
				} else {
					echo "Error: " . $sql . "<br>" . $koneksi->error;
				}
			}
			?>
			</table>
		</div>
<div class="col-md-6">
	<table class="table table-striped">
		<tr>
			<td style="text-align : center; font-weight: bold;">
				ulasan
			</td>
		</tr>
		<?php
			$sql = 'select * from tb_coba';
			$query = mysqli_query($koneksi,$sql);
			$no=0;
			while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) 
			
			{ //pembuka while
				$no++;
		?>
		<tr>
			<td>
				<?php echo $row['tes'];?>
			</td>
		</tr>
		<?php
			 } //tutup kurawal while
		?>
	</table>
</div>
</body>
</html>