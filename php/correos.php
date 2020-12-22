<?php

    $destinatario = 'hola@alexcgdesign.com'
    //Correo al que se envirara el mensaje

    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $mensaje = $_POST['mensaje'];
    $subscribe = $_POST['subscribe'];

    $header = "Enviado desde once:once sports bar";
    $mensajeCompleto = $mensaje . "\nAtentamente: " . $name;

    mail($destinatario, $mensajeCompleto, $header);
    echo "<script>alert('correo enviado exitosamente')</script>";





?>  