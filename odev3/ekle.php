<?php
require_once 'baglan.php';
require_once 'fonksiyonlar.php';
$adsoyad = Guvenlik($_POST["adsoyad"]);
$telefon = Guvenlik(SadeceRakamlarAl($_POST["telefon"]));

if (($adsoyad !="") and ($telefon !="")){
    $sorgu		= $baglan->prepare("INSERT INTO kisiler (adsoyad,telefon) values(?,?)");
    $sorgu->execute([$adsoyad,$telefon]);
	$kontrol 	= $sorgu->rowCount();
    $sorgu->closeCursor(); unset($sorgu);
	if($kontrol>0){
        header("Location:liste.php");
		exit();
    }else{
        echo "İşlem Başarısız";
		exit();
    }
} else {
    header("Location: index.php");
	exit();
}
?>