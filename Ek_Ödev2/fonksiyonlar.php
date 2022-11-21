<?php
function cevherFiyat($ckod){
    if ($ckod == "DMR"){
        return ["Demir",1500];
    } elseif ($ckod == "KRM"){
        return ["Krom",5000];
    } elseif ($ckod == "BKR"){
        return ["Bakır",3000];
    } elseif ($ckod == "KMR"){
        return ["Kömür",500];
    } else {
        return ["Hatalı!",0];
    }
}
function taneEtkisi($tane){
    if ($tane == 1){
        return ["Erik",15];
    } elseif ($tane == 2){
        return ["Portakal",10];
    } elseif ($tane == 3){
        return ["Karpuz",0];
    } else {
        return ["Hatalı!",0];
    }
}
function temizlikEtkisi($fiyat, $temizlik){
    $hesap = ($fiyat * $temizlik)/100;
    $etki = $hesap - $fiyat;
    return $etki;
}
temizlikEtkisi(1500,70);
?>
