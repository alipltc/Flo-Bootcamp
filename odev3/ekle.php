<?php
function Guvenlik($Deger){
	$BoslukSil		=	trim($Deger);
	$TaglariTemizle	=	strip_tags($BoslukSil);
	$Sonuc			=	htmlspecialchars($TaglariTemizle, ENT_QUOTES);
	return $Sonuc;
}
function SadeceRakamlarAl($Deger){
	$islem	=	preg_replace("/[^0-9]/","",$Deger);
	$sonuc 	=	$islem;
	return $sonuc;
}
$baglan = new PDO("mysql:host=localhost;dbname=odev3;charset=utf8","alipltc","12345678Wq");

$adsoyad = Guvenlik($_POST["adsoyad"]);
$telefon = Guvenlik(SadeceRakamlarAl($_POST["telefon"]));

if(($adsoyad !="") and ($telefon !="")){
    $sorgu		= $baglan->prepare("INSERT INTO kisiler (adsoyad,telefon) values(?,?)");
    $sorgu->execute([$adsoyad,$telefon]);
	$kontrol 	= $sorgu->rowCount();
	if($kontrol>0){
        header("Location:liste.php");
		exit();
    }else{
        echo "İşlem Başarısız";
		exit();
    }
}else{
    header("Location: index.php");
	exit();
}
?>