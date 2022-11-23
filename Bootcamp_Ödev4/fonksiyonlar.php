<?php
function Guvenlik($Deger) {
	$BoslukSil		=	trim($Deger);
	$TaglariTemizle	=	strip_tags($BoslukSil);
	$Sonuc			=	htmlspecialchars($TaglariTemizle, ENT_QUOTES);
	return $Sonuc;
}
?>

