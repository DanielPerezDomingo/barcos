<?php
include "table.php"; 
ini_set('display_errors', 'On');
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}
session_start();
if (isset($_POST["logout"])) {
    unset($_SESSION["Jugador"]) ;
}
if (!isset($_SESSION['Jugador'])) {
    Redirect('index.php', false);
}
?>
<html>
   <head>
    <link rel="stylesheet" type="text/css" href="style.css"/>
   <title>
    <?php 
        //echo $_SESSION['Jugador']." ".$_SESSION[]... 
        printf("%d-%s-%dx%d", $_SESSION["Idpartidas"], $_SESSION["Jugador"], $_SESSION["Tablero"], $_SESSION["Tablero"]);
   
?> 
   </title>
   </head>
   <body>
<?php print_r($_SESSION);?>       
   <form action="" method="POST">
   barco pequeño<input type="radio" name="barco" value="2"><br>
   barco mediano<input type="radio" name="barco" value="3"><br>
   barco grande<input type="radio" name="barco" value="4"><br>
 Coordenada X <input type="text" name "x"><br>
 coordenada Y <input type="text" name "Y"><br>
 <input type="submit" name"enviar"><br>
 
<?php 
tablero($_SESSION["Tablero"]);
?>

<input type="hidden" name="logout" value="1">
<input type="submit" value="EXIT">

</form> 
<?php
$mysqli=new mysqli("localhost", "root", "-*/987<zx", "barcos");
if ($mysqli->connect_error) {
    echo "Error al realizar la conexion";
} else {
    $sql="select * from partidas";
    $res=$mysqli->query($sql);

    while ($fila = $res->fetch_assoc()) {
        printf("nº partida %d para el jugador %s tablero %dx%d <br>", $fila["Idpartidas"], $fila["Jugador"], $fila["Tablero"], $fila["Tablero"]);
    }
}
       
       ?>
      
   </body> 

</html>
