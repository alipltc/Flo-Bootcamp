<?php
session_start();
require_once 'Ayarlar/baglan.php';
require_once 'Ayarlar/fonksiyonlar.php';
require_once 'Ayarlar/class.php';

if (isset($_POST["email"])){
    $email = Guvenlik($_POST["email"]);
} else {
    $email = "";
}
if (isset($_POST["sifre"])){
    $sifre = Guvenlik($_POST["sifre"]);
    $md5sifre = md5($sifre);
} else {
    $sifre = "";
}
if (isset($_GET["islem"])){
    $islem = Guvenlik($_GET["islem"]);
} else {
    $islem = "";
}

//Yetkili Session İşlemi
if (!isset($_SESSION["Yetkili"])) {
    if (($email !="") and ($sifre != "")){
        $sorgu = $baglan->prepare("SELECT * FROM yetkililer WHERE Email = ? AND Sifre = ?");
        $sorgu->execute([$email,$md5sifre]);
        $kontrol = $sorgu->rowCount();
        $yetkili = $sorgu->fetch(PDO::FETCH_ASSOC);
        $sorgu->closeCursor(); unset($sorgu);
        if ($kontrol>0) {
            if($yetkili["Durum"] == 1){
                $_SESSION["Yetkili"] = $email;
                $log = new Log();
                $log->add("Oturum Açma İşlemi Başarılı $email");
                header("location: index.php");
                exit();
            } else {
                $log = new Log();
                $log->add("Oturum Açma İşlemi Başarısız Hesap = [$email]");
                header("location: login.php");
                exit(); 
            }     
        } else {
            $log = new Log();
            $log->add("Oturum Açma İşlemi Başarısız Hesap = [$email]");
            header("location: login.php");
            exit();
        }
    } else {
        $log = new Log();
        $log->add("Oturum Açma İşlemi Başarısız Hesap = [$email]");
        header("location: login.php");
        exit();
    }
}

//Dil Seçenek
if (isset($_GET["dil"])) {
    $dil = Guvenlik($_GET["dil"]);
    if ($dil == "tr" || $dil == "en") {
        $_SESSION["dil"] = $dil;
        header("location: index.php");
    } else {
        header("location: index.php");
    }
}

//Ekleme İşlemi
if ($islem == "ekle") {
    $adsoyad        = Guvenlik($_POST["adsoyad"]);
    $email2         = Guvenlik($_POST["email2"]);
    $vergidairesi   = Guvenlik($_POST["vergidairesi"]);
    $verginumarasi  = Guvenlik($_POST["verginumarasi"]);
    $gelir          = Guvenlik($_POST["gelir"]);
    $telefon        = Guvenlik($_POST["telefon"]);
    $cinsiyet       = Guvenlik($_POST["cinsiyet"]);
    $image			= $_FILES["image"];
    if ($image["size"] == 0) {
        $imagename  = "default.jpg";
    } else {
        $imagename  = $image["name"];
        $tmpname    = $image["tmp_name"];
        $folder     = "assets/img/";
        move_uploaded_file($tmpname,$folder.$imagename);
    }
    if (!isset($_POST["durum"])) {
        $durum = "0";
    } else {
        $durum = "1";
    }
    $degerler = array($adsoyad,$email2,$vergidairesi,$verginumarasi,$gelir,$telefon,$imagename,$cinsiyet,$durum,$ZamanDamgasi,$IPAdresi);
    $musteri  = new musteri();
    $kayit    = $musteri->kaydet($degerler,$baglan);
    $mesaj    = $musteri->mesaj();
    $log = new Log();
    $log->add("Ekleme İşlemi $mesaj");
    header("location: yeniekle.php?mesaj=$mesaj");
    exit();
}

