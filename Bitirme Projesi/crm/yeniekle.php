<?php
include_once 'template/header.php';
include_once 'template/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1><?php echo $cevir["musteriler"]; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"><?php echo $cevir["anasayfa"]; ?></a></li>
          <li class="breadcrumb-item active"><?php echo $cevir["musteri_ekle"]; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="card">
            <div class="card-body">
              <?php 
              if (isset($_GET["mesaj"])) {
                if ($_GET["mesaj"] == "hata") {
                  $icerik = "İşlem Sırasında Hata Meydana Geldi - (Lütfen yetkiliye danışın!)";
                  $show   = "danger";
                  $icon   = "exclamation-octagon";
                } else if ($_GET["mesaj"] == "eksik") {
                  $icerik = "Formda Eksik Veri Girişi - (Lütfen Formda Boş Alan Bırakmayınız!)";
                  $show   = "warning";
                  $icon   = "exclamation-triangle";
                } else if ($_GET["mesaj"] == "basarili") {
                  $icerik = "İşlem Başarılı - (Tebrikler!)";
                  $show   = "success";
                  $icon   = "check-circle";
                }
                echo "<div class='card-body mt-3'>
                <div class='alert alert-$show alert-dismissible fade show' role='alert'><i class='bi bi-$icon me-1'></i>
                $icerik
                <a href='yeniekle.php'><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><a></div></div>";   
              }
              ?>
              <h5 class="card-title"><?php echo $cevir["musteri"]; ?> Form</h5>
              <!-- General Form Elements -- Form Start -->
              <form action="kontrol.php?islem=ekle" enctype="multipart/form-data" method="POST">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"><?php echo $cevir["adsoyad"]; ?></label>
                  <div class="col-sm-10">
                    <input type="text" name="adsoyad" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label"><?php echo $cevir["email"]; ?></label>
                  <div class="col-sm-10">
                    <input type="email" name="email2" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"><?php echo $cevir["vergidairesi"]; ?></label>
                  <div class="col-sm-10">
                    <input type="text" name="vergidairesi" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"><?php echo $cevir["verginumarasi"]; ?></label>
                  <div class="col-sm-10">
                    <input type="text" name="verginumarasi" class="form-control" maxlength="11">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"><?php echo $cevir["gelir_duzeyi"]; ?></label>
                  <div class="col-sm-10">
                  <select class="form-select" name="gelir" aria-label="Default select example">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTelefon" class="col-sm-2 col-form-label"><?php echo $cevir["telefon"]; ?></label>
                  <div class="col-sm-10">
                    <input type="phone" name="telefon" class="form-control" maxlength="11">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label"><?php echo $cevir["resim_yukle"]; ?></label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="image" id="formFile">
                  </div>
                </div>
                <div class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0"><?php echo $cevir["cinsiyet"]; ?></legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="cinsiyet" id="gridCheck1" value="Erkek">
                      <label class="form-check-label" for="gridCheck1">
                      <?php echo $cevir["erkek"]; ?>
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="cinsiyet" id="gridCheck2" value="Kadın">
                      <label class="form-check-label" for="gridCheck2">
                      <?php echo $cevir["kadin"]; ?>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 form-check-label"><?php echo $cevir["durum"]; ?></label>
                  <div class="col-sm-10">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="durum" name="durum">
                    <label class="form-check-label" for="durum"><?php echo $cevir["aktif_mi"]; ?></label>
                  </div>
                  </div>
                </div>   
                    
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-success"><?php echo $cevir["kaydet"]; ?></button>
                    <button type="reset" class="btn btn-secondary"><?php echo $cevir["temizle"]; ?></button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->
<?php
include_once 'template/footer.php';
?>
