<?php
include "conn.php";

session_start();
$hasil_eliminasi=$_SESSION['hasil'];
$jumlah=$_SESSION['jumlah'];
$tampung="";
echo "Daftar Kata Hasil Parsing : "; echo "<br>";

for($i=1; $i<= $jumlah; $i++)
{
	$ketemu=false; //dimisalkan bahwa belum ditemukan
	//cek kata kerja
	$cari_k1 = mysql_query("select * from kata_kerja");
	if (!$ketemu)
	while ($hasil_cari_k1 = mysql_fetch_array($cari_k1))
	{
		if ($hasil_eliminasi[$i]==$hasil_cari_k1['kata'])
		{
			$tampung=$tampung."[kata_kerja]";
			$ketemu=true;
			break;
		}
	}
	
	//cek kata benda
	$cari_k1 = mysql_query("select * from kata_benda");
	if (!$ketemu)
	while ($hasil_cari_k1 = mysql_fetch_array($cari_k1))
	{
		if ($hasil_eliminasi[$i]==$hasil_cari_k1['kata'])
		{
			$tampung=$tampung."[kata_benda]";
			$ketemu=true;
			break;
		}
	}

	//cari judul
	$cari_k1 = mysql_query("select * from judul_buku");
	if (!$ketemu)
	while ($hasil_cari_k1 = mysql_fetch_array($cari_k1))
	{
		if ($hasil_eliminasi[$i]==$hasil_cari_k1['judul'])
		{
			$tampung=$tampung."[judul]";
			$ketemu=true;
			break;
		}
	}
	//cari penerbit
	$cari_k1 = mysql_query("select * from penerbit");
	if (!$ketemu)
	while ($hasil_cari_k1 = mysql_fetch_array($cari_k1))
	{
		if ($hasil_eliminasi[$i]==$hasil_cari_k1['nama'])
		{
			$tampung=$tampung."[penerbit]";
			$ketemu=true;
			break;
		}
	}
	
	//cari pengarang
	$cari_k1 = mysql_query("select * from pengarang");
	if (!$ketemu)
	while ($hasil_cari_k1 = mysql_fetch_array($cari_k1))
	{
		if ($hasil_eliminasi[$i]==$hasil_cari_k1['nama'])
		{
			$tampung=$tampung."[pengarang]";
			$ketemu=true;
			break;
		}
	}
	
	//cari tahun
	$cari_k1 = mysql_query("select * from operator_tahun");
	if (!$ketemu)
	while ($hasil_cari_k1 = mysql_fetch_array($cari_k1))
	{
		if ($hasil_eliminasi[$i]==$hasil_cari_k1['tahun'])
		{
			$tampung=$tampung."[operator_tahun]";
			$ketemu=true;
			break;
		}
	}
	//cek kata attribut
	$cari_k1 = mysql_query("select * from atribut");
	if (!$ketemu)
	while ($hasil_cari_k1 = mysql_fetch_array($cari_k1))
	{
		if ($hasil_eliminasi[$i]==$hasil_cari_k1['att'])
		{
			$tampung=$tampung."[atribut]";
			$ketemu=true;
			break;
		}
	}
	//cek kata sambung
	$cari_k1 = mysql_query("select * from kata_sambung");
	if (!$ketemu)
	while ($hasil_cari_k1 = mysql_fetch_array($cari_k1))
	{
		if ($hasil_eliminasi[$i]==$hasil_cari_k1['kata'])
		{
			$tampung=$tampung.'[kata_sambung]';
			$ketemu=true;
			break;
		}
	}
}

echo $tampung;
$query_pola=mysql_query("Select * from pola where keterangan="."'".$tampung."'");

while ($hasil_pola=mysql_fetch_array($query_pola))
{
	echo $hasil_pola['kode_pola'];
}

?>