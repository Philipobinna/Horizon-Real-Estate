
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
             <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">


                                              <?php

                                              

                                          $Call = new Enginess();
                                              $resultset = $Call ->Fetch_Data('Pending Withdrawal');
                                                   if (!empty($resultset)) {

                                                          echo '
                                                    <thead class="thead-light">
                                                    <tr>
                                                         <th scope="col">S/N</th>
                                                      <th scope="col">Email</th>
                                                      <th scope="col">Amount</th>
                                                      <th scope="col">Plan</th>
                                                      <th scope="col">Profit</th>
                                                       <th scope="col">Date Invest</th>
                                                           <th scope="col">Status</th>
                                                               <th scope="col">Tx id</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>';
                                             $count = 1;
                                             foreach ($resultset as $k => $v) {
                                                                       

                                              ?>

                                                <tr>
                                                    <td><?php echo $count++;?></td>
                                                      <td><?php echo $resultset[$k]['email']?></td>
                                            <td><?php echo $resultset[$k]['Amount']?></span></td>
                                           <td><?php echo $resultset[$k]['plan']?></td>
                                          <td><?php echo $resultset[$k]['profit']?></td>
                                          <td><?php echo $resultset[$k]['investDate']?></td>
                                            <td><?php echo $resultset[$k]['status']?></td>
                                             <td><?php echo $resultset[$k]['TrnsID']?></td>
                                            <td><a href="?ApproveWeed&&id=<?php echo $resultset[$k]['id']?>&&email=<?php echo $resultset[$k]['email']?>" class="btn btn-primary">Approve</a></td>

                                   
              
            
               
             
         
              
                </tbody>
                 <?php }

                                          }else{
                                            echo '<script>swal("Error","No New Withdrawal Request","error")</script>';
                                          } 
                                               ?>
              </table>
            </div>
               

              
              </form>
            </div>
          </div>
        </div>


      