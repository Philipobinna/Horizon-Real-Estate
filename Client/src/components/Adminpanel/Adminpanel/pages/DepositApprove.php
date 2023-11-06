<?php
          $info =  $Call->Targeted_information('investment', 'id', $_GET['id']);
          $info2 =  $Call->Targeted_information('user', 'username', $_GET['email']);
          //  echo $info['investDate'];

          $MatureDate = date("Y-M-d h:i", strtotime($info['investDate'] . '+' . $info['hours']));
      
          ?>





         <form action="#" method="post">
           <div class="col-xl-12 order-xl-1">
             <div class="card">
               <div class="card-header">
                 <div class="row align-items-center">
                   <div class="col-8">
                     <h3 class="mb-0">Approve Deposit </h3>
                   </div>

                 </div>
               </div>
               <div class="card-body">


                 <div class="pl-lg-4">
                   <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-username">Plan Amount</label>
                         <input type="number" readonly="readonly" class="form-control" name="amount" value="<?php echo $info['Amount']; ?>" style="font-size:17px; font-weight:bold;">
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label">Selected Plan</label>
                         <input type="text" id="SelctPlan" class="form-control" style="font-size:17px; font-weight:bold;" readonly="readonly" value="<?php echo $info['plan']; ?>">
                       </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-first-name">Percentage Profit</label>
                         <input type="text" id="InvestProfit" class="form-control" value="<?php echo $info['profit']; ?>" style="font-size:17px; font-weight:bold;" readonly="readonly" name="Pertageprofit">
                       </div>
                     </div>

                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label">Approve</label>
                         <input type="submit" class="btn btn-primary form-control" value="Approve Payment" id="Btn" name="apprv">
                       </div>
                     </div>

                   </div>
                 </div>


         </form>


         <?php
         if (isset($_POST['apprv'])) {
          $amount = $_POST['amount'];
         // $Call->Approving_New_Deposit($amount,$_GET['email']);
           // if ($Call==true) {

             $investedAmount = $info["Amount"];
             $referralBonus = $investedAmount * 0.1;
             $referralUsername = $info2["refusername"];
             $Call->addReferralBonus($referralUsername, $referralBonus);

             $Execute = $Call->Changing_Investment_stat('Active', $_GET['id']);
               if ($Execute == true) {

                $Call->updating_investingMent_matureDate($MatureDate, $_GET['id']);

                
       
                  
                     
                           


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

              $mail->Subject = "Deposit Approved";

              $mail->Body    = '
              <div class="header" style="background-color:rgb(5, 149, 5);color:white; padding:15px; text-align:center;border-radius:20px;"><h2>Cadence Partner Limited</h2></div>
              <div id="me" style="background-color:#F5F5F5; height:auto;width:auto; padding:18px;">
              <p>Hello  ' . $info2['fullname'] . '</p>

              <p>Your Deposit has been received and Approved <br />
              Amount: $' . $amount . '<br />
              Profit: $' . $info['profit'] . '<br />
              <a href="https://cadencepartnerlimited.org/login.php">https://cadencepartnerlimited.org?login</a> </P>
              <p><br />Thank You for choosing Cadence Partner Limited</p></div>';


              $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

              if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
              } else {


                echo '<script>alert("Deposit Succesfully Aprroved")</script>';
                echo '<script>window.location="index.php?approveDeposit"</script>';
                //  echo '<script>window.location="index.php?dashboard"</script>';
                //  echo '<script> swal("success","Message Delievered","success");</script>';
              }
            } else {
              echo '<script> swal("Error","Unable to Approve Payment","error");</script>';
            }
            // }


          }



          ?>


         </div>
         </div>
         </div>