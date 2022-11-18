<html>
 <head>
 	<title>Exemple de lectura de dades a MySQL</title>
 	<style>
 		body{
 		}
 		table,td {
 			border: 1px solid black;
 			border-spacing: 0px;
 		}
 	</style>
 </head>
 
 <body>
 	<h1>Ciutats per país</h1>
 
 	<?php
 		$conn = mysqli_connect('localhost','enric','enric123');
 		mysqli_select_db($conn, 'world');
        $pais = $_GET["codi_pais"];
 		$consulta = "SELECT * FROM city WHERE CountryCode='$pais';";
 		$resultat = mysqli_query($conn, $consulta);
 		if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}
 	?>
 
 	<!-- (3.1) aquí va la taula HTML que omplirem amb dades de la BBDD -->
 	<table>
 	<!-- la capçalera de la taula l'hem de fer nosaltres -->
 	<thead><td colspan="4" align="center" bgcolor="cyan">Llistat de ciutats</td></thead>
 	<?php
 		while( $registre = mysqli_fetch_assoc($resultat) )
 		{
 			echo "\t<tr>\n";
 			echo "\t\t<td>".$registre["Name"]."</td>\n";
 			echo "\t\t<td>".$registre['CountryCode']."</td>\n";
 			echo "\t\t<td>".$registre["District"]."</td>\n";
 			echo "\t\t<td>".$registre['Population']."</td>\n";
			echo "\t</tr>\n";
 		}
 	?>
 	</table>

    <a href="index.php">Torna a l'inici</a>

 </body>
</html>