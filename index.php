<?php
error_reporting(E_ALL & ~E_NOTICE);
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
	<center>
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
					<!-- <td><a href="tambahdata.php" role="button" class="btn btn-default">Tambah Data</a></td> -->
					
					<td rowspan="3" colspan="2">
						<?php if (isset($_POST['proses'])): ?>
						<textarea style="height: 170px;" class="form-control" rows="3" name="ulasan" id="ulasan"><?php echo $_POST['ulasan'];?> </textarea>
						<?php else: ?>
							<textarea style="height: 170px;" class="form-control" rows="3" name="ulasan" id="ulasan"></textarea>
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<td><a href="ulasanpositif.php" role="button" class="btn btn-default">Kumpulan Positif</a></td>
				</tr>
				<tr>
					<td><a href="ulasannegatif.php" role="button" class="btn btn-default">Kumpulan Negatif</a></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input name="proses" type="submit" class="btn btn-block btn-primary" value="Proses">
					</td>
					<td>
						<a href="index.php"><input class="btn btn-block btn-primary" value="Reset"/></a>
					</td>
				</tr>
			<?php
			if (isset($_POST['proses'])) {

				
				$library = [

					".",",","<",">","/","?",";",":","`","~","!","@","#","$","%","^","&","*","-","+","=","\"","\'","(", //menghapus karakter
					"1","2","3","4","5","6","7","8","9","0", //menghapus angka
					"lu"," lu","loe","lo"," lo","lw","gw","gue","nyokap","bokap","doang","varokah",
					"igo","wtf","php","rempong","unyu","pm","oot"//kamus gaul
				];

				$singkatan = [
				'yg'=>'yang',
				'yng'=>'yang',
				'yag'=>'yang',
				'bgs'=>'bagus',
				'bags'=>'bagus',
				'bgus'=>'bagus',
				'benr'=>'benar',
				'bner'=>'bener',
				'bnar'=>'benar',
				'bnr'=>'benar',
				'njir'=>'anjing',
				'anjir'=>'anjing',
				'ajg'=>'anjing',
				'anj'=>'anjing',
				'anjeng'=>'anjing',
				'anjg'=>'anjing',
				'njing'=>'anjing',
				'ajg'=>' anjing',
				'gak'=>' tidak',
				'ngak'=>'tidak',
				'gk'=>' tidak',
				'ngga'=>'tidak',
				'nggak'=>'tidak',
				'tdk'=>'tidak',
				'tdak'=>'tidak',
				'tidk'=>'tidak',
				'suda'=>'sudah',
				'sdh'=>'sudah',
				'sdah'=>'sudah',
				'sudh'=>'sudah',
				'udh'=>'sudah',
				'udah'=>'sudah',
				'dah'=>'sudah',
				'ak'=>'aku',
				'enk'=>'enak',
				'lg'=>'lagi',
				'lgi'=>'lagi',
				'sampe'=>'sampai',
				'smpe'=>'sampai',
				'smpai'=>'sampai',
				'dgn'=>'dengan',
				'dngan'=>' dengan',
				'dengn'=>' dengan',
				'pd'=>' pada',
				'pda'=>' pada',
				'bkn'=>' bukan',
				'bukn'=>' bukan',
				'bkan'=>' bukan',
				'dlu'=>' dulu',
				'dl'=>' dulu',
				'sante'=>' santai',
				'santay'=>' santai',
				'blm'=>' belum',
				'blum'=>' belum',
				'belm'=>' belum',
				'sya'=>' saya',
				'pdhl'=>' padahal',
				'pdhal'=>' padahal',
				'padhal'=>' padahal',
				'padhl'=>' padahal',
				'pdahal'=>' padahal',
				'skrg'=>' sekarang',
				'skrang'=>' sekarang',
				'sekrang'=>' sekarang',
				'skarang'=>' sekarang',
				'mw'=>' mau',
				'byk'=>' banyak',
				'banyk'=>' banyak',
				'bnyak'=>' banyak',
				'koneksinya'=>'koneksi',
				'kdg'=>' kadang',
				'kdang'=>' kadang',
				'kadng'=>' kadang',
				'karna'=>' karena',
				'krna'=>' karena',
				'krena'=>' karena',
				'lag'=>' patah',
				'ngelag'=>' patah',
				'nglag'=>' patah',
				'bgt'=>' banget',
				'bnget'=>' banget',
				'bangt'=>' banget',
				'bug'=>'masalah',
				'gx'=>'tidak',
				'skali'=>'sekali',
				'skli'=>'sekali',
				'terimakasi'=>'terimakasih'
				];

				$keysing = array_keys($singkatan);

				$ulasan = $_POST['ulasan'];
				$casefoldinggaul = strtolower($ulasan); //fungsi casefolding kata gaul
				$cleansing = str_replace($library,"",$ulasan); // fungsi cleansing
				$casefolding = strtolower ($cleansing); // fungsi casefolding all
				$katatunggal = explode(" ",$casefolding);
				$apos = 0.5;
				$aneg = 0.5;
					foreach($katatunggal as $i => $kata){
						if (strlen($kata) > 0){
							// Cek Singkatan
							if( in_array($kata, $keysing)){
								$kata = $singkatan[$kata];
							}
							//echo $kata ."<br>";
							//simpan($koneksi,$kata);
							// skor positif
							$spos = analisapositif($koneksi,$kata);
							if($spos > 0 || $spos != null ){
							 $apos*=$spos;	
							}else{
								$apos*=1;
							}
							
							// skor negatif
							$sneg = analisanegatif($koneksi,$kata);
							if($sneg > 0 || $sneg !=null ){
								$aneg*=$sneg;
							}else{
								$aneg*=1;
							}

							$datanormalisasi = ['ulasan'=>$_POST['ulasan'] , 'positif'=>$apos , 'negatif'=>$aneg];
							
						}else{
							continue;
						}

					}
					// simpan ke tb_normalissi
					simpanNormalisasi($koneksi,$datanormalisasi);
				?>
				<tr>
					<td>&nbsp;</td>
					<td>
						<?php
						if($apos > $aneg){
							echo "<b> Positif : $apos</b>";
						}else if{
							echo "Positif : " .$apos;
						}else{
							echo "<b> Netral";
						}
						?>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<?php
						if($aneg > $apos){
							echo "<b> Negatif : $aneg</b>";
						}else if{
							echo "Negatif : " .$aneg;
						}else{
							echo "<b> Netral";
						}
						?>
					</td>
				</tr>
			</form>
			</table>
			<?php
			}

