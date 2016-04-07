<?php
$link=mysql_connect("localhost", "root", "") or die("Maaf...Tidak dapat koneksi dengan database server."); 
mysql_select_db("nlp", $link) or die("Maaf...Tidak dapat koneksi dengan tabel di database server.");

 
?>