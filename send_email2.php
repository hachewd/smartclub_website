<?php
	if (isset($_POST) && !empty($_POST)) {
		
		//validación de datos
		$error = array();
		
		//$con = mysql_connect(SERVER, USERNAME, PASSWORD) or die(mysql_error());
		$i = 0;
		$keys = array_keys($_POST);
		for ($i; $i < sizeof($keys); $i++){
			$_POST[$keys[$i]] = utf8_decode(strip_tags(addslashes($_POST[$keys[$i]])));
		}
		
		/*$pasaporte = false;
		if (strlen($_POST['cedula'])>9) {
			$pasaporte = true;
		}*/
		
		if ($_POST['fname'] == "") {
			$error["fname"] = "Complete el campo de Nombre";
		}
		if ($_POST["email"] == "") {
			$error["email"] = "Ingrese su e-mail";
		}
		else {
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$error["email"] = "Email inválido";
			}
		}

		if ($_POST["comments"] == "") {
			$error["comments"] = "Escriba su comentario o pregunta";
		}
		if (count($error)>0){
			die(json_encode($error));
		}
		else
		{
		
			$para  = 'info@insistco.com' . ', '; // atención a la coma
			//$para .= 'wez@example.com';

			// subject
			$titulo = 'Contacto desde Smartclub';

			// message
			$mensaje = '
			<html>
			<head>
			  <title>Contacto desde Smartclub.com</title>
			</head>
			<body>
			  <p>Se envi&oacute; una informaci&oacute;n desde el sitio web</p>
			  <table>
			    <tr>
			      <td style="width:25%;">Nombre:</td>
			      <td style="width:50%;">'.$_POST['fname'].'</td>
			    </tr>
			    <tr>
			      <td>E-mail:</td>
			      <td>'.$_POST['email'].'</td>
			    </tr>
			    <tr>
			       <td>comentario</td>
			      <td>'.$_POST['comments'].'</td>
			    </tr>
			  </table>
			</body>
			</html>
			';

			// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// Cabeceras adicionales
			//$cabeceras .= 'To:'.$_POST["email"]. "\r\n";
			$cabeceras .= 'From: Smartclub Website <info@smartclub.com>' . "\r\n";
			$cabeceras .= 'BCC: Smartclub Website <hanzelgmr@gmail.com>' . "\r\n";


			// Mail it
			mail($para, $titulo, $mensaje, $cabeceras);
	  //}
		}
		
		die(json_encode(array('resultado'=>1)));
		
	}
?>