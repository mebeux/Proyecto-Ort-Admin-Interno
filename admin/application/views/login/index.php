
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/estilo.css">
        <title>Escuela Universitaria Centro de Diseño - Bedelía</title>
    </head>
    <body>
        <div class="cuerpo">
            <?php
            echo form_open("login/validar", 
                    array("id" => "fingreso",
                          "autocomplete" => "off"));
            
            if (isset($mensaje)) {
                echo "<h2>$mensaje</h2>";
            } else {
                echo validation_errors("<h2>");
            }
            ?>
            
            <div id="form-login">
                <div id="form-titulo">Escuela Universitaria<br /> Centro de Diseño</div>
                <div id="form-cuerpo">
                    <center>
                    <input type="text" name="usuario" placeholder="usuario" /><br/>
                    <input type="password" name="clave" placeholder="contraseña" />
                    <div id="botones">
                    <input type="submit" class="btn" value="aceptar" />
                    <input type="reset" class="btn-gris" value="cancelar" />
                    </div>
                    </center>
                </div>    
            </div>
            <?php echo form_close();  ?>

    </div>
    </body>
</html>
