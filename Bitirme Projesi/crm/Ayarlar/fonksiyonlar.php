<?php
$IPAdresi			=	$_SERVER["REMOTE_ADDR"];
$ZamanDamgasi		=	time();

//Güvenlik Fonksiyonu
function Guvenlik($Deger) {
	$BoslukSil		=	trim($Deger);
	$TaglariTemizle	=	strip_tags($BoslukSil);
	$Sonuc			=	htmlspecialchars($TaglariTemizle, ENT_QUOTES);
	return $Sonuc;
}

//Tarih Biçimlendirme
function Tarih($Deger){
	$Tarih			=	date("d.m.Y", $Deger);
	return $Tarih;
}// "d.m.Y H:i:s" Saat,dakika ve saniye için

function active($currect_page) {
    $url = $_SERVER['REQUEST_URI'];

    if(strstr($url,$currect_page)){
        echo "active";
    } else {
		echo "collapsed";
	}
}

//PDF Türkçe Karakter
function turkce($k)
{
    return iconv('utf-8','iso-8859-9',$k);
}

//Bloklu Telefon Biçimlendirme
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

