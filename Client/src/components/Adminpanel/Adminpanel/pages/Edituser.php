
         <?php
 $info =  $Call->Targeted_information('user','id',$_GET['edit']);
   //  echo $info['email'];

     ?>

<br />



<?php
if (isset($_POST['UpdateU'])) {
$Fname = trim($_POST['Fname']);
$phone = trim($_POST['phone']);
$mail = trim($_POST['mail']);
$user = trim($_POST['user']);
// $quest = trim($_POST['quest']);
// $ans = trim($_POST['ans']);
$walletID = trim($_POST['walletID']);
// $perfect = trim($_POST['perfect']);
$pass = trim($_POST['pass']);
$datR = trim($_POST['datR']);
// $Earn = trim($_POST['profit']);
$baln = trim($_POST['baln']);


$Call->Updating_Client($Fname,$phone,$mail,$walletID,$pass,$baln,$datR,$user,$_GET['edit']);

if ($Call==true) {
  echo '<script>alert("Success, User Upadate Successful")</script>';# code...
}else {
  echo "Error updating record: " . mysqli_error($conn);
}

 


}





?>




<form action="#" method="post">
 <div class="container-fluid">
        <div class="header-body">
          
          <!-- Card stats -->
          <div class="row">
        
      
            <div class="col-xl-6 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                   <h5 class="card-title text-uppercase text-muted mb-0">User Detail</h5>

                    <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <tr >
                  <td>Full Name</td>
                        <td>
          <input type="text" class="form-control" value="<?php echo $info['fullname'];?>" name="Fname">

                          </td>


                </tr>
                      <tr >
                  <td>Phone</td>
                        <td>
    <input type="text" class="form-control" value="  <?php echo $info['phone'];?>" name="phone">

                        </td>


                </tr>

                      <tr >
                  <td>Email</td>
                        <td>
          <input type="email" class="form-control" value=" <?php echo $info['email'];?>" name="mail">

                         </td>


                </tr>


                     <tr >
                  <td>Username</td>
                        <td>
      <input type="text" class="form-control" value="  <?php echo $info['username'];?>" name="user">

                        </td>


                </tr>
                  

             

                      


                   


             
                      <tr >
                  <td>Status</td>
                        <td>
       <input type="text" class="form-control" readonly="readonly" value="  <?php echo $info['status'];?>">

                        </td>


                </tr>

               

     
              </table>
            </div>
                   
                    </div>
                   
                  </div>
                
                </div>
              </div>
            </div>




            <div class="col-xl-6 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Account info</h5>
                   
                    </div>



                         <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
               
                  

                      <tr >
                  <td>Wallet ID</td>
                        <td>
    <input type="text" class="form-control" value="    <?php echo $info['walletID'];?>" name="walletID">

                      </td>


                </tr>

               




                      <tr >
                  <td>Password</td>
                        <td><input type="Password" id="passField" value="<?php echo $info['password'];?>" class="form-control" name="pass">
                          <p><input type="checkbox" onclick="hidePassword()">Show Password</p></td>


                </tr>


                      <tr >
                  <td>Register Date</td>
                        <td>
        <input type="text" class="form-control" value="<?php echo $info['dateReg'];?>" name="datR">
                          </td>


                </tr>

               


                      <tr >
                  <td>Active Balance</td>
                        <td>
                       
<input type="text" class="form-control" value="<?php echo $info['balance'];?>" name="baln">
                          </td>


                </tr>

               
                  <tr >
        <td><input type="submit" class="btn btn-primary form-control" name="UpdateU" value="Update Data"></td>
        <td> 
           <?php
          if ( $info['status']=="Suspend") {
         
          }else{
              echo ' <input type="submit" name="sus" class="btn btn-success" value="Suspend User">';
          }

          ?>
          <input type="submit" class="btn btn-danger"  name="del" value="Delete"></td>
                       
                </tr>



     
              </table>
            </div>
                 
                  </div>
            
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</form>
 
 
 
           <?php
            if (isset($_POST['sus'])) {
             $stat = "Suspend";
            $Call->suspending_account($stat,$_GET['edit']);
            if ($Call==true) {
          echo '<script>swal("Susccess","Account has been Suspended","success");</script>'; 
            }


            }



            ?>




              <?php
              if (isset($_POST['del'])) {
                  $Call->deleting('user','id',$_GET['edit']);
          if ($Call==true) {
     echo '<script>alert("User Succesfully Deleted")</script>';
     echo '<script>window.location="index.php?users"</script>';
  }
                  

              }





              ?>





      <script type="text/javascript">
        
        function hidePassword(){
    var passwordField = document.getElementById("passField");
     var btnn = document.getElementById("createBtn");

    if (passwordField.type === "password") {
        passwordField.type = "text";
    }else{
         passwordField.type = "password";
    }

}

      </script>



      <script type="text/javascript">
        
        function hidePassword(){
    var passwordField = document.getElementById("passField");
     var btnn = document.getElementById("createBtn");

    if (passwordField.type === "password") {
        passwordField.type = "text";
    }else{
         passwordField.type = "password";
    }

}

      </script>