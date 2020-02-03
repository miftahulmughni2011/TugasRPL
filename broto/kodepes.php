<?php

    function kode_random($length){
      $data = '1234567890';
      $string = 'tr';

      for($i=0;$i < $length; $i++){
        $pes = rand(0, strlen($data)-1);
        $string .= $data{$pes};
      }
      return $string;
    }

    $kode= kode_random(2);


 ?>
