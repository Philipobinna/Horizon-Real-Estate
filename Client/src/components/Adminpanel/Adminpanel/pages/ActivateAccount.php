
<br />

     <form action="#" method="post">
   <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">All Users</h3>
                </div>
              
              </div>
            </div>
            <div class="card-body">
             <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">


                                              <?php

                                              

                                          $Call = new Enginess();
                                               $resultset = $Call ->Fetch_Data23();
                                                   if (!empty($resultset)) {

                                                          echo '
                                                    <thead class="thead-light">
                                                    <tr>
                                                         <th scope="col">S/N</th>
                                                      <th scope="col">Fullname</th>
                                                      <th scope="col">Phone</th>
                                                      <th scope="col">Email</th>
                                                      <th scope="col">Register Date</th>
                                                       <th scope="col">status</th>
                                                          
                                                    </tr>
                                                  </thead>
                                                  <tbody>';
                                             $count = 1;
                                             foreach ($resultset as $k => $v) {
                                                                       

                                              ?>

                                                <tr>
                                                    <td><?php echo $count++;?></td>
                                                 <td><?php echo $resultset[$k]['fullname']?></td>
                                            <td><?php echo $resultset[$k]['phone']?></span></td>
                                           <td><?php echo $resultset[$k]['email']?></td>
                                          <td><?php echo $resultset[$k]['dateReg']?></td>
                                          <td><?php echo $resultset[$k]['status']?></td>
                                           
                                            <td><a href="?activateAccount&&Activ&&id=<?php echo $resultset[$k]['id']?>&&email=<?php echo $resultset[$k]['username']?>" class="btn btn-primary">Activate</a>


                            


                                            </td>



                                   
              
            
               
             
         
              
                </tbody>
                 <?php }

                                          }else{
                                            echo '<script>swal("Error","No Account found","error")</script>';
                                          } 
                                               ?>
              </table>
            </div>
               

              
              </form>
            </div>
          </div>
        </div>


<?php
if (isset($_GET['Activ'])) {
            $stat = "Active";
            $Call->suspending_account($stat,$_GET['id']);
            if ($Call==true) {
              echo '<script>alert("Account Activated");</script>';
      echo '<script>window.location = "index.php?activateAccount"</script>';
            }

          }

?>