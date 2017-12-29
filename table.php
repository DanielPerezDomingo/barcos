<?php
function tablero($dimensiones)
{
    echo'<table border="1px" class="tablero" >';

    for ($y=0;$y<=$dimensiones;$y++) {
        echo"<tr>";
        for ($x=0;$x<=$dimensiones;$x++) {
            echo "<td>";
            if ($x==0 && $y!=0) {
                echo $y;
            }
            if ($y==0 && $x!=0) {
                echo  $x;
            }
            echo "</td>";
        }
        echo"</tr>";
    }

    echo"</table>";
}
