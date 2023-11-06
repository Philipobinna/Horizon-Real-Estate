
    <!-- Header -->

   
    <div class="header bg-dark pb-6">
      <div class="container-fluid">
        <div class="header-body">
            <div class="card" style="padding:10px;">
        <p><b>Referal Link:</b> <span id="sample">    <?php

$fullurl = "https://".$_SERVER['HTTP_HOST'];
echo $fullurl.'/?Ref='.$UserEmail;
    ?></span> <a href="#" class="btn btn-dark" onclick="CopyToClipboard('sample');return false;">Copy Link</a></p>
          </div>

  


          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Balance</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo '$'.number_format($Dbinfo['balance']);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-bold"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                    <span class="text-nowrap">Active Balance</span>
                  </p>
                </div>
              </div>
            </div>
            
               <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Deposit</h5>
                 <span class="h2 font-weight-bold mb-0"><?php $Call->SumUser_Deposit($UserEmail);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> </span>
                    <span class="text-nowrap">Active Deposit</span>
                  </p>
                </div>
              </div>
            </div>
            
              <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Earn</h5>
                      <span class="h2 font-weight-bold mb-0"><?php $Call->SumUser_Profit('Matured',$UserEmail)?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                    <span class="text-nowrap">Total Earnings</span>
                  </p>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Withdraw</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $Call->SumUser_Account_Pending_Widrawal('Pending Withdrawal',$UserEmail);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-credit-card"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                    <span class="text-nowrap">Pending Withdrawal</span>
                  </p>
                </div>
              </div>
            </div>
         
          
          </div>
          <script src="https://widgets.coingecko.com/coingecko-coin-price-marquee-widget.js"></script>
<coingecko-coin-price-marquee-widget  coin-ids="bitcoin,ethereum,eos,ripple,litecoin" currency="usd" background-color="#ffffff" locale="en"></coingecko-coin-price-marquee-widget> <br />
        </div>
      </div>
    </div>



       <div class="container-fluid mt--6">
      <div class="row">
       
      </div>
      
      
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">My Withdrawal History</h3>
                </div>
                <div class="col text-right">
                  <a href="?widrawalHis" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                
                 <?php

                                              

                                          $Call = new Enginess();
                  $resultset = $Call ->Fetch_All_Transaction_USERS444('investment',$UserEmail);
                                                   if (!empty($resultset)) {

                                                          echo '
                                                    <thead class="thead-light">
                                                    <tr>
                                                         <th scope="col">S/N</th>
                                                      <th scope="col">Email</th>
                                                      <th scope="col">Amount</th>
                                                     
                                                       <th scope="col">Date</th>
                                                           <th scope="col">Status</th>
                                                               <th scope="col">Tx id</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>';
                                             $count = 1;
                                             foreach ($resultset as $k => $v) {

                                            if ($resultset[$k]['status']=="Withdraw") {
                                               echo '  
                                                <tr>
                                                <td>'.$count++.'</td>
                                                      <td>'. $resultset[$k]['email'].'</td>
                                              <td>'.'$'.number_format($resultset[$k]['Amount']).'</td>
                                         
                                          <td>'.$resultset[$k]['investDate'].'</td>
                                            <td>'. $resultset[$k]['status'].'</td>
                                             <td>'. $resultset[$k]['TrnsID'].'</td></tr>';
                                              }
                                                                       


                                         }

                                          }else{
                                            echo '<center>No Withdrawal Yet</center>';
                                          } 
                                              
                                              ?>




              </table>
            </div>
          </div>
        </div>
    
      </div>

      
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">My Refferals</h3>
                </div>
                <div class="col text-right">
                  <a href="?refferals" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                
                 <?php

                                              

                                          $Call = new Enginess();
                  $resultset = $Call ->Fetch_All_Refferals('user',$UserEmail);
                                                   if (!empty($resultset)) {

                                                          echo '
                                                    <thead class="thead-light">
                                                    <tr>
                                                         <th scope="col">S/N</th>
                                                      <th scope="col">Username</th>
                                                      <th scope="col">Fullname</th>
                                                     
                                                       <th scope="col">Date Registered</th>
                                                           <th scope="col">Phone</th>
                                                          
                                                             
                                                    </tr>
                                                  </thead>
                                                  <tbody>';
                                             $count = 1;
                                             foreach ($resultset as $k => $v) {

                                            if ($resultset[$k]['refusername']=="$UserEmail") {
                                               echo '  
                                                <tr>
                                                <td>'.$count++.'</td>
                                                      <td>'. $resultset[$k]['username'].'</td>
                                              <td>'. $resultset[$k]['fullname'].'</td>
                                         
                                          <td>'.$resultset[$k]['dateReg'].'</td>
                                            <td>'. $resultset[$k]['phone'].'</td>
                                      
                                            </tr>';
                                              }
                                                                       


                                         }

                                          }else{
                                            echo '<center>You Have not reffered anyone Yet</center>';
                                          } 
                                              
                                              ?>




              </table>
            </div>
          </div>
        </div>
    
      </div>
      
    </div>
      
    </div>
    
        <script type="text/javascript">
        
        function CopyToClipboard(id){
            var r = document.createRange();
            r.selectNode(document.getElementById(id));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
              swal("success","Referal Link Copied","success");
}

      
          
          </script>

 
