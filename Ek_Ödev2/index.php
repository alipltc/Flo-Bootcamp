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
            <h3>Maden Fatura Hesaplama</h3>
        <div class="col-md-3 mt-3">
            <form action="index.php" method="POST">
                <div class="mb-2 text-center">
                    <label for="adsoyad" class="form-label">Müşteri Adı Soyadı:</label>
                    <input type="text" class="form-control" name="adsoyad" id="adsoyad">
                </div>
                <div class="mb-2 text-center">
                    <label for="ckod" class="form-label">Cevher Kodu:</label>
                    <input type="text" class="form-control" name="ckod" id="ckod">
                </div>
                <div class="mb-2 text-center">
                    <label class="form-label">Tane Büyüklüğü:</label>
                    <select class="form-select" name="tane" aria-label="Default select example">
                    <option value="1">1 (Erik)</option>
                    <option value="2">2 (Portakal)</option>
                    <option value="3">3 (Karpuz)</option>
                    </select>
                </div>
                <div class="mb-2 text-center">
                    <label for="temizlik" class="form-label">Temizlik Oranı:</label>
                    <input type="number" class="form-control" name="temizlik" id="temizlik">
                </div>
                <div class="mb-2 text-center">
                    <label for="miktar" class="form-label">Miktar (Ton):</label>
                    <input type="text" class="form-control" name="miktar" id="miktar">
                </div>
                <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">Hesapla</button>
                <button type="reset" class="btn btn-secondary">Form Temizle</button>
                </div>
                
            </form>
        
        <?php
        if($_POST){
            $adsoyad = $_POST["adsoyad"];
            $ckod    = $_POST["ckod"];
            $tanetip = (int)$_POST["tane"];
            $miktar  = (int)$_POST["miktar"];
            $temizlik= (int)$_POST["temizlik"];
            if ( ($adsoyad !="") and ($ckod !="") and ($tanetip !="") and ($miktar !="") and ($temizlik !="")){
                $brfiyat   = cevherFiyat($ckod);
                $tane      = taneEtkisi($tanetip);
                $tanefiyat = $brfiyat[1] - (($brfiyat[1]*$tane[1])/100);
                $tem_etki  = temizlikEtkisi($tanefiyat, $temizlik);
                $netfiyat  = $tanefiyat + $tem_etki;
                $toplam    = $netfiyat * $miktar;
                $kdv       = $toplam * 0.08;
                $gnltoplam = $kdv + $toplam;
                echo "<div class='col-md-12 mt-2 border'>***********Fatura***********<br>";
                echo "Alıcı: $adsoyad<br>";
                echo "Cevher Türü: $brfiyat[0]<br>";
                echo "Normal Birim Fiyat: $brfiyat[1] TL<br>";
                echo "Tane: $tane[0] (-%$tane[1]) <br>";
                echo "$tane[0] Fiyat: $tanefiyat TL<br>";
                echo "Temizlik: %$temizlik, Etkisi: $tem_etki Etkisi<br>";
                echo "Temizlik Etkisi Sonrası<br>";
                echo "Birim Fiyat: $netfiyat TON/TL<br>";
                echo "Toplam: $toplam TL<br>";
                echo "KDV (%8):  $kdv <br>";
                echo "Genel Toplam: $gnltoplam TL<br><br>";
                echo "Mega Madencilik, 2016<br>";
                echo "****************************<br>";
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
