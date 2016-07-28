
<?php
if (isset($_REQUEST['Email']) ) {
 header("Content-Type: text/html;charset=utf-8");

    //Guardar datos en la base de datos

$Name = $_REQUEST['Name'];
$Email = $_REQUEST['Email'];
$Subject = $_REQUEST['Subject'];
$Comments = $_REQUEST['Comments'];
      
        //envio de correo
  
                        $email_from = 'aida.m@lcelectricalcontractor.com';
                        $email_to = $Email;
                        $email_subject = "Request sent by: $Email $Name";
                        $email_message = "<strong>Request sent by:</strong> $Email $Name<br><strong>Message:</strong>$Comments";


                         include_once('class.phpmailer.php');
                              // Indica si los datos provienen del formulario
                          
                          $correo = new PHPMailer(); //Creamos una instancia en lugar usar mail()
                       
                      //Usamos el SetFrom para decirle al script quien envia el correo
                      $correo->SetFrom($email_from, "LC electricalcontractor");
                       
                      //Usamos el AddReplyTo para decirle al script a quien tiene que responder el correo
                      $correo->AddReplyTo($email_to,$Name);
                       
                      //Usamos el AddAddress para agregar un destinatario
                      $correo->AddAddress($email_to, $Name);

                      //Agregar copia
                      $correo->AddCC($email_from, "LC electricalcontractor");
                       
                      //Ponemos el asunto del mensaje
                      $correo->Subject = $email_subject;
                       
                      /*
                       * Si deseamos enviar un correo con formato HTML utilizaremos MsgHTML:
                       * $correo->MsgHTML("<strong>Mi Mensaje en HTML</strong>");
                       * Si deseamos enviarlo en texto plano, haremos lo siguiente:
                       * $correo->IsHTML(false);
                       * $correo->Body = "Mi mensaje en Texto Plano";
                       */
                      $correo->MsgHTML($email_message);
                       
                      //Si deseamos agregar un archivo adjunto utilizamos AddAttachment
                       
                      //Enviamos el correo
                      if(!$correo->Send()) {
                        echo "Hubo un error: " . $correo->ErrorInfo;
                      } else {
                      //  echo "Mensaje enviado con exito.";
                      }
        //envio de correo
      
}
?>
 
<?php   
  
//reenvio de pagina
print "<script>alert('Your request has been sent!');window.location='../index.html';</script>";
 ?>