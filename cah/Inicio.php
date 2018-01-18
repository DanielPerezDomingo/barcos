<html>
<head>
<title>introduccion de datos</title>
</head>
<body>
<!--fromulario de recoleccion de datos!-->
<form action="" method="GET">
Introduce el texto <br/>
<input type="text" name="texto" > <br/>
<input type="radio" name="color" value="negras">
carta negra <br/>
<input type="radio" name="color" value="blancas">
carta blanca <br/ >
<input type="submit">

</form>
<?php 
/*por motivos de pruebas esta parte va  a estar en otro documento 
//desactivamos las warning de que no tienen datos 
//error_reporting(E_ALL ^ E_NOTICE);*/

//guardamos los datos recogidos en variables
    $Contenido=($_GET['texto']);
    $Color=($_GET['color']) ;
		

//conectamos con la bbdd
//una nueva instancia de mysqli
$mysqli = new mysqli("127.0.0.1","root","") ;
// (conexion,usuario,password)
//comprobarmos si hay error de conexion
if($mysqli->connect_error){
echo "error a conectar";
}
else{
	//echo "acabo de conectar";
    //aqui hacemos todo lo que queramos de sql 
    //escribiendo mysql->opcion* (ej:query, select_db) 
    $mysqli->select_db("cah") or die ("error al seleccionar cah");
$mysqli->query ("INSERT INTO ".$Color."(contenido)"." VALUES "."('$Contenido')");
//echo "<br/>";
//echo "INSERT INTO ".$Color. "(contenido)"." VALUES "."('$Contenido')";
	
}
$mysqli->close();

?>
</body
</html>