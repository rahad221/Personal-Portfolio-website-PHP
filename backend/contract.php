<?php
    session_start();
    require_once('../db_connect.php');

    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    $flag = false;

    if($name){
        $remove_space = str_replace(" ","", $name);
        if(ctype_alpha($remove_space)){
            $_SESSION['old_name'] = $name;
        }else{
            $_SESSION['name_error'] = "Enter Your Wrong Type Name";
            header('location: ../fontend/index.php');
        }
    }else{
        $_SESSION['name_error'] = "Enter Your Name";
        header('location: ../fontend/index.php');
    }
    if($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['old_email'] = $email;
        }else{
            $_SESSION['email_error'] = "Enter Your Wrong Type E-mail";
            header('location: ../fontend/index.php');
        }
    }else{
        $_SESSION['email_error'] = "Enter Your E-mail";
        header('location: ../fontend/index.php');
    }
    if($message){
        $_SESSION['old_message'] = $email;
    }else{
        $_SESSION['message_error'] = "Enter Your Message";
        header('location: ../fontend/index.php');
    }

    if($flag){
        header('location: ../fontend/index.php');
    }else{
        $contract_insert_query = "INSERT INTO `contract`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";
        $contract_insert_query_db = mysqli_query($db_connect, $contract_insert_query);
        header('location: ../fontend/index.php');
    }

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 1;
        $mail->isSMTP();  //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';   //Set the SMTP server to send through
        $mail->SMTPAuth   = true; //Enable SMTP authentication
        $mail->Username   = 'mdrahad526678@gmail.com'; //SMTP username
        $mail->Password   = 'pdrykiepidcgwypo'; //SMTP password
        $mail->SMTPSecure = 'tls';//Enable implicit TLS encryption
        $mail->Port       =  587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('mdrahad526678@gmail.com', 'Apple');
        $mail->addAddress('rotikhatun2002@gmail.com', "$name");     //Add a recipient

        //Content
        $mail->isHTML(true);
        $mail->Subject = "Message from $name";
        $mail->Body    = "$message";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?> 