function simpan($con,$kata){

	//$sql = "INSERT INTO tb_coba (tes) VALUES ($kata)";
	$kata = addslashes($kata);
	$sql = "INSERT INTO tb_coba SET tes='$kata'";

	if ($con->query($sql) == TRUE) 
	{
		echo "Data berhasil ditambahkan";
	}else{
		echo "DATA ERROR: " .$sql. "<br>" .$con->error;
	}

}

function analisapositif($koneksi,$kata){
	$sql = "SELECT positif FROM tb_kata WHERE kata = '$kata'";
	$result = $koneksi->query($sql);
	while($result->num_rows > 0){
		$row = $result->fetch_assoc();
		return $row['positif'];
	}
}

function analisanegatif($koneksi,$kata){
	$sql = "SELECT negatif FROM tb_kata WHERE kata = '$kata'";
	$result = $koneksi->query($sql);
	while($result->num_rows > 0){
		$row = $result->fetch_assoc();
		return $row['negatif'];
	}
}

function simpanNormalisasi($koneksi , $data){
	
	$sql = "INSERT INTO tb_normalisasi SET ulasantesting = '".addslashes($data['ulasan'])."' , positif='{$data['positif']}' , negatif='{$data['negatif']}' ";
	if ($koneksi->query($sql) == TRUE) 
	{
		echo "Data berhasil ditambahkan";
	}else{
		echo "DATA ERROR: " .$sql. "<br>" .$koneksi->error;
	}
}
			?>
			
		</div>
<!-- <div class="col-md-6">
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
</div> --> 
</center>
</body>
</html>
