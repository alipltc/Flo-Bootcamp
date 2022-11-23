<?php
require_once 'baglan.php';
$sorgu      = $baglan->prepare("SELECT * FROM kisiler");
$sorgu->execute();
$kisiler    = $sorgu->fetchAll(PDO::FETCH_ASSOC);
$sorgu->closeCursor(); unset($sorgu);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <div class="container text-center">
        <div class="row justify-content-md-center">
        <div class="col-md-3 mt-3">
            <form action="kontrol.php" method="POST">
                <div class="mb-3 text-center">
                    <label for="fullname" class="form-label">Adınız Soyadınız:</label>
                    <input type="text" class="form-control" name="adsoyad" id="fullname" required>
                </div>
                <div class="mb-3 text-center">
                    <label for="tckimlik" class="form-label">TC Kimlik Numaranız:</label>
                    <input type="text" class="form-control" name="tckimlik" id="tckimlik" maxlength="11" required>
                </div>
                <div class="text-center">
                <button type="submit" class="btn btn-primary">Doğrula ve Kaydet</button>
                <button type="reset" class="btn btn-secondary">Form Temizle</button>
                </div>
            </form>
        </div>
        <?php
        if ($kisiler){
        ?>
        <div class="col-md-12 mt-5">
        <h3>Kişiler</h3>
        <table class="table table-bordered table-striped" id="example">
            <thead>
                <tr>
                <th scope="col-3" >#</th>
                <th scope="col-3" >Adı Soyadı</th>
                <th scope="col-3" >TC Kimlik Numarası</th>
                <th scope="col-3" >Durum</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($kisiler as $kisi){
                    echo "<tr>
                    <td>$kisi[id]</td>
                    <td>$kisi[adsoyad]</td>
                    <td>$kisi[tckimlik]</td>
                    <td>$kisi[durum]</td></tr>";
                }   
            ?>
            </tbody>
        </table> 
        </div>
        <?php
        } 
        ?>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</body>
</html>