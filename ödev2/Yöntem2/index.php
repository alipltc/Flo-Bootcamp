<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body style="text-align: center;">
<h3>Ürünler</h3>
<?php
//Dizi İçinde Tanımlanan Değişkenler
$ürünler = array(
    ["ürünad"  => "Ülker Çikolatalı Gofret 40 gr.","ürünfiyat" => 10],
    ["ürünad"  => "Eti Damak Kare Çikolata 60 gr.","ürünfiyat" => 20],
    ["ürünad"  => "Nestle Bitter Çikolata 50 gr.","ürünfiyat" => 20]
);
?>
<table align="center" width="50%">
  <tr>
    <th align="start">Ürün Adı</th>
    <th>Ürün Fiyatı</th>
    <th>Adet</th>
  </tr>
  <?php
    //Dizi Değişkenlerinin Tabloda Yazdırılması
    $count = 0;
    foreach($ürünler as $ürün){
    echo "<tr><td align='start'>".$ürün["ürünad"]."</td>";
    echo "<td>".$ürün["ürünfiyat"]." TL.</td>";
    $ürünfiyat = $ürün["ürünfiyat"];
    $ürünadi = $ürün["ürünad"];
    echo "<td><form action='kontrol.php/?ürün=$ürünadi&fiyat=$ürünfiyat' method='POST'>
    <input type='number' name='sayi'>
    <input type='submit' class='square_btn' value='Sepete Ekle'></form>
    </td></tr>";
    }
    ?>
</table><br>
<table align="center" width="50%">
  <tr>
    <th>Ürün Adı</th>
    <th>Adet</th>
    <th>Toplam</th>
  </tr>
  <h3>Sepetim</h3>
  <?php
  $geneltoplam = 0;
  //Session[sepetim] Mevcut İse Dizi İçeriğinin Yazdırılması 
  if(isset($_SESSION["sepetim"])){
    $sepetim = $_SESSION["sepetim"];
    foreach($sepetim as $sepet){
      echo "<tr><td align='start'>".$sepet["ürünad"]."</td>";
      echo "<td>". $sepet["adet"]."</td>";
      echo "<td>". $sepet["toplam"] ." TL</td></tr>";
      $geneltoplam = $geneltoplam + $sepet["toplam"];
    }
    echo "<tr>
    <th colspan='2' align='start' >Genel Toplam</th>
    <th>$geneltoplam TL</th>
    </tr>";
    echo"<tr><th colspan='3'><form action='kontrol.php' method='POST'><input type='submit' class='square_btn' name='temizle' value='Temizle'></th></tr>";
  }
  ?>
</table><br>

</body>
</html>
