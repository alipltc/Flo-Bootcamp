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
<!-- Ürünler Tablosu Başlangıç -->
<table align="center" width="50%">
<form action="kontrol.php" method="POST">
  <tr>
    <th align="start">Ürün Adı</th>
    <th>Ürün Fiyatı</th>
    <th>Ürün Fiyatı</th>
  </tr>
  <?php
  foreach($ürünler as $ürün){
  ?>
  <tr>
    <td align="start"><?php echo $ürün["ürünad"] ?></td>
    <td><?php echo $ürün["ürünfiyat"] ?> TL.</td>
    <td><input type="number" name="ürün[]" value=0></td>
  </tr> 
  <?php
  }
  ?>
</table><br>
<input type="submit" class="square_btn" value="Ürünü Sepete Ekle">
</form>
<!-- Ürünler Tablosu Bitiş -->
<h3>Sepetim</h3>
<!-- Sepetim Tablosu Başlangıç -->
<table align="center" width="50%">
  <tr>
    <th align="start">Ürün Adı</th>
    <th>Adet</th>
    <th>Toplam</th>
  </tr>
  <?php
  $geneltoplam = 0;
  //Session[sepetim] Mevcut İse Dizi İçeriğinin Yazdırılması 
  if(isset($_SESSION["sepetim"])){
    $sepetim = $_SESSION["sepetim"];
    $count   = 0;
    foreach($sepetim as $sepet){
      if($sepet !=0){
        echo "<tr><td align='start'>".$ürünler[$count]["ürünad"]."</td>";
        echo "<td>". $sepet ."</td>";
        $toplam = $ürünler[$count]["ürünfiyat"] * $sepet;
        echo "<td>$toplam</td></tr>";
        $geneltoplam = $geneltoplam + $toplam;
      }
      $count++;
    }
    echo "<tr>
    <th colspan='2' align='start'>Genel Toplam</th>
    <th>$geneltoplam TL</th>
    </tr>";
    echo"<tr><th colspan='3'><form action='kontrol.php' method='POST'><input type='submit' class='square_btn' name='temizle' value='Temizle'></th></tr>";
  }
  ?>
</table>
<!-- Sepetim Tablosu Bitiş -->

</body>
</html>
