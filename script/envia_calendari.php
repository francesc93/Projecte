<?php
include 'conexio.php';
require('/opt/lampp/htdocs/script/PHPMailer-master/class.phpmailer.php');
require('/opt/lampp/htdocs/script/PHPMailer-master/class.smtp.php');

//Aquest script s'executa cada dia comprovan si ala setmana segunt hi han competicons dins la taual de calendari
// si hi han alguna comptecio s'envia un email a tots el usuaris registrats depenent de la seva categoria 
$calendari= mysql_query("SELECT a.ID_USUARI, a.EMAIL, b.ID_COMPETICIO, b.COMPETICIO, b.DATA_HORA_1, b.DATA_HORA_2 ,a.CATEGORIA FROM USUARIS_INTERNS a, DETALL_CALENDARI b where a.CATEGORIA=b.CATEGORIA "); 
$data_avui = date("Y-m-d H:i:s"); 	 //obtenim la data d'avui 
$semana = strtotime ( '+7 day' , strtotime ( $data_avui ) ) ; //a data d'avui li sumem una setmana 
$semana = date("Y-m-d" , $semana ); //li donem el correcte format a la data semana seguent
									
	while ($registre = mysql_fetch_array($calendari)) {		//recorrem totes les competicions
		$data = strtotime($registre["DATA_HORA_1"]);		//per comprara les dates utilitzem aquesta funcio per tranformar la data 
		$data_dia = date("Y-m-d" , $data );												
		$data_hora = date("H:i:s" , $data );	
		$data2 = strtotime($registre["DATA_HORA_1"]);		//per comprara les dates utilitzem aquesta funcio per tranformar la data 
		$data_dia2 = date("Y-m-d" , $data );												
		$data_hora2 = date("H:i:s" , $data );	
		
		if($semana==$data_dia){
			$mail = new PHPMailer();
			$mail->IsSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.mandrillapp.com';                 // Specify main and backup server
			$mail->Port = 587;                                    // Set the SMTP port
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'ffores93@gmail.com';               // SMTP username
			$mail->Password = 'FkUFGLdyRD7JCWlJ3xMRNw';           // SMTP password
			$mail->SMTPSecure = 'tls';      
			$mail->CharSet = 'UTF-8';                      // Enable encryption, 'ssl' also accepted
			$body = "Tens una competició la pròxima setmana,".$registre["COMPETICIO"]." el dia ". $data_dia." ales ".$data_hora." i finalitza el ". $data_dia2." ales ".$data_hora2.", salutacions de part del club de natació Tortosa!!";

			$mail->From = 'ffores93@gmail.com';

			$mail->FromName = "Club N.Tortosa";

			$mail->Subject = $registre["COMPETICIO"];
			$mail->AltBody = "prova"; 

			$mail->MsgHTML($body);

			$mail->AddAddress($registre["EMAIL"]);


			if(!$mail->Send()) {
				echo "Error al enviar: " . $mail->ErrorInfo;
			} else {
				echo "Enviat!!";
			}	
		}
	}

?>
