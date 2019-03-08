<?php
require 'core.php';
require 'userdbc.php';

if(!loggedin()){
	
	if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['password_again']) && isset($_POST['firstname']) && isset($_POST['surname']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password_again=$_POST['password_again'];
		$firstname=$_POST['firstname'];
		$surname=$_POST['surname'];
		$password_hash=md5($password);
		
		if(!empty($username) && !empty($password) &&!empty($password_again) && !empty($firstname) && !empty($surname))
		{
			
			if($password!=$password_again)
			{
				echo "Password does not match";
			}
			else{
				
				$query="SELECT username FROM user WHERE username='$username'";
				$query_run=mysql_query($query);
				
				if(mysql_num_rows($query_run)==1){
					echo 'THE username '.$username.' already exists';
				}
				else
				{
				    $query="INSERT INTO user VALUES('','".$username."','".$password_hash."','".$firstname."','".$surname."')";
					if($query_run=mysql_query($query))
					{
						header('Location: register_success.php');
					}
					else
					{
						echo 'Sorry, we couldn\'t register you.Try again later';
					}
					
				}
			}
		}
		else{
			echo 'ALL fields are required';
		}



	}		
	
	?>
	
	
	<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Sign In</title>

   
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="assets/css/signin.css" rel="stylesheet">
    <link href="assets/css/navbar-top-fixed.css" rel="stylesheet">
    
  </head>

  <body class="text-center">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Iron Fit</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="iron.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Contact us</a>
          </li>
          
        </ul>
        <form class="form-inline mt-2 mt-md-0">
		<a class="btn btn-outline-success my-2 my-sm-0" href="index.php">Sign In</a>
         
        </form>
      </div>
    </nav>

 
  
  
    <form class="form-signin" action="register.php" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Please REGISTER </h1>
      <input type="text" class="form-control" placeholder="Username" name="username" value="<?php if(isset($username)) echo $username;?>" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
	  <input type="password" id="inputPassword" class="form-control" placeholder="Password Again" name="password_again">
	  <input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?php if(isset($firstname)) echo $firstname;?>">
      <input type="text" class="form-control" placeholder="Surname" name="surname" value="<?php if(isset($surname)) echo $surname;?>">
	  
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>
  </body>
</html>
	
	

<?php
}
else if (loggedin()){
		echo "You are logged in";
}
?>