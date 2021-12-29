<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <input type="text" name="email"> <input type="submit" name="submit" value="SUBMIT">
</form>  

<?php

      $servername = "ls-88602a473fa09293021b7074cce3ace5c00b0494.caouk78dsjma.us-east-1.rds.amazonaws.com";
      $username = "enroll";
      $password = "Atech@98300$$!";
      $dbname = "enroll";

      $conn = mysqli_connect($servername, $username, $password, $dbname);

      date_default_timezone_set('Asia/Kolkata');

      $date = date("Y-m-d H:i:s");

      if(isset($_POST['submit'])){
        if(isset($_POST['email'])){
          if(!empty($_POST['email'])){
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            $q = "insert into unsubscribe(email, timestamp) values('".$email."', '".$date."')";
            $r = mysqli_query($conn, $q);

            if($r){
              echo 'Thank you for staying with us.';
            }

          }else{
            echo 'Enter Email-Id';
          }
        }
      }

?>      
