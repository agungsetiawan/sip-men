<?php
 
    function terbilang($angka)
    {
    	$nomina=array("","satu","dua","tiga","empat","lima","enam",
                         "tujuh","delapan","sembilan","sepuluh","sebelas");

        if($angka<12)
        {
          return $nomina[$angka];
        }
        
        if($angka>=12 && $angka <=19)
        {
            return $nomina[floor($angka%10)]." belas ";
        }
        
        if($angka>=20 && $angka <=99)
        {
            return $nomina[floor($angka/10)]." puluh ".$nomina[floor($angka%10)];
        }
        
        if($angka>=100 && $angka <=199)
        {
            return "seratus ".terbilang($angka%100);
        }
        
        if($angka>=200 && $angka <=999)
        {
            return $nomina[floor($angka/100)]." ratus ".terbilang($angka%100);
        }
        
        if($angka>=1000 && $angka <=1999)
        {
            return "seribu ".terbilang($angka%1000);
        }
        
        if($angka >= 2000 && $angka <=999999)
        {
            return terbilang(floor($angka/1000))." ribu ".terbilang($angka%1000);
        }
        
        if($angka >= 1000000 && $angka <=999999999)
        {
            return terbilang(floor($angka/1000000))." juta ".terbilang($angka%1000000);
        }
        
        return "";
    }