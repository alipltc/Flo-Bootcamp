<?php
require_once 'baglan.php';
require_once 'fonksiyonlar.php';
require_once 'class.php';

$adsoyad  = Guvenlik($_POST["adsoyad"]);
$tckimlik = Guvenlik($_POST["tckimlik"]);
if (($adsoyad !="") and ($tckimlik !="")) {
    $kontrol  = new TcKimlik();
    $rakamlar = $kontrol->SadeceRakamlarAl($tckimlik);
    if(strlen($rakamlar)==11){
        $sonuc= $kontrol->TcDogrula($rakamlar);
        if($sonuc != 0){
            $durum = "TC Kimlik Geçerli";
        }else{
            $durum = "TC Kimlik Geçersiz";
        }
        $sorgu = $baglan->prepare("INSERT INTO kisiler values(?,?,?,?)");
        $kayit = $sorgu->execute(array(NULL, $adsoyad,$tckimlik,$durum));
        $sorgu->closeCursor(); unset($sorgu);
        if ($kayit>0) {
            echo "<script>
            alert('Başarılı: Bilgiler Kaydedildi!');
            window.top.location = 'index.php';
            </script>";
        } else {
            echo "<script>
            alert('Başarısız: Kayıt Sırasında Hata Meydana Geldi!');
            window.top.location = 'index.php';
            </script>";
        }
    }else{
       echo "<script>
        alert('Başarısız: Eksik TC Kimlik No!');
        window.top.location = 'index.php';
        </script>"; 
    }
} else {
    echo "<script>
    alert('Başarısız: Lütfen Formdaki Bilgileri Eksiksiz ve Doğru Girin!');
    window.top.location = 'index.php';
    </script>";
}
?>