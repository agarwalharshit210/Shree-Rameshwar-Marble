<?php
    use PHPMailer\PHPMailer\PHPMailer;
    if( isset($_POST['name']) && isset($_POST['email'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];  
        $body = $_POST['body'];
        
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";


        $mail = new PHPMailer();

        //smtp settings
        $mail->isSMTP();                                // Set mailer to use SMTP
        $mail->Host ="smtp.gmail.com";                  // Specify main SMTP server
        $mail->SMTPAuth = true;                         // Enable SMTP authentication
        $mail->Username ="agrawalharshit23122@gmail.com";   // SMTP username
        $mail->Password ="mruijvrmqsdfxvxm";
        $mail->Port = 587;                              // TCP port to connect to
        $mail->SMTPSecure = 'tls';                      // Enable TLS encryption, 'ssl' also 


        //email settings 
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress("agrawalharshit23122@gmail.com");
        $mail->Subject = ("$email ($subject)");
        $mail->Body = $body;


        if($mail->send()){
            $status = "success";
            $response = "Email is sent!";

        }    
        else{
            $status = 'failed';
            $response = "Something is wrong: <br>" . $mail->ErrorInfo;

        }

        exit(json_encode(array("status" => $status, "response" => $response)));



    }


?>