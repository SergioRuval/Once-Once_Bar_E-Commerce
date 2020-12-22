<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $destin = "perezsamantha310@gmail.com";
    $asunto = "Pregunta de usuario";
        
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $nombre = $_POST["name"];
        $correo = $_POST["mail"];
        $mensaje = $_POST["message"];
        
        $msg = "<p>Nombre del usuario: " . $nombre . "<br>";
        $msg = "<p>Correo:" . $correo . "<br>";
        $msg .= "<br>" . $mensaje . "</p>";
    }

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'perezsamantha310@gmail.com';                      // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'elestanteoficial@gmail.com';                     // SMTP username
        $mail->Password   = '1234hola1234';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('elestanteoficial@gmail.com', 'Samantha');
        $mail->addAddress($destin);
        $mail->addReplyTo($correo, $nombre);

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $msg;

        $mail->send();
        echo 'El mensaje se envió bien';
    } catch (Exception $e) {
        echo "No se envió el mensaje";
    }

    header('Location:' . getenv('HTTP_REFERER'));
    
?>