<?php
include_once 'template/header.php';
include_once 'template/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1><?php echo $cevir["musteriler"]; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $cevir["anasayfa"]; ?></a></li>
          <li class="breadcrumb-item active"><?php echo $cevir["musteriler"]; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="card">
          <div class="card-body">
              <?php 
              //Sayfalama
              $sorgusayfa =	$baglan->query("SELECT count(id) as toplam FROM musteriler $AramaKosulu")->fetch(PDO::FETCH_ASSOC);
              $toplam     = $sorgusayfa["toplam"];
              $goruntu    = 10;
              $toplamsayfa= ceil($toplam/$goruntu);
              $baslangic  = ($sayfa-1) * $goruntu;
              $oncekisayfa= $sayfa -1;
              $sonrakisayfa = $sayfa +1;
              if ($oncekisayfa <= 0) {$oncekisayfa = 1;}
              if ($sonrakisayfa >= $toplamsayfa) {$sonrakisayfa = $toplamsayfa;}
              
              //Listeleme
              $sorgu		  =	$baglan->prepare("SELECT * FROM musteriler $AramaKosulu ORDER BY id ASC LIMIT $baslangic,$goruntu");
              $sorgu->execute();
              $kontrol	  =	$sorgu->rowCount();
              $musteriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
              $sorgu->closeCursor(); unset($sorgu);
              
              if ($kontrol>0) {
              ?>
              <h4 class="card-title"><?php echo $cevir["müşteri_tablosu"]; ?></h4>              
              <div class="d-flex justify-content-between mb-3">
                <div class="col-example col-md-3">
                  <form action="index.php" method="POST">
                    <div class="input-group">
                      <input type="text" class="form-control" name="AramaIcerigi" placeholder="<?php echo $cevir["tablo_ara"]; ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><?php echo $cevir["ara"]; ?></button>
                    </div>
                  </form>
                </div>
                <div class="col-example">
                </div>
                <div class="col-example">
                  <a href="yeniekle.php"><button type="button" class="btn btn-success"><i class="bi bi-person-plus"></i> <?php echo $cevir["musteri_ekle"]; ?></button></a>
                  <a href="kontrol.php?islem=export"><button type="button" class="btn btn-primary"><i class="bi bi-download"></i> CSV <?php echo $cevir["kaydet"]; ?></button></a>
                </div>
              </div>
              <table class="table table-bordered table-striped" id="example">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"><?php echo $cevir["sirket"]; ?></th>
                    <th scope="col"><?php echo $cevir["adsoyad"]; ?></th>
                    <th scope="col"><?php echo $cevir["email"]; ?></th>
                    <th scope="col"><?php echo $cevir["vergidairesi"]; ?></th>
                    <th scope="col"><?php echo $cevir["telefon"]; ?></th>
                    <th scope="col"><?php echo $cevir["durum"]; ?></th>
                    <th scope="col"><?php echo $cevir["kayit_tarihi"]; ?></th>
                    <th scope="col"><?php echo $cevir["islemler"]; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $number =(($sayfa-1) * $goruntu)+1;
                  foreach ($musteriler as $satir){
                    if ($satir["Durum"] == 1) {
                      $sonuc = "<span class='badge rounded bg-success'>" . $cevir["aktif"] . "</span>";
                    } else {
                      $sonuc = "<span class='badge rounded bg-secondary'>" . $cevir["pasif"] . "</span>";
                    }
                    echo "<tr><th scope='row'>$number</th>";
                    echo "<td scope='row'><a href='#'><img src='assets/img/$satir[Resim]' alt='' width='70px' height='15px'></a></td>";
                    echo "<td>$satir[AdSoyad]</td>";
                    echo "<td>$satir[Email]</td>";
                    echo "<td>$satir[VergiDairesi]</td>";
                    echo "<td>" . TelefonBicimlendir($satir["Telefon"]) . "</td>";
                    echo "<td align='center'>$sonuc</td>";
                    echo "<td>" . Tarih($satir["KayitTarihi"]) . "</td>";
                    echo "<td align='center'><a href='guncelle.php?id=$satir[id]'><button type='button' class='btn btn-warning btn-sm'>" . $cevir["guncelle"] . "</button></a>";
                    echo " <a href='kontrol.php?islem=sil&id=$satir[id]' onclick=\"if (!confirm('Bu Kişiyi Silmek İstediğinize Emin misiniz?')) return false;\">
                    <button type='button' class='btn btn-danger btn-sm'>" . $cevir["sil"] . "</button></a>
                    <a href='detay.php?id=$satir[id]'><button type='button' class='btn btn-secondary btn-sm'><i class='bi bi-info-circle'></i></button></a></td></tr>";
                    $number ++;
                  }
                  ?>
                </tbody>
              </table>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <a class="page-link" href="<?php echo "index.php?sf=$oncekisayfa";?>" aria-label="Previous">
                      <span aria-hidden="true">«</span>
                    </a>
                  </li>
                  <?php
                  for($i=1;$i<=$toplamsayfa;$i++){
                    echo "<li class='page-item'><a class='page-link' href='index.php?sf=$i'>$i</a></li>";
                  }
                  ?>
                  <li class="page-item">
                    <a class="page-link" href="<?php echo "index.php?sf=$sonrakisayfa";?>" aria-label="Next">
                      <span aria-hidden="true">»</span>
                    </a>
                  </li>
                </ul>
              </nav>
              <?php 
              } else {
                echo "<script>
                alert('Aranan İçerik Tabloda Bulunamadı.');
                window.top.location = 'http://localhost/crm/index.php';
                </script>";
              }
              ?>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
<?php
  include_once 'template/footer.php';
?>

