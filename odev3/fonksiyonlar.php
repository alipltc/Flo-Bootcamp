<?php 
function Guvenlik($Deger) {
	$BoslukSil		=	trim($Deger);
	$TaglariTemizle	=	strip_tags($BoslukSil);
	$Sonuc			=	htmlspecialchars($TaglariTemizle, ENT_QUOTES);
	return $Sonuc;
}
function SadeceRakamlarAl($Deger) {
	$islem	=	preg_replace("/[^0-9]/","",$Deger);
	$sonuc 	=	$islem;
	return $sonuc;
}
function TelefonBicimlendir($Deger) {
	$BoslukSil	=	trim($Deger);
	$Blok1		=	substr($BoslukSil, 0, 4);
	$Blok2		=	substr($BoslukSil, 4, 3);
	$Blok3		=	substr($BoslukSil, 7, 2);
	$Blok4		=	substr($BoslukSil, 9, 2);
	$Sonuc	    =	$Blok1 . " " . $Blok2 . " " . $Blok3 . " " . $Blok4;
	return $Sonuc;
}

?>