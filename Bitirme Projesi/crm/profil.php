<?php
include_once 'template/header.php';
include_once 'template/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Hesabım</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $cevir["anasayfa"]; ?></a></li>
          <li class="breadcrumb-item active"><?php echo $cevir["hesabim"]; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/<?php echo $yetkili_resim; ?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $yetkili_adsoyad; ?></h2>
              <h3><?php echo $yetkili_unvan; ?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://github.com/<?php echo $yetkili_github; ?>" target="_blank" class="instagram"><i class="bi bi-github"></i></a>
                <a href="https://www.linkedin.com/in/<?php echo $yetkili_linkedin; ?>" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                <li class="nav-item" role="presentation">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab"><?php echo $cevir["profil_detay"]; ?></button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="false" role="tab" tabindex="-1"><?php echo $cevir["sifre_degistir"]; ?></button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                  <h5 class="card-title"><?php echo $cevir["hakkimda"]; ?></h5>
                  <p class="small fst-italic">Merhaba, ben <?php echo $yetkili_adsoyad; ?>,</p>
                  <p class="small fst-italic">Html & Css ile Web Tasarımcılığı, Php & Mysql ile İnternet Programcılığı, Merhaba Sosyal Medya ve Perakende Mağazacılık olmak üzere çalışmalarda bulundum.</p>
                  <h5 class="card-title"><?php echo $cevir["profil_detay"]; ?></h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label "><?php echo $cevir["adsoyad"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $yetkili_adsoyad; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $cevir["sirket"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $yetkili_sirket; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $cevir["meslek"]; ?></div>
                    <div class="col-lg-9 col-md-8">Php Developer</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $cevir["ulke"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $yetkili_ulke; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $cevir["adres"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $yetkili_adres; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $cevir["telefon"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $yetkili_telefon; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $cevir["email"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $yetkili_email; ?></div>
                  </div>

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
                  <!-- Change Password Form -->
                  <form class="row g-3">
                    <div class="col-md-12">
                      <div class="form-floating">
                        <input type="password" class="form-control" id="floatingName" placeholder="Your Name">
                        <label for="floatingName">Mevcut Şifre</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="password" class="form-control" id="floatingEmail" placeholder="Your Email">
                        <label for="floatingEmail">Yeni Şifre</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Yeni Şifre Tekrar</label>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary"><?php echo $cevir["guncelle"]; ?></button>
                      <button type="reset" class="btn btn-secondary"><?php echo $cevir["temizle"]; ?></button>
                    </div>
                  </form>

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