<?php 

    function generarCodigo(){
        for($i = 0 ; $i<=19 ; $i++){
            if ($i==4 || $i==9 ||  $i==14   ){
                $data ="-";
            }else if($i%2 ==0 && $i!=4 && $i!=9 &&  $i!=14 ){
                $data = rand(1,9);
            }else{
                $data = chr(rand(ord("a"), ord("z")));
            }
            return $data;
        }
    }

?>
