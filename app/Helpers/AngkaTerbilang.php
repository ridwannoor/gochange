<?php
function terbilang($angka) {
   $angka=abs($angka);
   $baca =array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
 
   $terbilang="";
    if ($angka < 12){
        $terbilang= " " . $baca[$angka];
    }
    else if ($angka < 20){
        $terbilang= terbilang($angka - 10) . " belas";
    }
    else if ($angka < 100){
        $terbilang= terbilang($angka / 10) . " puluh" . terbilang($angka % 10);
    }
    else if ($angka < 200){
        $terbilang= " seratus" . terbilang($angka - 100);
    }
    else if ($angka < 1000){
        $terbilang= terbilang($angka / 100) . " ratus" . terbilang($angka % 100);
    }
    else if ($angka < 2000){
        $terbilang= " seribu" . terbilang($angka - 1000);
    }
    else if ($angka < 1000000){
        $terbilang= terbilang($angka / 1000) . " ribu" . terbilang($angka % 1000);
    }
    else if ($angka < 1000000000){
       $terbilang= terbilang($angka / 1000000) . " juta" . terbilang($angka % 1000000);
    }
    else if ($angka < 1000000000000){
        $terbilang= terbilang($angka / 1000000000) . " milyar" . terbilang(fmod($angka,1000000000));
    } 
    else if ($angka < 1000000000000000) {
        $terbilang = terbilang($angka / 1000000000000) . " trilyun" . terbilang(fmod($angka,1000000000000));
    }  
       return $terbilang;

        // $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        // if($angka==0){
        //     return "Kosong";
        // }elseif ($angka < 12&$angka!=0) {
        //     return "" . $huruf[$angka];
        // } elseif ($angka < 20) {
        //     return Terbilang($angka - 10) . " Belas ";
        // } elseif ($angka < 100) {
        //     return Terbilang($angka / 10) . " Puluh " . Terbilang($angka % 10);
        // } elseif ($angka < 200) {
        //     return " Seratus " . Terbilang($angka - 100);
        // } elseif ($angka < 1000) {
        //     return Terbilang($angka / 100) . " Ratus " . Terbilang($angka % 100);
        // } elseif ($angka < 2000) {
        //     return " Seribu " . Terbilang($angka - 1000);
        // } elseif ($angka < 1000000) {
        //     return Terbilang($angka / 1000) . " Ribu " . Terbilang($angka % 1000);
        // } elseif ($angka < 1000000000) {
        //     return Terbilang($angka / 1000000) . " Juta " . Terbilang($angka % 1000000);
        // }elseif ($angka < 1000000000000) {
        //     return Terbilang($angka / 1000000000) . " Milyar " . Terbilang($angka % 1000000000);
        // }elseif ($angka < 100000000000000) {
        //     return Terbilang($angka / 1000000000000) . " Trilyun " . Terbilang($angka % 1000000000000);
        // }elseif ($angka <= 100000000000000) {
        //     return "Maaf Tidak Dapat di Prose Karena Jumlah angka Terlalu Besar ";
        // }
}