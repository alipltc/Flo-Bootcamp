<?php
include_once 'template/header.php';
include_once 'template/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1><?php echo $cevir["destek"]; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $cevir["anasayfa"]; ?></a></li>
          <li class="breadcrumb-item active"><?php echo $cevir["destek"]; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bize Ulaşın</h5>
                <form action="mail.php" method="POST">
                    <div class="col-sm-12">
                      <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="mail" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput"><?php echo $cevir["email"]; ?></label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="konu" id="floatingInput2" placeholder="Input2">
                        <label for="floatingInput2"><?php echo $cevir["konu"]; ?></label>
                      </div>
                      <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" name="mesaj" id="floatingTextarea" style="height: 100px;"></textarea>
                        <label for="floatingTextarea"><?php echo $cevir["aciklama"]; ?></label>
                      </div>
                    </div>
                    <div class="text-start">
                      <button type="submit" class="btn btn-primary"><?php echo $cevir["mail_gonder"]; ?></button>
                    </div>
                </form>
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
          <div class="card-body">
              <h5 class="card-title">Sıkça Sorulan Sorular</h5>

              <!-- Accordion without outline borders -->
              <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                     Neden CRM Panel?
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Yetkiliye başvurun.Eğer sorununuz devam ediyorsa <b>alipltc@hotmail.com</b> adresine mail atın.</div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      Müşteriye Mail Gönderemiyorum?
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Yetkiliye başvurun.Eğer sorununuz devam ediyorsa <b>alipltc@hotmail.com</b> adresine mail atın.</div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      Müşteri Görselleri Doğru Yüklenmiyor?
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Yetkiliye başvurun.Eğer sorununuz devam ediyorsa <b>alipltc@hotmail.com</b> adresine mail atın.</div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                      CSV Formatında Sorun Yaşıyorum?
                    </button>
                  </h2>
                  <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Yetkiliye başvurun.Eğer sorununuz devam ediyorsa <b>alipltc@hotmail.com</b> adresine mail atın.</div>
                  </div>
                </div>
              </div><!-- End Accordion without outline borders -->

            </div>
          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->
<?php
include_once 'template/footer.php';
?>
