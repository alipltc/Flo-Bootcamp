<?php 
if(!isset($_SESSION["Yetkili"])){
    echo "<script>
    window.top.location = 'http://localhost/crm/login.php';
    </script>";
}
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-heading"><?php echo $cevir["sayfalar"]; ?></li>

    <li class="nav-item">
        <a class="nav-link <?php active('/index');?>" href="index.php">
            <i class="bi bi-person"></i>
            <span><?php echo $cevir["musteriler"]; ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php active('/yeniekle');?>" href="yeniekle.php">
            <i class="bi bi-person-plus"></i>
            <span><?php echo $cevir["musteri_ekle"]; ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="kontrol.php?islem=export">
            <i class="bi bi-download"></i>
            <span>CSV <?php echo $cevir["kaydet"]; ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php active('/profil');?>" href="profil.php">
            <i class="bi bi-person-circle"></i>
            <span><?php echo $cevir["hesabim"]; ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php active('/destek');?>" href="destek.php">
            <i class="bi bi-question-circle"></i>
            <span><?php echo $cevir["destek"]; ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="kontrol.php?islem=cikis">
            <i class="bi bi-box-arrow-right"></i>
            <span><?php echo $cevir["cikis"]; ?></span>
        </a>
    </li>

</ul>

</aside><!-- End Sidebar-->