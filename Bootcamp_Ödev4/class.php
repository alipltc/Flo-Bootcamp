<?php
class TcKimlik {
    public function SadeceRakamlarAl($Deger) {
        $sonuc	=	preg_replace("/[^0-9]/","",$Deger);

        return $sonuc;
    }
    public function TcDogrula($tcno)
    {
        $dizim = array();
        $tek  = 0;
        $cift = 0;
        $tümtoplam = 0;
        for ($i=0;$i<11;$i++) {
            $dizim[] += substr($tcno,$i,1);
            $tümtoplam += substr($tcno,$i,1);
            if ($i%2 == 0) {
                $tek  += substr($tcno,$i,1);
            } else {
                $cift += substr($tcno,$i,1);
            }
        }
        $tek  -= $dizim[10];
        $cift -= $dizim[9];
        $islem_bir = (($tek*7)- $cift)%10;//3. durum için
        $islem_iki = ($tümtoplam - $dizim[10])%10; //4.durum için
        if (($dizim[0] != 0) and ($islem_bir == $dizim[9]) and ($islem_iki == $dizim[10])) {
            return 1;
        } else {
            return 0;
        }
    }
}
?>