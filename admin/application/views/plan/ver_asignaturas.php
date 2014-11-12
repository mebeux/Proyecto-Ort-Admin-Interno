<div id="contenido">
    <h1 style="text-align: center">Plan <?php echo $plan->get_nombre(); ?></h1>
    <?php
    echo form_open("", array("id" => "frm", "name" => "frm"));
    
    echo "<input type=\"hidden\" id=\"id_plan\" value=\"{$plan->id}\" />\n";
    
    ?>
    <table  class="tbl-acordeon centro ancho1" >
        <?php
        for ($i = 1; $i <= $plan->get_anios(); $i++) {

            echo "<tr  class=\"encabezado-anioplan\"><td colspan=\"3\"><a data-valor=\"$i\" href= #>Año: " . $i . "</a></td></tr>\n";
        
            foreach ($asignaturas as $asignatura) {
            
                if ($asignatura->anio_asignatura == $i) {

                    $tipo = ($asignatura->teorica == 1)? "Teorica" : "Unidad de Proyecto";

                    $fila = "<tr class=\"fila $asignatura->anio_asignatura\" id=\"" . $asignatura->id_asignatura . "\">
                              <td>". $asignatura->nombre . "</td><td  class=\"gris\">$tipo</td>";
                    
                    $fila .="<td>
                             <img  src=\"" . base_url() . "public/img/editarNaranja.png\">
                             <a href=\"#\" class=\"aImg\" 
                             data-valor=\"" . $asignatura->id_asignatura . "\">
                             <img  src=\"" . base_url() . "public/img/verNaranja.png\"></a>
                            </td></tr>\n";
                    
                    echo $fila;
          
     
                }
            }
        }
        ?>
    </table>
</form>
<input type="hidden" id="urlBase" value="<?php echo base_url(); ?>">
</div>

<div class="dialogo" id="dialogo">
    <a href=# class="cerrar">cerrar</a>
    <div class="header"></div>
    <div class="contenido">
        <ul class="lst-dos-filas">
            <li><span>Nombre: </span><span id="nombre_asignatura"></span></li>
        
            <li><span>Descripcion: </span><span id="descripcion"></span></li>
          
            <li><span>Minimo de aprobacion: </span><span id="min_aprobacion"></span></li>
             <li><p>&nbsp;</p></li>
              <li><div>Escala:</div><div></div>
            
                  <table id="lst-escala" >
                </table>
            </li>
            <li><p>&nbsp;</p></li>
            <li><div>Previas:</div>
                <ul id="lst-previas">
                </ul>
            </li>
        </ul>    
    </div>
</div>

