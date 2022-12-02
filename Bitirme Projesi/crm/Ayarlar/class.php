<?php
date_default_timezone_set('Europe/Istanbul');

//Müşteri Class
class musteri{
    private $mesaj;
    //Müşteri Kaydetme
    public function kaydet($veri,$baglan) {
        if (($veri[0] !="") and ($veri[1] !="") and ($veri[2] !="") and ($veri[3] !="") and ($veri[4] !="") and ($veri[5] != "") and ($veri[6] != "") and ($veri[7] != "") and ($veri[8] != "")){
            $sorgu   = $baglan->prepare("INSERT INTO musteriler VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
            $sorgu->execute([NULL,$veri[0],$veri[1],$veri[2],$veri[3],$veri[4],$veri[5],$veri[6],$veri[7],$veri[8],$veri[9],$veri[10]]);
            $kontrol = $sorgu->rowCount();
            $sorgu->closeCursor(); unset($sorgu);
            if ($kontrol>0) {
                $this->mesaj="basarili";
                return true;
            } else {
                $this->mesaj="hata";
                return false;
            }
        } else {
            $this->mesaj="eksik";
            return false;
        } 
    }
    //Müşteri Güncelleme
    public function guncelle($veri,$baglan) {
        if (($veri[0] !="") and ($veri[1] !="") and ($veri[2] !="") and ($veri[3] !="") and ($veri[4] !="") and ($veri[5] != "") and ($veri[6] != "") and ($veri[7] != "") and ($veri[8] != "")){
            $sorgu   = $baglan->prepare("UPDATE musteriler SET AdSoyad=?, Email=?, VergiDairesi=?, VergiNumarasi=?, GelirDuzeyi=?, Telefon=?, Resim=?, Cinsiyet=?, Durum=? WHERE id=?");
            $sorgu->execute([$veri[0],$veri[1],$veri[2],$veri[3],$veri[4],$veri[5],$veri[6],$veri[7],$veri[8],$veri[9]]);
            $kontrol = $sorgu->rowCount();
            $sorgu->closeCursor(); unset($sorgu);
            if ($kontrol>0) {
                $this->mesaj="basarili";
                return true;
            } else {
                $this->mesaj="hata";
                return false;
            }
        } else {
            $this->mesaj="eksik";
            return false;
        }
    }
    //Müşteri Getirme
    public function getir($id,$baglan) {
        $sorgu   = $baglan->prepare("SELECT * FROM musteriler WHERE id=?");
        $sorgu->execute([$id]);
        $kontrol = $sorgu->rowCount();
        $musteri = $sorgu->fetch(PDO::FETCH_ASSOC);
        $sorgu->closeCursor(); unset($sorgu);
        if ($kontrol>0) {
            $this->mesaj="basarili";
            return $musteri;
        } else {
            $this->mesaj="hata";
            return false;
        }
    }
    //Müşteri Silme
    public function sil($id,$baglan) {
        $sorgu   = $baglan->prepare("DELETE FROM musteriler WHERE id=?");
        $sorgu->execute([$id]);
        $kontrol = $sorgu->rowCount();
        $sorgu->closeCursor(); unset($sorgu);
        if ($kontrol>0) {
            $this->mesaj="basarili";
            return true;
        } else {
            $this->mesaj="hata";
            return false;
        }
    }
    //Mesaj Döndürme
    public function mesaj() {
        return $this->mesaj;
    }
}

// Loglama Class
class log {
    public function add($text)
    {
        $data = date("d.m.Y") . " " . date("H:i:s") . "   " . $text . PHP_EOL;
        $folder = "log/";
        $logFileName = $folder . date("d-m-Y") . ".log";
 
        if (!file_exists($folder)) {
            mkdir($folder);
        }
 
        if (!file_exists($logFileName)) {
            file_put_contents($logFileName, "\xEF\xBB\xBF");
        }
 
        $ofile = fopen($logFileName, "a");
 
        fwrite($ofile, $data);
        fclose($ofile);
    }
}



?>