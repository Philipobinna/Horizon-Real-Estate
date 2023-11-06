         <?php
 $info =  $Call->Targeted_information('user','id',$_GET['id']);
   //  echo $info['email'];
   
     ?>



         <?php
 $info =  $Call->Targeted_information('user','id',$_GET['id']);
   //  echo $info['email'];

     ?>

<br />

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
                        <td><?php echo $info['fullname'];?></td>


                </tr>
                      <tr >
                  <td>Phone</td>
                        <td><?php echo $info['phone'];?></td>


                </tr>

                      <tr >
                  <td>Email</td>
                        <td><?php echo $info['email'];?></td>


                </tr>


                     <tr >
                  <td>Username</td>
                        <td><?php echo $info['username'];?></td>


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
                        <td><?php echo $info['walletID'];?></td>


                </tr>

                   




                      <tr >
                  <td>Password</td>
                        <td><input type="Password" id="passField" value="<?php echo $info['password'];?>" style="border:none;" readonly="readonly">
                          <p><input type="checkbox" onclick="hidePassword()">Show Password</p></td>


                </tr>


                      <tr >
                  <td>Register Date</td>
                        <td><?php echo $info['dateReg'];?></td>


                </tr>


                      <tr >
                  <td>Active Balance</td>
                        <td><?php echo'$'.number_format($info['balance']);?></td>


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

   <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Transaction informations</h3>
                </div>



              
              </div>
            </div>
            <div class="card-body">
             
<div class="bs-example">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#home" class="nav-link active" data-toggle="tab">Pending Widraw</a>
        </li>
        <li class="nav-item">
            <a href="#profile" class="nav-link" data-toggle="tab">Active Balance</a>
        </li>
        <li class="nav-item">
            <a href="#messages" class="nav-link" data-toggle="tab">Total Earning</a>
        </li>
    </ul><br />
    <div class="tab-content">
        <div class="tab-pane fade show active" id="home">
            <h4 class="mt-2">Pending Withrawal</h4>

             <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">


  <?php                                          
$Call = new Enginess();
$resultset = $Call ->Fetch_All_Transaction_USERS3('investment',$_GET['email'],'Pending Withdrawal');
        if (!empty($resultset)) {

         echo '
        <thead class="thead-light">
         <tr>
         <th scope="col">S/N</th>
         <th scope="col">Email</th>
         <th scope="col">Amount</th>
         <th scope="col">Plan</th>
         <th scope="col">Profit</th>
         <th scope="col">Date</th>
         <th scope="col">Status</th>
         <th scope="col">Tx id</th>
                    </tr>
                   </thead>
                   <tbody>';
             $count = 1;
              foreach ($resultset as $k => $v) {
                                            
                 echo '  
                 <tr>
                 <td>'.$count++.'</td>
                 <td>'. $resultset[$k]['email'].'</td>
                 <td>'.$resultset[$k]['Amount'].'</td>
                 <td>'. $resultset[$k]['plan'].'</td>
                 <td>'.$resultset[$k]['profit'].'</td>                               
                 <td>'.$resultset[$k]['investDate'].'</td>
                 <td>'. $resultset[$k]['status'].'</td>
                 <td>'. $resultset[$k]['TrnsID'].'</td></tr>';     

                     }

                       }else{
                       echo '<center>No Transaction Found</center>';
                           } 

                           ?>

                                                <tr>
                                                  
                                                   
                </tbody>
           
              </table>
            </div>
               








         
        </div>






        <div class="tab-pane fade" id="profile">
            <h4 class="mt-2">Active Balance</h4>
           





                 <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">


  <?php                                          
$Call = new Enginess();
$resultset = $Call ->Fetch_All_Transaction_USERS3('investment',$_GET['email'],'Active');
        if (!empty($resultset)) {

         echo '
        <thead class="thead-light">
         <tr>
         <th scope="col">S/N</th>
         <th scope="col">Email</th>
         <th scope="col">Amount</th>
         <th scope="col">Plan</th>
         <th scope="col">Profit</th>
         <th scope="col">Date</th>
         <th scope="col">Status</th>
         <th scope="col">Tx id</th>
                    </tr>
                   </thead>
                   <tbody>';
             $count = 1;
              foreach ($resultset as $k => $v) {
                                            
                 echo '  
                 <tr>
                 <td>'.$count++.'</td>
                 <td>'. $resultset[$k]['email'].'</td>
                 <td>'.$resultset[$k]['Amount'].'</td>
                 <td>'. $resultset[$k]['plan'].'</td>
                 <td>'.$resultset[$k]['profit'].'</td>                               
                 <td>'.$resultset[$k]['investDate'].'</td>
                 <td>'. $resultset[$k]['status'].'</td>
                 <td>'. $resultset[$k]['TrnsID'].'</td></tr>';     

                     }

                       }else{
                       echo '<center>No Transaction Found</center>';
                           } 

                           ?>

                                                <tr>
                                                  
                                                   
                </tbody>
           
              </table>
            </div>





        </div>







        <div class="tab-pane fade" id="messages">
            <h4 class="mt-2">Total Earning</h4>
         

                       <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">


  <?php                                          
$Call = new Enginess();
$resultset = $Call ->Fetch_All_Transaction_USERS3('investment',$_GET['email'],'Withdraw');
        if (!empty($resultset)) {

         echo '
        <thead class="thead-light">
         <tr>
         <th scope="col">S/N</th>
         <th scope="col">Email</th>
         <th scope="col">Amount</th>
         <th scope="col">Plan</th>
         <th scope="col">Profit</th>
         <th scope="col">Date</th>
         <th scope="col">Status</th>
         <th scope="col">Tx id</th>
                    </tr>
                   </thead>
                   <tbody>';
             $count = 1;
              foreach ($resultset as $k => $v) {
                                            
                 echo '  
                 <tr>
                 <td>'.$count++.'</td>
                 <td>'. $resultset[$k]['email'].'</td>
                 <td>'.$resultset[$k]['Amount'].'</td>
                 <td>'. $resultset[$k]['plan'].'</td>
                 <td>'.$resultset[$k]['profit'].'</td>                               
                 <td>'.$resultset[$k]['investDate'].'</td>
                 <td>'. $resultset[$k]['status'].'</td>
                 <td>'. $resultset[$k]['TrnsID'].'</td></tr>';     

                     }

                       }else{
                       echo '<center>No Transaction Found</center>';
                           } 

                           ?>

                                                <tr>
                                                  
                                                   
                </tbody>
           
              </table>
            </div>





        </div>
    </div>
</div>



            </div>
          </div>
        </div>


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