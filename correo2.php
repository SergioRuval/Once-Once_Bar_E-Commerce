<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $destin = "ruvaloser@gmail.com";
    $asunto = "Cupón";
    $cupon = "34567";
        
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $correo = $_POST["email"];
    }

    $mail2 = new PHPMailer(true);

    try {
        $msg = "<p> Te regalamos el siguiente cupon: <br>";
        $msg .= "<br>" . $cupon . "</p>";


        $mail2->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail2->isSMTP();                                            // Send using SMTP
        $mail2->Host       = 'smtp.gmail.com';                      // Set the SMTP server to send through
        $mail2->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail2->Username   = 'octavoconcepto@gmail.com';                     // SMTP username
        $mail2->Password   = 'Dany15020';                               // SMTP password
        $mail2->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail2->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail2->setFrom('octavoconcepto@gmail.com', 'Dani');
        $mail2->addAddress($correo);
        $mail2->addReplyTo('octavoconcepto@gmail.com','Dani');

        // Content
        $mail2->isHTML(true);                                  // Set email format to HTML
        $mail2->Subject = 'Cupon de descuento';
        $mail2->Body    = $msg;

        $mail2->send();


        echo 'El mensaje se envió bien';
    } catch (Exception $e) {
        echo "No se envió el mensaje";
    }

    header('Location: formulario.php');
    
?>