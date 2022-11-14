<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center">
        <div class="row justify-content-md-center">
        <div class="col-md-3 mt-5">
            <form action="ekle.php" method="POST">
                <div class="mb-3 text-center">
                    <label for="fullname" class="form-label">Adınız Soyadınız:</label>
                    <input type="text" class="form-control" name="adsoyad" id="fullname" required>
                </div>
                <div class="mb-3 text-center">
                    <label for="phone" class="form-label">Telefon Numaranız:</label>
                    <input type="phone" class="form-control" name="telefon" id="phone" required>
                </div>
                <div class="text-center">
                <button type="submit" class="btn btn-primary">Bilgileri Kaydet</button>
                <button type="reset" class="btn btn-secondary">Form Temizle</button>
                </div>
            </form>
            <a href="liste.php">Liste Sayfasına Git -></a>
        </div>
        </div>       
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>