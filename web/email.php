<?php

$to = 'francisco.ecletica@ecletica.com.br';
$subject = 'teste de envio de email';
$message = 'from: francisco.ecletica@ecletica.com.br';
$headers = 'from: francisco.ecletica@ecletica.com.br' . "\r\n" .
        'reply -to: francisco.ecletica@ecletica.com.br';

        mail($to, $subject, $message, $headers);
        print "enviado";
?>