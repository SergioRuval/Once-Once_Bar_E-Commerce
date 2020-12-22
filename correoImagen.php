<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $destin = "ruvaloser@gmail.com";
    $asunto = "Pregunta de usuario";
    $cupon = "34567";
        

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $nombre = $_POST["name"];
        $correo = $_POST["mail"];
        $message = $_POST["mensaje"];
        $subscribe = $_POST["subscribe"];
        
        $msg = "<p>Nombre del usuario: " . $nombre . "<br>";
        $msg .= "<br>" . $correo . "</p>";
        $msg .= "<br>" . $message . "</p>";


    }

    $mail = new PHPMailer(true);
    $mail2 = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                      // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'octavoconcepto@gmail.com';                     // SMTP username
        $mail->Password   = 'Dany15020';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('octavoconcepto@gmail.com', 'Dani');
        $mail->addAddress($destin);
        $mail->addReplyTo($correo, $nombre);

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $msg;


        $mail->AddEmbeddedImage('images/cupon3mil.jpg',"imagen"); //ruta de archivo de imagen

      /*  // La mejor forma de enviar un correo, es creando un HTML e insertandolo de la siguiente forma, PHPMailer permite insertar, imagenes, css, etc. (No se recomienda el uso de Javascript) 
        $mail->msgHTML(file_get_contents('contenido.html'), dirname(__FILE__)); */

        $mail->send();


        echo 'El mensaje se envió bien';
    } catch (Exception $e) {
        echo "No se envió el mensaje";
    }

    header('Location: index.php');
    
?>