<?php
include_once 'template/header.php';
include_once 'template/sidebar.php';
?>

  <main id="main" class="main">
    <?php
    if (isset($_GET["id"])) {
      $id         = (int)$_GET["id"];
      $musteri    = new musteri();
      $getir      = $musteri->getir($id,$baglan);
      $mesaj      = $musteri->mesaj();
      if ($mesaj == "basarili") {
        $musteri_email	      =	$getir["Email"];
        $musteri_adsoyad      =	$getir["AdSoyad"];
        $musteri_telefon      =	TelefonBicimlendir($getir["Telefon"]);
        $musteri_vergidairesi =	$getir["VergiDairesi"];
        $musteri_verginumarasi=	$getir["VergiNumarasi"];
        $musteri_cinsiyet     =	$getir["Cinsiyet"];
        $musteri_kayittarihi  =	Tarih($getir["KayitTarihi"]);
        $musteri_resim        =	$getir["Resim"];
        $musteri_durum	      =	$getir["Durum"];
        $musteri_gelir        =	$getir["GelirDuzeyi"];
      } else {
        echo "<script>
        alert('İşlem Sırasında $mesaj');
        window.top.location = 'http://localhost/crm/index.php';
        </script>";
      }
    } else {
      echo "<script>
      window.top.location = 'http://localhost/crm/index.php';
      </script>";
    }
    ?>
    <div class="pagetitle">
      <h1><?php echo $cevir["musteri"]; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $cevir["anasayfa"]; ?></a></li>
          <li class="breadcrumb-item"><?php echo $cevir["musteriler"]; ?></li>
          <li class="breadcrumb-item active"><?php echo $musteri_adsoyad; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/<?php echo $musteri_resim; ?>" alt="Profile" height="100px">
              <h2><?php echo $musteri_adsoyad; ?></h2>
              <h3><?php echo ($musteri_durum) == 1 ? "Aktif" :"Pasif"; ?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                <li class="nav-item" role="presentation">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab"><?php echo $cevir["musteri_bilgisi"]; ?></button>
                </li>

                <li class="nav-item" role="presentation">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-mail" aria-selected="false" role="tab" tabindex="-1"><?php echo $cevir["mail_gonder"]; ?></button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                  <h5 class="card-title"><?php echo $cevir["hakkinda"]; ?></h5>
                  <p class="small fst-italic">Flo mağazasında satış danışmanı olarak görev yapmaktadır.</p>

                  <h5 class="card-title"><?php echo $cevir["profil_detay"]; ?></h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label "><?php echo $cevir["adsoyad"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $musteri_adsoyad; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $cevir["vergidairesi"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $musteri_vergidairesi; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $cevir["verginumarasi"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $musteri_verginumarasi; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $cevir["cinsiyet"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $musteri_cinsiyet; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $cevir["adres"]; ?></div>
                    <div class="col-lg-9 col-md-8">Adres Sütunu Eklenecek.</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $cevir["kayit_tarihi"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $musteri_kayittarihi; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $cevir["telefon"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $musteri_telefon; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $cevir["email"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $musteri_email; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $cevir["gelir_duzeyi"]; ?></div>
                    <?php
                      switch ($musteri_gelir) {
                        case 1: $bar=10;$renk="bg-danger"; break;  
                        case 2: $bar=25;$renk="bg-warning"; break;//Ekran çıktısı        
                        case 3: $bar=50;$renk="bg-info"; break; 
                        case 4: $bar=75;$renk="bg-success"; break;
                        case 5: $bar=100;$renk="bg-success"; break;  
                        default:$bar=0;$renk="";
                      }
                    ?>
                    <div class="col-lg-9 col-md-8">
                      <div class="progress">
                      <div class="progress-bar progress-bar-striped <?php echo $renk; ?> progress-bar-animated" role="progressbar" style="width: <?php echo $bar; ?>%" aria-valuenow="<?php echo $bar; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo "%$bar"; ?></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">PDF <?php echo $cevir["kaydet"]; ?></div>
                    <div class="col-lg-9 col-md-8"><a href="pdf.php?id=<?php echo $id; ?>" target="_blank"><button type="button" class="btn btn-danger"><i class="bi bi-download"></i> PDF <?php echo $cevir["kaydet"]; ?></button></a></div>
                  </div>
                  
                </div>

                <div class="tab-pane fade pt-3" id="profile-mail" role="tabpanel">
                  <!-- Change Password Form -->
                  <form action="mail.php" method="POST">
                    <div class="col-sm-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPassword" placeholder="Email" value="<?php echo $musteri_email; ?>" disabled>
                        <label for="floatingPassword"><?php echo $cevir["email"]; ?></label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPassword" name="konu" placeholder="Konu">
                        <label for="floatingPassword"><?php echo $cevir["konu"]; ?></label>
                      </div>
                      <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" name="mesaj" id="floatingTextarea" style="height: 100px;"></textarea>
                        <label for="floatingTextarea"><?php echo $cevir["aciklama"]; ?></label>
                      </div>
                    </div>

                    <div class="text-center">
                      <input type="hidden" name="mail" value="<?php echo $musteri_email; ?>">
                      <button type="submit" class="btn btn-primary"><?php echo $cevir["mail_gonder"]; ?></button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->
<?php
include_once 'template/footer.php';
?>
