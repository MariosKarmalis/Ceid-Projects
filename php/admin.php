<?php  
 $connect = mysqli_connect("localhost", "root", "", "mydb");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:welcome_admin.php");  
 }  
 
 if( $_SERVER['REQUEST_METHOD'] == 'POST'  )
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           //$password = md5($password);  
           $query = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['admin'] = $username;  
                header("location:welcome_admin.php");  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
		
      <head >  
           <title> Admin Dashboard Login </title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body style="background-image: url('font.jpg');">  
           <br /><br />  
           <div class="container" style="width:500px; ">  
                <h3 align="center">Admin Dashboard Login</h3>  
                <br />  
                <h3 align="center"></h3>  
                <br />  
                <form method="post">  
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />
                     <input type="submit" name="admin login" value="Login" class="btn btn-info" />  
                     <br />  
					 <p align="right"><a href="index.php?action=login">User Login</a></p>  
					 <p align="right"><a href="index.php">User Register</a></p>  
                </form>   
           </div>  
      </body>  
 </html>  