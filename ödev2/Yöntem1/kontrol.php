<?php
session_start();
$gelenadet = $_POST["ürün"];
$temizle   = $_POST["temizle"];
//Temizle Butonu Çalıştıysa Temizleme İşlemi ve Session Test
if($temizle != ""){
    unset($_SESSION["sepetim"]);
    echo "<script>
    window.top.location = 'http://localhost/bootcamp/%c3%96dev2/Y%c3%b6ntem1/index.php';
    </script>";
    die();
}
if(isset($_SESSION["sepetim"])){
    $sayi = count($_SESSION["sepetim"])-1;
    for($sayi;$sayi>=0;$sayi--){
        $_SESSION["sepetim"][$sayi] += $gelenadet[$sayi];
    }
    echo "<script>
    window.top.location = 'http://localhost/bootcamp/%c3%96dev2/Y%c3%b6ntem1/index.php';
    </script>";     
    
}else{
    $_SESSION["sepetim"]=array();
    foreach($gelenadet as $adet){
        array_push($_SESSION["sepetim"],$adet);
    }
    echo "<script>
    window.top.location = 'http://localhost/bootcamp/%c3%96dev2/Y%c3%b6ntem1/index.php';
    </script>";
}

?>
