<?php
session_start();
include "conn.php";
echo "Daftar Kata Hasil Scanning : "; echo "<br><br>";
$kalimat=$_POST['kalimat'];
$arr = explode(" ", $kalimat);

$jumlah=0;

for ($i=0; $i < count($arr); $i++)
{
	$cari_kata = mysql_query("select * from kata_eliminasi");
	while ($hasil_cari_kata = mysql_fetch_array($cari_kata))
	{
		if ($arr[$i]==$hasil_cari_kata['kata'])
		{
			echo "kata yang dieliminasi adalah kata "."'".$arr[$i]."'"; 
			echo "<br>";
			break;
		} else
		{
			$jumlah++;
			$hasil_eliminasi[$jumlah]=$arr[$i];
			break;
		}
	}
}

for($i=1; $i<= $jumlah; $i++)
{
	
	echo $hasil_eliminasi[$i];
	echo "<br><br>";
}

$_SESSION['hasil']=$hasil_eliminasi;
$_SESSION['jumlah']=$jumlah;

?>
<html>
<body>
<form method="post" action="parser.php">
	<input type="submit" value="Parser" onclick=""> </input>
</form>
</html>
</body>
