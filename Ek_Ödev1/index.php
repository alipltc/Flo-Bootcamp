<?php
require 'fonksiyonlar.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center">
        <div class="row justify-content-md-center">
        <div class="col-md-3 mt-5">
            <form action="index.php" method="POST">
                <div class="mb-3 text-center">
                    <label for="tur" class="form-label">Ürün Türü:</label>
                    <input type="text" class="form-control" name="tur" id="tur">
                </div>
                <div class="mb-3 text-center">
                    <label for="miktar" class="form-label">Ürün Miktarı:</label>
                    <input type="number" class="form-control" name="miktar" id="miktar">
                </div>
                <div class="mb-3 text-center">
                    <label for="miktar" class="form-label">Tazelik Durumu:</label>
                    <select class="form-select" name="tazemi" aria-label="Default select example">
                    <option value="1" selected>Taze</option>
                    <option value="2">Taze Değil</option>
                    </select>
                </div>               
                <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">Hesapla</button>
                <button type="reset" class="btn btn-secondary">Form Temizle</button>
                </div>
            </form>
        
        <?php
        if($_POST){
            $tur    = $_POST["tur"];
            $miktar = (int)$_POST["miktar"];
            $tazemi = (int)$_POST["tazemi"];
            if ( ($tur !="") and ($miktar !="") and ($tazemi !="")){
                $brfiyat = birimFiyat($tur);
                $tutar   = $brfiyat * $miktar;
                $tzetki  = tazeHesap($tur, $tazemi, $tutar);
                $aratop  = $tutar - $tzetki;
                $kdv     = $aratop * 18 / 100;
                $toplam  = $aratop + $kdv;
                echo "<div class='col-md-12 mt-5 border'>**********Fatura**********<br>";
                echo "İşlem Tutarı: $tutar TL<br>";
                echo "Tazelik Etkisi: $tzetki TL<br>";
                echo "Ara Toplam: $aratop TL<br>";
                echo "KDV (%18): $kdv TL<br>";
                echo "***************************<br>";
                echo "Genel Toplam: $toplam TL<br>";
                echo "<a href='index.php'>Temizle</a></div>";
            } else {
                header("location:index.php");
            }
            
        }
        ?>
        </div>
        </div>       
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
