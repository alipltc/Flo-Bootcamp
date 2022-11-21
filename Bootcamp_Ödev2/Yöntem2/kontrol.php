<?php
session_start();
function güvenlik($metin){
    $metin = strip_tags($metin);
    $metin = htmlspecialchars($metin);
    return  $metin;
}
$gelenadet      = güvenlik($_POST["sayi"]);
$gelenurun      = güvenlik($_POST["urun"]);
$gelenfiyat     = güvenlik($_POST["fiyat"]);
$temizle        = güvenlik($_POST["temizle"]);
//Temizle Butonu Çalıştıysa Temizleme İşlemi
if($temizle != ""){
    unset($_SESSION["sepetim"]);
    echo "<script>
    window.top.location = 'http://localhost/bootcamp/%C3%96dev2/Y%c3%b6ntem2/index.php';
    </script>";
    die();
}
//Adet Boş veya Sıfır Gelirse
if($gelenadet == "" || $gelenadet == 0){
    echo "<script>
    alert('Lütfen Geçerli Adet Girin');
    window.top.location = 'http://localhost/bootcamp/%C3%96dev2/Y%c3%b6ntem2/index.php';
    </script>";
    die();
}
//Gelen Adet ve Ürünlerin Fiyat Hesaplaması
$toplam = $gelenadet * $gelenfiyat;
$sepet = array(
    "urunad"  => $gelenurun,"adet" => $gelenadet,"toplam" =>$toplam
);
//Sepette Varolan Ürünlerin Güncellenmesi
if(count($_SESSION["sepetim"]) !=0){
    $sayi = count($_SESSION["sepetim"])-1;
    for($sayi;$sayi>=0;$sayi--){
        if($_SESSION["sepetim"][$sayi]["urunad"] == $gelenurun){
            $_SESSION["sepetim"][$sayi]["adet"] += $gelenadet;
            $_SESSION["sepetim"][$sayi]["toplam"] += $toplam;
            echo "<script>
            window.top.location = 'http://localhost/bootcamp/%C3%96dev2/Y%c3%b6ntem2/index.php';
            </script>";
            die();
        }      
    }
    array_unshift($_SESSION["sepetim"],$sepet);
    echo "<script>
    window.top.location = 'http://localhost/bootcamp/%C3%96dev2/Y%c3%b6ntem2/index.php';
    </script>";
}else{//Sepet Hiç Oluşmamışsa Gelen Verilerin Session[sepetim] Dizisine Eklenmesi
    $_SESSION["sepetim"]= array();
    array_push($_SESSION["sepetim"],$sepet);
    echo "<script>
    window.top.location = 'http://localhost/bootcamp/%C3%96dev2/Y%c3%b6ntem2/index.php';
    </script>";
}
;

?>