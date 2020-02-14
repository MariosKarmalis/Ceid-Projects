<?php   
 $connect = mysqli_connect("localhost", "root", "", "mydb");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:welcome.php");  
 }  
 
 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password);  
           $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['username'] = $username; 
                $row = $result->fetch_assoc();
                $_SESSION['uid'] = $row["u_id"]; 
                header("location:welcome.php");  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 } 
 if(isset($_POST["register"])) 
 {
	  $ucl = preg_match('/[a-zA-Z]/', $_POST["password"]); // Uppercase Letter
	  $dig = preg_match('/\d/', $_POST["password"]); // Numeral
	  $nos = preg_match('/[^a-zA-Z\d]/', $_POST["password"]); // Non-alpha/num characters
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else if( strlen($_POST["password"])< 8 )
      {  
		echo '<script>alert("Password must be at least 8 characters long.")</script>';
	  }
	  else if (!($ucl && $dig && $nos))
	  {
		  echo '<script>alert("Please enter a password with at least one Capital letter, 1 number and 1 special character")</script>';
	  }
	  else
	  {
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]); 
		 $email = mysqli_real_escape_string($connect, $_POST["email"]);
		// 2 way Encryption process via openssl_encrypt for user id creation
		   $cipher = "aes-256-cbc";
		   $ivlen = openssl_cipher_iv_length($cipher);
		   $iv = openssl_random_pseudo_bytes($ivlen);
		   $userid = openssl_encrypt($email,$cipher,$password , 0, $iv);
		  //$decrypt_userid = openssl_decrypt($email, $cipher, $password, 0, $iv);
		//End of 2 way encryption 
           $password = md5($password);  
           $query = "INSERT INTO users (username, password, email, userid) VALUES('$username', '$password', '$email', '$userid')";  
           if(mysqli_query($connect, $query))  
           {  
                echo '<script>alert("Registration Done")</script>';  
           }  
      }  
 } 
 ?> 
 
 <!DOCTYPE html>  
 <html>  
		
      <head >  
           <title>User Login</title> 
           <meta name="viewport" content="width=device-width, initial-scale=1.0">  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body style="background-image: url('font.jpg'); ">  
           <br /><br />  
           <div class="container" style="width:500px; ">  
                <br />  
                <?php  
                if (isset($_GET["action"]) == "login")  
                {  
                ?>  
                <h3 align="center">User Login</h3>  
                <br />  
                <form method="post">  
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Login" class="btn btn-info" />  
                     <br />  
                     <p align="right"><a href="index.php">Register User</a></p>  
                     <p align="right"><a href="admin.php">Admin Login</a></p>  
                </form>  
                <?php
                }  
                else 
                {
                ?>  
				<h3 align="center">Register User</h3>  
				<br />  
                <form method="post">  
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />
					 <label>Enter Email</label>
					 <input type="email" name="email" class="form-control" />
					 <br />
                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />  
                     <p align="right"><a href="index.php?action=login">User Login</a></p>  
                     <p align="right"><a href="admin.php">Admin Login</a></p>  
                </form>  
                <?php  
                }
				?>
           </div>  
      </body>  
 </html>