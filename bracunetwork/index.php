<?php
   include("connection.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
        $myusername = mysqli_real_escape_string($connection,$_POST['member_name']);
        $mypassword = mysqli_real_escape_string($connection,$_POST['member_password']); 
        $sql = "Select * from admin_login where admin_name = '" . $myusername . "' and admin_password = '" . $mypassword . "'";  
        $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: home.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         
      }
   }
?>

<html>  
 <head>  
  <title>Login to BRACU Network</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

 <body>  
  <div class="container p-5">  
      <div class="row text-center p-3">
          <div class="col-md-6 offset-3 border border-primary">
          <img src="bracu.png" class="img-thumbnail" alt="Cinque Terre">
          <h2 class="text-center font-weight-bold border-danger display-22">BRACU Network(BUN)</h2>
                 <form action="" method="post" id="frmLogin"> 
    <h3>Admin Login </h3><br />
    <div class="text-danger"><?php if(isset($message)) { echo $message; } ?></div>  
    <div class="form-group">  
     <label for="login"><b>Username</b></label>  
     <input name="member_name"  class="form-control" type="text" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" />  
    </div>  
    <div class="">  
     <label for="password"><b>Password</b></label>  
     <input  class="form-control"  name="member_password" type="password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>"/>   
    </div> 
    <br> 
    <div class="form-group">  
     <div><input type="submit" name="login" value="Login" class="btn btn-primary"> </span></div>  
    </div>   
   </form> 
          </div>
      </div>
  </div> 
  
 
 </body>  
</html>