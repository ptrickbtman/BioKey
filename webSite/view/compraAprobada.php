<?php

    function desplegarRegistros(){
        //print_r( $_SESSION["cliente"] );
        $cliente =  $_SESSION["cliente"];
        $numDatosArray = count($cliente);
        $count =0;
        foreach ($cliente as $dato => $valor) {
            //print "$dato => $valor\n";
            if($count==0){ echo '<div class="left"><div class="contText"><h1>Datos del cliente</h1></div></div>';}
            ?>  
           
                

                <div class="right"><div class="contText"><p><?php echo $valor ?></p></div></div>
            <?
            $count+=1;
        }   

        echo'<button class="btnDescargar">Descargar PDF</button>';

    }

?>