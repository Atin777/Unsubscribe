<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
  <input type="text" name="email"> <input type="submit" name="submit" value="SUBMIT">
</form>  

<?php

      $servername = "";
      $username = "";
      $password = "";
      $dbname = "";

      $conn = mysqli_connect($servername, $username, $password, $dbname);

      date_default_timezone_set('Asia/Kolkata');

      $date = date("Y-m-d H:i:s");

      function getIPAddress() 
      {             
            if(!empty($_SERVER['HTTP_CLIENT_IP'])) 
            {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }             
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
            {  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
            }                
            else
            {  
            $ip = $_SERVER['REMOTE_ADDR'];  
            }  
            return $ip;  
      }

      if(isset($_POST['submit'])){
        if(isset($_POST['email'])){
          if(!empty($_POST['email'])){
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
              $q = "insert into unsubscribe(email, ip, timestamp) values('".$email."', '".getIPAddress()."', '".$date."')";
              $r = mysqli_query($conn, $q);

              if($r){
                echo 'Thank you for staying with us.';
              }
            }else{
              echo 'Enter valid email';
            }
          }else{
            echo 'Enter Email-Id';
          }
        }
      }

?>      
