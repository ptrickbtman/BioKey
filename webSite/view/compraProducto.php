<?php

function desplegarFormulario(){
    ?>

        <div class="cover">

            <div class="contForm contForm1 contFormActive">
                
                <form class="form form1 Comprar">
                    <p class="tittleForm">Datos personales:</p>
                    <label for="">Rut:</label>
                    <input type="text" placeholder="11.111.111-1" name="rut">
                    <label for="">Nombre:</label>
                    <input type="text" name="nombre">
                    <label for="">Apellido:</label>
                    <input type="text" name="apellido">
                    <label for="">Email:</label>
                    <input type="email" name="email">
                    <label for="">Numero telefonico:</label>
                    <input type="text" name="celular">
                    <div class="next next1 nextActive">Continuar</div>
                </form>
            </div>

            <div class="contForm contForm2">
                <form class="form Comprar">
                    <p class="tittleForm tittleForm2"></p>

                    <!-- Select option BD -->
                    <label for="">Region:</label>
                    <input type="text"  name="rut">
                    <label for="">Ciudad:</label>
                    <input type="text" name="nombre">
                    <!-- Select option BD -->


                    <label for="">Comuna:</label>
                    <input type="text" name="comuna">
                    <label for="">Calle:</label>
                    <input type="text" name="calle1">
                    <label for="">Calle referencia (Opcional):</label>
                    <input type="text" name="calle2">

                    <label for="">Numero:</label>
                    <input type="text" name="num_dir" placeholder="#123">
                    <label for="">Villa (Opcional)::</label>
                    <input type="text" name="villa">
                    <label for="">Block (Opcional):</label>
                    <input type="text" name="block">
                    <div class="back back2 blackActive">Atras</div>
                    <div class="next next2">Comprar!</div>
                </form>
            </div>

            <div class="right">
                
            </div>

        </div>

    <?php
}

?>