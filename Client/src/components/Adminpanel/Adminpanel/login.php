<!DOCTYPE html>
<html>
<?php

 session_start();
include ("../Client/funtion.php");
 $useThis = new Enginess();



?>



<head>
  <title>Login_Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap/bootstrap.css">


  <link rel="icon" type="image/png" sizes="96x96" href="images/avatar.png">
</head>

<style type="text/css">
  
.banner_area {
  background: rgb(78, 4, 4);
  position: relative;
  z-index: 1;
    opacity: 0.85;

}

</style>





<body class="banner_area">


<div class="col-lg-12">
  <div class="col-lg-12"></div>
   <div class="col-lg-12 well" style="margin-top:45px; background-color:transparent;">
   <center> <h2 style="color:#827B84;">Admin Login</h2></center><hr />

<?php

if (isset($_POST['log'])) {
   // echo '<script>window.location = "dashboard.php"</script>';
      
      $user = $_POST['user'];
      $pass = $_POST['pass'];

         if (empty($user) || empty($pass)) {
           echo '<p style="text-align:center; background-color:#E6194C; color:white; padding:7px;"><b>Cant Process Empty Field</b></p>';

           }elseif ($useThis->Adminlogin($user,$pass)) {
             $_GET['emailField']= $user;
             echo '<script>window.location = "index.php?Admin='.$_GET['emailField'].'"</script>';
          
             }else{
               echo '<p style="text-align:center; background-color:#E6194C; color:white; padding:7px;"><b>Invalid Username or Password</b></p>';

          }
        

}





?>



<form action="#" method="post">
<input type="text" class="form-control" placeholder="Username" name="user"><br />
<input type="password" class="form-control" placeholder="password" name="pass"><br />
<center><input type="submit" name="log" value="Log-in" class="btn btn-dark " style="width:30%; height:40px;">
</center></form>
</div>
<div class="col-lg-4"></div>
</div>


</body>
</html>