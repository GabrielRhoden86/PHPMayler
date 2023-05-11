<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>PHPMayler</title>
</head>

<body>
  <?php
  //Import PHPMailer classes into the global namespace

  //These must be at the top of your script, not inside a function

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;


  require 'vendor/autoload.php';


  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {

    //Tira espaço em branco => " ' ' " e substitui por sem espaço => " '' "
    $emailForm = str_replace(" ", "", $_POST['email']);

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
    $mail->isHTML(true);                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gabrielrhodden@gmail.com';                     //SMTP username
    $mail->Password   = 'clwuinwyxolxwmch';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port  = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($emailForm, 'Mailer');
    $mail->addAddress($emailForm, 'information');

    // $mail->addAddress('digo.rhoden@gmail.com', 'E-mail teste');     //Add a recipient
    // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');  copia oculta
    // $mail->addBCC('bcc@example.com');s
    // $mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments add anexos
    // $mail->addAttachment('image.jpg', 'new.jpg');    //Optional name

    $mail->AddEmbeddedImage('./img/image.jpg', 'logo_2u');

    //Content
    $mail->isHTML(true);  //Set email format to HTML

    $mail->Subject = 'Menssagem via Site';

    $body = "<body style='background-color:#f7f2f2' b>

        <p style='color:gray;'>Menssagem Enviada Pelo Site</p></b> 

        Nome: " . $_POST['nome'] . "<br>
        Email: " . $emailForm . "<br>
        Menssagem: " . $_POST['msg'] . "<br><br>
        
       <figure>
         <img src='cid:logo_2u'  alt='imagem' height='240' width='270'>
         <figcaption>Informações da Figura</figcaption>
       </figure>
      
        </body>";

    $mail->Body = $body;

    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if ($mail->send()) {
      echo "<script>    
            Swal.fire({
                title: 'Email Encaminhado Com Sucesso',
                text: '',
                type: 'success',
                
                confirmButtonText: 'Ok',
                allowOutsideClick: false,
                   }).then((result) => {
                if (result.isConfirmed) {
                  window.location='./index.php';
                } 
              })
             </script>";
    }
  } catch (Exception $e) {

    echo "Erro ao enviar o email: {$mail->ErrorInfo}";
  }

  ?>
</body>

</html>