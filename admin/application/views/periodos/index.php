<div id="contenido">
    <h1>Periodos</h1>
    <table class="tbl-acordeon centro ancho1">
        <?php
        $fila = "";
        foreach ($anios as $anio) {
             echo "<tr  class=\"encabezado-anios\"><td colspan=\"5\"><a data-valor=\"$anio->anio_lectivo\" href='#' > Año: " . $anio->anio_lectivo . "</a></td></tr>\n";
            foreach ($periodos as $periodo) {
                if ($anio->anio_lectivo == $periodo->anio) {
                    $fila="";
                    $fila.= " <tr data-anio=\"".$periodo->anio."\" data-actual=\"".$periodo->actual."\" class=\"fila ".$periodo->anio."\" ><td class=\"txt-centro\">" . mes_letra(substr($periodo->periodo, 4)) . "</td>"
                            
                            . "<td class=\"txt-centro\">";
                    if ($periodo->unidad_proyecto == 1) {
                        $fila.="Unidad de Proyecto: SI";
                    } else {
                        $fila.="Unidad de Proyecto: NO";
                    }
                    $fila.= "</td>"
                            . "<td class=\"txt-centro\">";
                    if ($periodo->actual == 1) {
                        $fila.="Actual: SI";
                    } else {
                        $fila.="Actual: NO";
                    }
                    $fila.= "</td>"
                            . "<td class=\"txt-centro centro\">" . anchor("periodo/ver/{$periodo->periodo}", "<img src=\"" . base_url() . "public/img/search.png\" />") . "</td></tr>";


                    echo $fila;
                }
            }
        }
        ?>
    </table>
    <input type="hidden" id="urlBase" name="Base" value="<?php echo base_url(); ?>">
    <input type="hidden" class="indi" id="ind" name="In" value="1">
</div>
</div>

<div id="mascara"></div>
