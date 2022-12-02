<?php
session_start();
require_once 'fpdf/fpdf.php';
require_once 'Ayarlar/baglan.php';
require_once 'Ayarlar/fonksiyonlar.php';
if(isset($_SESSION["Yetkili"])){
    $id         = (int)$_GET["id"];
    $sorgu		= $baglan->prepare("SELECT * FROM musteriler WHERE id=?");
    $sorgu->execute([$id]);
    $kontrol	= $sorgu->rowCount();
    $musteri    = $sorgu->fetch(PDO::FETCH_ASSOC);
    $sorgu->closeCursor(); unset($sorgu);
    if($kontrol>0){
      $musteri_email	    =	$musteri["Email"];
      $musteri_adsoyad      =	$musteri["AdSoyad"];
      $musteri_telefon      =	TelefonBicimlendir($musteri["Telefon"]);
      $musteri_vergidairesi =	$musteri["VergiDairesi"];
      $musteri_verginumarasi=	$musteri["VergiNumarasi"];
      $musteri_cinsiyet     =	$musteri["Cinsiyet"];
      $musteri_kayittarihi  =	Tarih($musteri["KayitTarihi"]);
      $musteri_resim        =	$musteri["Resim"];
      $musteri_durum	    =	$musteri["Durum"];
      $musteri_gelir        =	$musteri["GelirDuzeyi"];
    } else {
        echo "<script>
        alert('İşlem Sırasında Hata Oluştu');
        window.top.location = 'http://localhost/bootcamp/crm/index.php';
        </script>";
    }
} else {
    echo "<script>
    window.top.location = 'http://localhost/bootcamp/crm/index.php';
    </script>";
}

$pdf = new FPDF();

$pdf->AddFont('arial_tr','','arial_tr.php');
$pdf->AddFont('arial_tr_bold','','arial_tr_bold.php');
$pdf->AddPage('P','A4');
$pdf->SetFont('arial_tr_bold','',16);
// Logo
$pdf->Image('assets/img/logo.png',25,12,15);

$pdf->Cell(0,20,turkce('CRM Panel Müşteri Bilgisi'),1,1,'C');
$pdf->SetFont('arial_tr','',16);
$pdf->Cell(45,10,turkce('Adı Soyadı'),1,0);
$pdf->Cell(0,10,turkce($musteri_adsoyad),1,0);
$pdf->Ln();
$pdf->Cell(45,10,turkce('Email Adresi'),1,0);
$pdf->Cell(0,10,turkce($musteri_email),1,0);
$pdf->Ln();
$pdf->Cell(45,10,turkce('Vergi Dairesi'),1,0);
$pdf->Cell(0,10,turkce($musteri_vergidairesi),1,0);

$pdf->Ln();
$pdf->Cell(45,10,turkce('Vergi Numarası'),1,0);
$pdf->Cell(0,10,turkce($musteri_verginumarasi),1,0);

$pdf->Ln();
$pdf->Cell(45,10,turkce('Gelir Düzeyi'),1,0);
$pdf->Cell(0,10,turkce($musteri_gelir),1,0);

$pdf->Ln();
$pdf->Cell(45,10,turkce('Telefon'),1,0);
$pdf->Cell(0,10,turkce($musteri_telefon),1,0);

$pdf->Ln();
$pdf->Cell(45,10,turkce('Cinsiyet'),1,0);
$pdf->Cell(0,10,turkce($musteri_cinsiyet),1,0);

$pdf->Ln();
$pdf->Cell(45,10,turkce('Durum'),1,0);
$pdf->Cell(0,10,turkce($musteri_durum),1,0);

$pdf->Ln();
$pdf->Cell(45,10,turkce('Adres'),1,0);
$pdf->Cell(0,10,turkce('Veri Tabanına Eklenecek'),1,0);

$pdf->Ln();
$pdf->Cell(45,10,turkce('Kayıt Tarihi'),1,0);
$pdf->Cell(0,10,turkce($musteri_kayittarihi),1,0);

$file = time() . '.pdf';
$pdf->Output($file,'I');

?>