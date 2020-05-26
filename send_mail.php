<?php 
    if(isset($_POST['send'])){
    $connect = mysqli_connect('localhost' , 'root' , '' , 'transporting');
    $email  = $_POST['email'];
    // echo $email;
    $insert = "INSERT INTO subscribers (email)VALUES('$email')";
    mysqli_query($connect , $insert);
    echo "<script>alert('Your Subscription was Successful check your email')</script>";
    header('refresh:0');
 }else{
    echo 'Wrong';
 }
 ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

	$connect = mysqli_connect('localhost' , 'root' , '' , 'transporting');
	$select = "SELECT * FROM subscribers";
	$query = mysqli_query($connect , $select);
		while ($row = mysqli_fetch_array($query)) {
            print_r($row);

				// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ubaidismail378@gmail.com';                     // SMTP username
    $mail->Password   = '12345$$$$12345';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ubaidismail378@gmail.com', 'Mailer');
    $input = $_POST['email'];
    $mail->addAddress($input);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('ubaidismail378@gmail.com', 'ubaid');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'subscription';
    $mail->Body    = 'Thanks For subscribing us';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
		}
 ?>