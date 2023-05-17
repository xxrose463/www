<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="wigth=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="login.css" rel="stylesheet" type="text/css"/> 
  <link rel="stylesheet" href="CSS.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  
    </head>
    <body>
      <header>
        <nav class="navbar">
            <div class="inner-width">
              <a href="Home.html" class="logo"><img src="PM.jpeg" alt=""></a>
              <div class="navbar-menu">
                <a href="Home.html" class="active"> Home </a> 
             <a href="about us.html" > about us </a>
              <a href="customer reviews.html">Customer reviews</a>
             <a href="Your Opinions.html">Your Opinions</a>
              <a href="Basket.php" class="h-icons"><i class='bx bxs-cart'></i></a>  
		<a href="login.php" class="h-icons"><i class='bx bx-user'></i></a>
           </div>
              </div>
            </div>
          </nav>
</header>
    

<?php
   require('connection.php');
     session_start();

   if (isset($_POST['login'])) 
    {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="SELECT * from users WHERE email=:email AND password=:password";
    $stm=$con->prepare($query);
			$stm->execute(array("email" => $email, "password"=>$password));
            if($stm->rowCount()==1){
				$_SESSION['user_info']=$stm->fetch();
              if($_SESSION['user_info']['id'] > 1){
       
       }
        header('location:home.html');
    }
    else{
        echo "<div class='alert alert-danger text-center'>Email or password is wrong </div>";
        echo '<script>alert("email or password is wrong");window.location.assign("login.php");</script>';
    }

}


	/* if(isset($_POST['login'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		if(empty($email) | empty($password)){
			echo "the filed are require";
		}
		else{
			$query="SELECT * from users WHERE email=:email AND password=:password";
			$stm=$con->prepare($query);
			$stm->execute(array("email" => $email, "password"=>$password));
			if($stm->rowCount()==1){
				
					 header("location:../../admin/change-password.php");
				}
				
				else{
                    echo "<div class='alert alert-danger text-center'>Email or password is wrong </div>";
                    echo '<script>alert("email or password is wrong");window.location.assign("index.php");</script>';
				} 
			}
			
		}
	*/
	
	
	?>
           <form method="post">
        <div class="wrapper">
            <div class="from-box login">
                <h2>Login</h2>
            <form action="#">
                <div class="input-box">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remmeber-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password</a>
                </div>
                <button type="submit" name="login" class="but">Login</button>
                <div class="login-regisrer">
                    <p>Dont have an account?<a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>

        <?php	
        	require('connection.php');

        if (isset($_POST['submit'])) {
                                
                                $username = trim($_POST['username']);
                                $email = trim(($_POST['email']));
                                $password =trim($_POST['password'], PASSWORD_DEFAULT);
                                $Phone = trim(($_POST['Phone']));

								if (is_numeric($username)) {
                                    $errors['username'] = "<div style='color:red'>Username Must Be String</div>";
								}
								if(empty($errors)){
									$sql = "INSERT INTO users(username,email,password,Phone) VALUES(? , ? , ? , ?)";
                                    $stm = $con->prepare($sql);
                                    $stm->execute(array($username,$email,$password,$Phone));
                                    if ($stm->rowCount()) {
										
										echo "<script> alert('Successfully registered')
										window.open('login.php#manal','_self')
									  </script>";
								}
								else {

									echo "<div class='alert alert-danger'> Row Not Inserted</div>";

								}
							}
						}

?>
        
        <div class="from-box register">
            <h2>Registration</h2>
        <form method="post">
            <div class="input-box">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="input-box">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="input-box">
                <input type="Phone" name="Phone" required>
                <label>Phone number</label>
            </div>
            <div class="remmeber-forgot">
                <label><input type="checkbox">I agree to the terms & conditions</label>
                
            </div>
            <button type="submit" name="submit" class="but">Register</button>
            <div class="login-register">
                <p>Already have an account?<a href="#" class="login-link">Login</a></p>
            </div>
        </form>
    </div>
        </div>
        <script src="script.js"></script>
        </body>
    
</html>

