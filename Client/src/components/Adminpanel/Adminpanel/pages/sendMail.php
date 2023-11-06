 <br /><div class="col-xl-8 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Send Mail</h5>
                     
                    </div>
                   
                  </div><br />
                  <form action="#" method="POST">

<p>Receiver:<input type="text" value="<?php echo $_GET['email']?>" class="form-control" name="receiver"></p>

<p>Subject:<input type="text" value="" class="form-control" name="subject"></p>


<p>Message:<textarea class="form-control" name="message" style="height:250px;"></textarea></p>
<p><input type="submit" class="btn btn-primary form-control" value="Send Mail" name="snd"></p>
</form>


                
                </div>
              </div>
            </div>


         <?php


if (isset($_POST['snd'])){
	$receiver =$_POST['receiver'];
	$subject = $_POST['subject'];
	$message = trim($_POST['message']);
	
require '../PHPMailer-5.2-stable/PHPMailerAutoload.php';


$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.cadencepartnerslimited.org';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@cadencepartnerslimited.org';                 // SMTP username
$mail->Password = 'cas!hm-*&2Xr';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also 
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('info@cadencepartnerslimited.org','	info@cadencepartnerslimited.org');
$mail->addAddress($receiver);     // Add a recipient

//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;

$mail->Body    = '
<div class="header" style="background-color:rgb(5, 149, 5);color:white; padding:15px; text-align:center;border-radius:20px;"><h2>Cadence Partner Limited</h2></div>
<div id="me" style="background-color:#F5F5F5; height:auto;width:auto; padding:18px;">

<p style="font-size:17px;">'.nl2br($message).'</p></div>';


$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
     echo '<script> swal("success","Message Delievered","success");</script>';
}

}

?>