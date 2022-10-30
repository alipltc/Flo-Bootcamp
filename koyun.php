<?php
$agil               = 5;
$agil_kapasite      = 30;
$toplam_kapasite    = $agil_kapasite  * $agil;
$toplam_koyun       = 73;
echo "Toplam Ağıl: $agil<br>Toplam Kapasite: $toplam_kapasite<br>Toplam Koyun: $toplam_koyun<br><br>";
if($toplam_koyun <= $toplam_kapasite){//Koyun Sayısı Kapasiteden Az ve Eşit Olduğu Durum
    for($i = $agil;$i>0;$i--){
        if($toplam_koyun >=30){
            echo $i.". Ağıl: $agil_kapasite Koyun<br>" ;
            $toplam_koyun -= 30;
        }else{
            echo $i.". Ağıl: $toplam_koyun Koyun<br>";
            $toplam_koyun = 0;
        }
    }
}else{//Koyun Sayısı Kapasiteden Fazla Olduğu Durum
    for($i = $agil;$i>0;$i--){
        echo $i.". Ağıl: $agil_kapasite Koyun<br>" ;
        $toplam_koyun -= 30;
    }
    echo "<br>Dışarıda Kalan: $toplam_koyun Koyun" ;
}
?>

