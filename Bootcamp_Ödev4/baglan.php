<?php
$host     = "localhost";
$dbname   = "odev4";
$kullanici= "alipltc";
$sifre    = "12345678Wq";
try {
  $baglan = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8","$kullanici","$sifre");
  $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch ( PDOException $e ) {
  echo "Bağlantı hatası: " . $e->getMessage();
}
?>