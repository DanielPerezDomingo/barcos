<?php
ini_set('display_errors', 'On');
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

 session_start();

if (isset($_POST["Jugador"])) {
    $_SESSION["Jugador"]=$_POST["Jugador"] ;

    include 'DB.php';
    if ($mysqli->connect_error) {
        die("Error al realizar la conexion");
    } else {
        $myrow=partida_actual($mysqli, $_POST['Jugador']);
        if ($myrow) {
            $_SESSION["Idpartidas"]= $myrow["Idpartidas"];
            $_SESSION["Tablero"]=$myrow["Tablero"];
        } else {
            $_SESSION["Tablero"]=$_POST["Tablero"];
            $idpart=crear_partida($mysqli,$_POST['Jugador'],$_POST['tablero']);
            $_SESSION["Idpartidas"]=$idpart["Idpartidas"];
        }
    }
}

if (isset($_SESSION['Jugador'])) {
    Redirect('partida.php', false);
}



?>
<html>
   <head></head>
   <body>
<?php print_r($_SESSION);?>       
   <form method="POST" >
   Jugador:<br>
   <input type="text" name="Jugador">
   <br>
   
   tablero 10x10<input type="radio" name="Tablero" value="10" cheked><br>
   tablero 15x15<input type="radio" name="Tablero" value="15"><br>
   tablero 20x20<input type="radio" name="Tablero" value="20"><br>
   <input type="submit" value="Enviar">
 </form> 


</body> 

</html>