//Güncelleme İşlemi
if ($islem == "guncelle") {
    $id = (int)$_GET["id"];
    $adsoyad        = Guvenlik($_POST["adsoyad"]);
    $email2         = Guvenlik($_POST["email2"]);
    $vergidairesi   = Guvenlik($_POST["vergidairesi"]);
    $verginumarasi  = Guvenlik($_POST["verginumarasi"]);
    $gelir          = Guvenlik($_POST["gelir"]);
    $telefon        = Guvenlik($_POST["telefon"]);
    $cinsiyet       = Guvenlik($_POST["cinsiyet"]);
    $mevcut         = $_POST["mevcut"];
    $image			= $_FILES["image"];
    
    if ($image["size"] == 0) {
        $imagename  = $mevcut;
    } else {
        $imagename  = $image["name"];
        $tmpname    = $image["tmp_name"];
        $folder     = "assets/img/";
        move_uploaded_file($tmpname,$folder.$imagename);
    }
    if (!isset($_POST["durum"])) {
        $durum = "0";
    } else {
        $durum = "1";
    }
    $degerler = array($adsoyad,$email2,$vergidairesi,$verginumarasi,$gelir,$telefon,$imagename,$cinsiyet,$durum,$id);
    $musteri  = new musteri();
    $guncelle = $musteri->guncelle($degerler,$baglan);
    $mesaj    = $musteri->mesaj();
    $log = new Log();
    $log->add("Güncelleme İşlemi $mesaj id=$id");
    header("location: guncelle.php?mesaj=$mesaj&id=$id");
    exit();
}

//Silme İşlemi
if ($islem == "sil") {
    $id = (int)$_GET["id"];
    $musteri  = new musteri();
    $sil      = $musteri->sil($id,$baglan);
    $mesaj    = $musteri->mesaj();
    $log = new Log();
    $log->add("Silme İşlemi $mesaj id=$id");
    echo "<script>
    alert('Silme İşlemi $mesaj!');
    window.top.location = 'http://localhost/crm/index.php';
    </script>";
    exit();
}

//Export İşlemi
if ($islem == "export") {
    $sorgu = $baglan->prepare("SELECT * FROM musteriler ORDER BY id ASC");
    $sorgu->execute();
    $kontrol=	$sorgu->rowCount();
    if ($kontrol > 0) { 
        $ayrac    = ","; 
        $dosya    = "musteriler_" . date('Y-m-d') . ".csv"; 
        // Dosya Aç
        $f = fopen('php://memory', 'w'); 
        // Başlık Alanları Ekleme
        $alanlar = array('ID', 'AD SOYAD', 'EMAIL', 'VERGİ DAİRESİ', 'VERGİ NUMARASI', 'TELEFON', 'CİNSİYET', 'KAYIT TARİHİ', 'DURUM'); 
        fputcsv($f, $alanlar, $ayrac); 
        
        //Veriler Al,CSV Biçimlendir ve Yaz
        $sayi = 1;
        while($satir = $sorgu->fetch(PDO::FETCH_ASSOC)){ 
            $durum = ($satir["Durum"] == 1)?'Aktif':'Aktif Değil'; 
            $satirveri = array($sayi, $satir["AdSoyad"], $satir["Email"], $satir["VergiDairesi"], $satir["VergiNumarasi"], $satir["Telefon"], $satir["Cinsiyet"], Tarih($satir["KayitTarihi"]), $durum);
            fputcsv($f, $satirveri, $ayrac); 
            $sayi++;
        }  
        // Dosya Başına Dön 
        fseek($f, 0);  
        // Contentleri Ayarla 
        header('Content-Type: text/csv; charset=utf-8'); 
        header('Content-Disposition: attachment; filename="' . $dosya . '";');
        ob_end_clean();
        // Tüm Verileri Yazdır 
        fpassthru($f); 
    } 
    exit(); 
}

//Çıkış İşlemi
if ($islem == "cikis") {
    unset($_SESSION["Yetkili"],$_SESSION["dil"]);
    header("Location: login.php");
}

?>