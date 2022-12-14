<?php
// exit;
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);



$nome =      (empty($_POST['nome']))? false : $_POST['nome'];
$email =     (empty($_POST['email']))? false : $_POST['email'];

            

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.uni5.net';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'confirmacao@franciscoecarolina.com.br';                     //SMTP username
    $mail->Password   = 'RZtG5qgpyfzSwFb';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->CharSet = 'UTF-8';
    //Recipients
    $mail->setFrom('confirmacao@franciscoecarolina.com.br', 'Francisco e Carolina');
    $mail->addAddress($email, $nome);     //Add a recipient
    /* $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = ('Confirma????o de presen??a');
    $mail->Body    = ('<b>Obrigado por confirmar a sua presen??a!</b><br></br><br>Iremos comemorar nosso casamento no dia 17/05/2022, uma ter??a-feira, ??s 19:30hrs. <br></br><u>A toler??ncia de chegada para a nossa reserva ser?? at?? 20:30hrs!</u> </br> <br> O restaurante onde iremos comemorar ?? o Celeiro da fazenda! Endere??o do Restaurante:  Av. Luiz Dumont Villares, 651 - Jardim S??o Paulo, S??o Paulo - SP, 02085-100 </br> <br>O valor do Rodizio por Adulto ?? de 59,90. Crian??as at?? 7 anos paga somente a bebida e crian??as at?? 12 anos paga 60% do rodizio.</br> <br>Ser?? incrivel ter a sua presen??a no nosso grande dia!</br> <br> <b> Beijos Carolina e Francisco! </b> </br>' );
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo  "<script>alert('Enviamos os dados para o seu Email. Caso n??o tenha recebido, verifique seu lixo eletr??nico/spam :)');</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
echo "<meta http-equiv=\"refresh\" content=\"1; url=/\">";
