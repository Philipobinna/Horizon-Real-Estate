
     <form action="#" method="post">
   <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Deposit History</h3>
                </div>
              
              </div>
            </div>
            <div class="card-body">
             <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
              

                                              <?php

                                              

                                          $Call = new Enginess();
                                          $resultset = $Call ->Fetch_All_Transaction('investment');
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

                                              if ($resultset[$k]['status']=="New") {
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

                                        }else if ($resultset[$k]['status']=="Active") {
                                           
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



                                              }else if ($resultset[$k]['status']=="Matured") {
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
                                                                       


                                         }

                                          }else{
                                            echo '<script>swal("Error","No Transaction found","error")</script>';
                                          } 
                                              
                                              ?>

                                                <tr>
                                                  
                                           

                                   
              
            
               
             
         
              
                </tbody>
           
              </table>
            </div>
               

              
              </form>
            </div>
          </div>
        </div>


      