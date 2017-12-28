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
        $sql="select Idpartidas,Tablero from partidas where Jugador=? and finalizada =0;" ;
        $query=$mysqli->prepare($sql);
        $query->bind_param("s", $_POST['Jugador']);
        $query->execute();
        $result=$query->get_result();
        $myrow=$result->fetch_assoc();
        if ($myrow) {
            $_SESSION["Idpartidas"]= $myrow["Idpartidas"];
            $_SESSION["Tablero"]=$myrow["Tablero"];
        } else {
            $sql= "INSERT INTO partidas (Jugador,Tablero) values (?,?);";
            $query=$mysqli->prepare($sql);
            $query->bind_param("si", $_POST['Jugador'], $_POST['tablero']);
            $query->execute();
        }
    }
}

if (isset($_SESSION['Jugador'])) {
    Redirect('test.php', false);
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
   
   tablero 10x10<input type="radio" name="tablero" value="10" cheked><br>
   tablero 15x15<input type="radio" name="tablero" value="15"><br>
   tablero 20x20<input type="radio" name="tablero" value="20"><br>
   <input type="submit" value="Enviar">
 </form> 


</body> 

</html>
