<?php
$baglan     = new PDO("mysql:host=localhost;dbname=odev3;charset=utf8","alipltc","12345678Wq");
$sorgu      = $baglan->prepare("SELECT * FROM kisiler");
$sorgu->execute();
$kisisayisi = $sorgu->rowCount();
$kisiler    = $sorgu->fetchAll(PDO::FETCH_ASSOC);
function TelefonBicimlendir($Deger){
	$BoslukSil	=	trim($Deger);
	$Blok1		=	substr($BoslukSil, 0, 4);
	$Blok2		=	substr($BoslukSil, 4, 3);
	$Blok3		=	substr($BoslukSil, 7, 2);
	$Blok4		=	substr($BoslukSil, 9, 2);
	$Sonuc	    =	$Blok1 . " " . $Blok2 . " " . $Blok3 . " " . $Blok4;
	return $Sonuc;
}

if(isset($_GET["id"])){
    $gelenid    = $_GET["id"];
    $sorgu      = $baglan->prepare("DELETE FROM kisiler WHERE id=$gelenid");
    $sorgu->execute();
    $kontrol    = $sorgu->rowCount();
    if($kontrol>0){
        header("Location:liste.php");
        exit();
    }else{
        echo "İşlem Başarısız";
        exit();
    }
}
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
    <div class="col-md-12 mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col-4" >Adı Soyadı</th>
                <th scope="col-4" >Telefon Numarası</th>
                <th scope="col-4" >İşlem</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($kisiler as $kisi){
                        $telefon = TelefonBicimlendir($kisi["telefon"]);
                        echo "<tr><td>$kisi[adsoyad]</td>
                        <td>$telefon</td>
                        <td><a href='liste.php?id=$kisi[id]' onclick=\"if (!confirm('Bu Kişiyi Silmek İstediğinize Emin misiniz?')) return false;\" class='text-decoration-none'>Sil</a></td></tr>";
                    }     
                ?>
                <tr><td colspan="3"><?php echo "Sistemde Toplam -$kisisayisi- Kayıt Var.";?></td></tr>
            </tbody>
        </table> 
        <a href="index.php">Ekle Sayfasına Dön <-</a>   
    </div>
    </div>       
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
