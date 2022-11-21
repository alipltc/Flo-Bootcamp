<?php
function birimFiyat($tur){
    if ($tur == "kekik"){
        $kekik    = 50;
        return $kekik;
    } elseif ($tur == "nane"){
        $nane     = 75;
        return $nane;
    } elseif ($tur == "fesleğen"){
        $feslegen = 100;
        return $feslegen;
    } elseif ($tur == "reyhan"){
        $reyhan   = 90;
        return $reyhan;
    } else {
        return 0;
    }
}
function tazeHesap($tur, $tazemi, $tutar){
    if($tazemi == 1){
        return 0;
    }
    if ($tur == "kekik"){
        return $tutar * 10 / 100;
    } elseif ($tur == "nane"){
        return $tutar * 20 / 100;
    } elseif ($tur == "fesleğen"){
        return $tutar * 20 / 100;
    } elseif ($tur == "reyhan"){
        return $tutar * 20 / 100;
    }
}

?>
