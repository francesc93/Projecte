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
$mail = "Prueba de mensaje";
//Titulo
$titulo = "PRUEBA DE TITULO";
//cabecera
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: Geeky Theory <ffores4@gmail.com>\r\n";
//Enviamos el mensaje a info@geekytheory.com 
$bool = mail("ffores93@gmail.com",$titulo,$mail,$headers);
if($bool){
    echo "Mensaje enviado";
}else{
    echo "Mensaje no enviado";
}
?>
