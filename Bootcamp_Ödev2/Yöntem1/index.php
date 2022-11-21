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
$urunler = array(
    ["urunad"  => "Ülker Çikolatalı Gofret 40 gr.","urunfiyat" => 10],
    ["urunad"  => "Eti Damak Kare Çikolata 60 gr.","urunfiyat" => 20],
    ["urunad"  => "Nestle Bitter Çikolata 50 gr.","urunfiyat" => 20]
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
  foreach($urunler as $urun){
  ?>
  <tr>
    <td align="start"><?php echo $urun["urunad"] ?></td>
    <td><?php echo $urun["urunfiyat"] ?> TL.</td>
    <td><input type="number" name="urun[]" value=0></td>
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
        echo "<tr><td align='start'>".$urunler[$count]["urunad"]."</td>";
        echo "<td>". $sepet ."</td>";
        $toplam = $urunler[$count]["urunfiyat"] * $sepet;
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
