<?php 
include 'conexio.php';
$usuaris= mysql_query("SELECT * FROM USUARIS_INTERNS"); 


while ($registre = mysql_fetch_array($usuaris)) {
	/*echo $registre["ID_USUARI"]." ";
	echo $registre["USUARI"]." ";
	echo $registre["SEXE"]." ";
	echo $registre["DATA_NAIXEMENT"] ;
	echo calcular_categoria($registre["SEXE"], calcular_temporada($registre["DATA_NAIXEMENT"]), $registre["ESTAT"])." "; */
	$asignar =  calcular_categoria($registre["SEXE"], calcular_edad($registre["DATA_NAIXEMENT"]), $registre["ESTAT"])." </br>";
	$originalDate = $registre["DATA_NAIXEMENT"];
	$newDate = date("d-m-Y", strtotime($originalDate));
	//echo $asignar;
	$sql = "UPDATE USUARIS_INTERNS ".
       "SET CATEGORIA = '".calcular_categoria($registre["SEXE"], calcular_edad($newDate), $registre["ESTAT"])."'".
       "WHERE ID_USUARI = '".$registre["ID_USUARI"]."'" ;

		mysql_select_db('NATACIO');
		$retval = mysql_query( $sql);
		if(! $retval )
		{
		  die('Could not update data: ' . mysql_error());
		}
		echo "Updated data successfully\n";
}



// Funcio per calcula la edat
function calcular_edad($fecha){
    $dias = explode("-", $fecha, 3);
    $dias = mktime(0,0,0,$dias[1],$dias[0],$dias[2]);
    $edad = (int)((time()-$dias)/31556926 );
    return $edad;
}

// Funcio per calcular la categoria tenin en compte el sexe 
function calcular_categoria($sexe,$edad,$estat) {
	switch($estat){
		case 'ESCOLAR':
			switch ($edad) {
				case 7:
				case 8:
					return 'PB';
					break;
				case 9:
				case 10:
					return 'B';
					break;
				case 11:
				case 12:
					return 'ALE';
					break;
				case 13:
				case 14:
					return 'INF';
					break;
				case 15:
				case 16:
					return 'JUV';
					break;
				default:
				return 'CAD';
				break;
			}
			break;
	case 'FEDERAT':
	switch ($sexe) {
		case 'MASCULI':
			switch ($edad) {
				case 8:
					echo 'PB';
					break;
				case 9:
				case 10:
				case 11:
					return 'B';
					break;
				case 12:
				case 13:
					return 'ALE';
					break;
				case 14:
				case 15:
				case 16:
					return 'INF';
					break;
				case 17:
				case 18:
					return 'JUV';
					break;
				case 19:
				case 20:
					return 'ABJ';
					break;
				default:
				return 'ABS';
				break;

			}
			break;
		case 'FEMENI':
			switch ($edad) {
				case 8:
					return 'PB';
					break;
				case 9:
				case 10:
					return 'B';
					break;
				case 11:
				case 12:
					return 'ALE';
					break;
				case 13:
				case 14:
					return 'INF';
					break;
				case 15:
				case 16:
					return 'JUV';
					break;
				case 17:
				case 18:
					return 'ABJ';
					break;
				default:
					return 'ABS';

			}
	}
	break;
}

}

function calcular_temporada($anys) {
            // Agafem el principi de cada temporada nova 
            $ninici = "1-09-".date("Y");
            $nfinal = "31-08-".date("Y", strtotime('+1 year'));
            // Convertixo les dates a format date           
            $minici =  strtotime($ninici);
            $mfinal = strtotime($nfinal);
            // Agafo la data pasada per parametre que es uns string i la paso a DATA
            $fechaNaixement = strtotime($anys);
            $dataarreglada= date('d-m-Y',$fechaNaixement);
            for($i=$minici; $i<=$mfinal; $i+=86400) {
                if( date('d',$fechaNaixement)== date('d',$i) && date('m',$fechaNaixement)== date('m',$i)) {
                   $edat = date("Y", strtotime('+1 year')) - date('Y',$fechaNaixement);
                    return $edat;
                }
            }
	}


// Tot el code Anterior es funcional
?>

<html>
<head>
<meta charset="UTF-8">
	<title>Hola </title>
</head>
<body>
<h1>Edat Actual </h1>
<h2> La teva edat actual es <?php echo calcular_edad("26-03-1999"); ?> i aquesta es la teva categoria <?php echo calcular_categoria("MASCULI", calcular_edad("26-03-1999") , "ESCOLAR"); ?> </h2>

<h1> Edat Durant la temporada </h1>

<!--<h2> <?php //echo calcular_temporada("19-03-1993"); ?> </h2>-->

<h1>aquesta sera la teva categoria aquesta temporada que be <?php calcular_categoria("MASCULI", calcular_temporada("26-03-1999") , "ESCOLAR");  ?>  </h1>


</html>
