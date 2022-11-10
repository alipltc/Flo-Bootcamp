<?php
$degerler = array(
    "agil"  => 5,
    "agil_kapasite" => 30,
    "toplam_koyun" => 73
);
$toplam_kapasite    = $degerler["agil_kapasite"] * $degerler["agil"];
echo "Toplam Ağıl: " . $degerler["agil"] . "<br>Toplam Kapasite: " . $toplam_kapasite
 . "<br>Toplam Koyun: " . $degerler["toplam_koyun"] ."<br><br>";
if($degerler["toplam_koyun"] <= $toplam_kapasite){//Koyun Sayısı Kapasiteden Az ve Eşit Olduğu Durum
    for($i = $degerler["agil"];$i>0;$i--){
        if($degerler["toplam_koyun"] >=$degerler["agil_kapasite"]){
            echo $i.". Ağıl: " . $degerler["agil_kapasite"] . " Koyun<br>" ;
            $degerler["toplam_koyun"] -= $degerler["agil_kapasite"];
        }else{
            echo $i.". Ağıl: ".$degerler["toplam_koyun"]." Koyun<br>";
            $degerler["toplam_koyun"] = 0;
        }
    }
}else{//Koyun Sayısı Kapasiteden Fazla Olduğu Durum
    for($i = $degerler["agil"];$i>0;$i--){
        echo $i.". Ağıl: ".$degerler["agil_kapasite"]." Koyun<br>" ;
        $degerler["toplam_koyun"] -= $degerler["agil_kapasite"];
    }
    echo "<br>Dışarıda Kalan: ".$degerler["toplam_koyun"]." Koyun" ;
}
?>

