         <?php
 $info =  $Call->Targeted_information('investment','id',$_GET['id']);
  $info2 =  $Call->Targeted_information('user','username',$_GET['email']);
   //  echo $info['email'];

     ?>


     <form action="#" method="post">
   <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Approve Withdrawal </h3>
                </div>
              
              </div>
            </div>
            <div class="card-body">


                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Plan Amount</label>
                        <input type="number" readonly="readonly"  class="form-control"  name="amount" value="<?php echo $info['Amount'];?>" style="font-size:17px; font-weight:bold;" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Balance</label>
                        <input type="text" id="SelctPlan" class="form-control" style="font-size:17px; font-weight:bold;" readonly="readonly" value="<?php echo '$'.number_format($info2['balance']);?>">
                      </div>

                   
                    </div>
                    
                        <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Balance</label>
                      <textarea class="form-control"><?php echo '$'.number_format($info2['balance']);?></textarea>
                      </div>

                   
                    </div>
                    
                    
                    
                            <div class="col-lg-6">
                           <div class="form-group">
                        <label class="form-control-label">Account WalletID</label>
                    <input type="text" name="wallet" class="form-control" style="font-size:17px; font-weight:bold;" value="<?php echo'BTC: '.$info2['walletID'];?>  ">
                      </div></div>

                        <div class="col-lg-6">
                           <div class="form-group">
                        <label class="form-control-label">Tx Batch</label>
                    <input type="text" id="SelctPlan" name="Batch" class="form-control" style="font-size:17px; font-weight:bold;" value="">
                      </div></div>


                  </div>
                  <div class="row">
                    
               
                       <div class="col-lg-6">
                      <div class="form-group">
                    
                        <input type="submit" class="btn btn-primary form-control" value="Approve Withdrawal" id="Btn" name="apprv">
                      </div>
                    </div>

                      <div class="col-lg-6">
                      <div class="form-group">
                    
                        <input type="submit" class="btn btn-danger form-control" value="Delete Request" id="Btn" name="del">
                      </div>
                    </div>
                    
                  </div>
                </div>
              

              </form>
              <?php
              if (isset($_POST['del'])) {
                  $amount = $_POST['amount'];
                  $Ex=$Call->Approving_New_Deposit($amount,$_GET['email']);
                  if ($Ex==true) {
                  $Call->deleting('investment','id',$_GET['id']);
          if ($Call==true) {
     echo '<script>alert("Deposit Succesfully Deleted")</script>';
     echo '<script>window.location="index.php?widrawal"</script>';
  }
                  }

              }





              ?>



                <?php
                if (isset($_POST['apprv'])) {
                   $amount = $_POST['amount'];
                   $wallet = $_POST['wallet'];
                    $Batch = $_POST['Batch'];


                    $url = "https://blockchain.info/stats?format=json";
                    $stats = json_decode(file_get_contents($url), true);
                    $btcValue = $stats['market_price_usd'];
                    $usdCost =  $amount;
                    
                    $convertedCost = $usdCost / $btcValue;
                    
          // $Execute = $Call->Update_Balance_afterWidrawal($amount,$_GET['email']);
          //               if ($Execute == true) {
                       
     $Run=$Call->Changing_Investment_stat('Withdraw',$_GET['id']);
   if ($Run == true) {
                                
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
$mail->addAddress($info2['email']);     // Add a recipient

//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Widthrawal Has been Sent";

$mail->Body    = '
<div class="header" style="background-color:rgb(5, 149, 5);color:white; padding:15px; text-align:center;border-radius:20px;"><h2>Cadence Partner Limited</h2></div>
              <div id="me" style="background-color:#F5F5F5; height:auto;width:auto; padding:18px;">
<p>Hello  '.$info2['fullname'].'</p>

<p>You have successfully received '.$convertedCost.'BTC ($'.$amount.')  from cadencepartnerlimited.org to your wallet address <br /> <br />
Wallet address sent to: '.$wallet.'<br /> <br />

Transaction Batch:'.$Batch.'<br /><br /> </P>
<p>For more enquiry on your account information, kindly contact us with the use of our live chat service.</p>
<p><a href="https://cadencepartnerlimited.org/login.php">https://cadencepartnerlimited.org?login</a></p>
 <p><br />Thank You for choosing Cadence Partner Limited</p>
 </div>';


$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    
         
      
                               echo '<script>alert("Withdrawal Succesfully Aprroved")</script>';
                               echo '<script>window.location="index.php?widrawal"</script>';
          //  echo '<script>window.location="index.php?dashboard"</script>';
   //  echo '<script> swal("success","Message Delievered","success");</script>';
}
              
 

                                
                              // echo '<script>alert("Withdrawal Succesfully Aprroved")</script>';
                             //  echo '<script>window.location="index.php?widrawal"</script>';
                            }  else{
                        echo '<script> swal("Error","Unable to Approve Payment","error");</script>';
                        }
                    
                        
               // }

                  
                }



                ?>

            </div>
          </div>
        </div>


      