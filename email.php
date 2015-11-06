<?php
if(isset($_GET['email'])) {

// Debes editar las pr&oacute;ximas dos l&iacute;neas de c&oacute;digo de acuerdo con tus preferencias
$email_to = "electronicaysistemas@gmail.com";
$email_subject = "Contacto desde el sitio web " . "dirigido a: " . $_GET['dirigido'];

// Aqu&iacute; se deber&iacute;an validar los datos ingresados por el usuario

if(!isset($_GET['nombre']) ||
!isset($_GET['email']) ||
!isset($_GET['dirigido']) ||
!isset($_GET['comentarios'])) {	
	
	
	
	

echo "<p>Ocurri&oacute; un error y el formulario no ha sido enviado. </p><br />";
echo "Por favor, vuelva atr&aacute;s y verifique la informaci&oacute;n ingresada<br />";
die();
}

$email_message = "Nombre: " . $_GET['nombre'] . " E-mail: " . $_GET['email'] . " Comentarios : " . $_GET['comentarios'] . " Dirigido a: ". $_GET['dirigido'] ."\n";



// Ahora se env&iacute;a el e-mail usando la funci&oacute;n mail() de PHP

@mail($email_to, $email_subject, $email_message);

}
?>

<SCRIPT LANGUAGE="javascript"> 
    alert('Su mensaje a sido enviado! - lcelectricalcontractor.com - ');
    document.location=('index.php');
</SCRIPT>