<?php
    function clean_string($string){
        $bad = array("content-type", "bcc:", "to:", "cc:", "href", "<script>", "</script>");
        return str_replace($bad, "", $string);
    }

    //Send email to our team
    $to = 'up201705160@fe.up.pt, up201706156@fe.up.pt, up201706162@fe.up.pt';
    
    $subject = 'RENTIFY: '.clean_string($_POST['subject']);
    $message = clean_string($_POST['message']);

    $email_from = clean_string($_POST['email']);

    $headers = 'From:' . $email_from . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    $name = clean_string($_POST['first_name']).' '.clean_string($_POST['last_name']);

    $new_message = "Thank you " . $name . " for contacting us. We will reply as soon as possible. \r\n \r\n" . 
                    "Here is a copy of your message: \r\n" . 
                    $message;  

    $headers = "From: Rentify \r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($email_from, $subject, $new_message, $headers);

    header('Location: ../pages/contacts.php');
    die();
?>

