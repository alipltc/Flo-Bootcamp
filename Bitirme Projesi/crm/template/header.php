<?php
session_start();ob_start();
require_once $_SERVER['DOCUMENT_ROOT']."/crm/Ayarlar/baglan.php";
require_once $_SERVER['DOCUMENT_ROOT']."/crm/Ayarlar/fonksiyonlar.php";
require_once $_SERVER['DOCUMENT_ROOT']."/crm/Ayarlar/class.php";

//Yetkili
if(isset($_SESSION["Yetkili"])){
    $sorgu	=	$baglan->prepare("SELECT * FROM yetkililer WHERE Email = ? LIMIT 1");
    $sorgu->execute([$_SESSION["Yetkili"]]);
    $kontrol=	$sorgu->rowCount();
    $yetkili= $sorgu->fetch(PDO::FETCH_ASSOC);
    $sorgu->closeCursor(); unset($sorgu);
    if($kontrol>0){
        $yetkili_email	  =	$yetkili["Email"];
        $yetkili_adsoyad  =	$yetkili["AdSoyad"];
        $yetkili_sirket   =	$yetkili["Sirket"];
        $yetkili_unvan    =	$yetkili["Unvan"];
        $yetkili_telefon  =	TelefonBicimlendir($yetkili["Telefon"]);
        $yetkili_ulke     =	$yetkili["Ulke"];
        $yetkili_adres    =	$yetkili["Adres"];
        $yetkili_resim    =	$yetkili["Resim"];
        $yetkili_github   =	$yetkili["Github"];
        $yetkili_linkedin =	$yetkili["Linkedin"];
        $yetkili_durum	  =	$yetkili["Durum"];
    }else{
        die();
    }
} else {
    echo "<script>
    window.top.location = 'http://localhost/crm/login.php';
    </script>";
}

//Dil Seçenek
if (isset($_SESSION["dil"])){
  require ("" . $_SESSION["dil"] . ".php");
} else {
  require ("tr.php");
}

//Tablo Sayfalama
if (isset($_GET["sf"])){
  $sayfa = $_GET["sf"];
  if($sayfa == "" || $sayfa<=0){$sayfa = 1;}
} else {
  $sayfa = 1;
}

//Tablo Arama
if (isset($_REQUEST["AramaIcerigi"])){
	$GelenAramaIcerigi	=	Guvenlik($_REQUEST["AramaIcerigi"]);
	$AramaKosulu		=	 " WHERE AdSoyad LIKE '%" . $GelenAramaIcerigi . "%' ";
} else {
	$AramaKosulu		=	"";
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>CRM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">CRM PANEL</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/<?php echo "$yetkili_resim"; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo ($yetkili_durum == 1) ? "Selam, $yetkili_adsoyad" : "Doğrulama Gerekli"; ?></span>
          </a><!-- End Profile Iamge Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo "$yetkili_adsoyad"; ?></h6>
              <span><?php echo "$yetkili_unvan"; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="profil.php">
                <i class="bi bi-person"></i>
                <span><?php echo $cevir["hesabim"]; ?></span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="kontrol.php?dil=tr">
                <i class="ri-tumblr-line"></i>
                <span><?php echo $cevir["turkce"]; ?></span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="kontrol.php?dil=en">
                <i class="ri-english-input"></i>
                <span><?php echo $cevir["ingilizce"]; ?></span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="kontrol.php?islem=cikis">
                <i class="bi bi-box-arrow-right"></i>
                <span><?php echo $cevir["cikis"]; ?></span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
</header><!-- End Header -->