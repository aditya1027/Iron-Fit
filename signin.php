<?php

if(isset($_POST['username']) && isset($_POST['password'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	
	$password_hash=md5($password);
	if(!empty($username) && !empty($password))
	{
		
		$query="SELECT id FROM user where username='".$username."' AND password='".$password_hash."'";
		if($query_run=mysql_query($query)){
			$query_num_rows=mysql_num_rows($query_run);
			
			if($query_num_rows==0){
				echo 'Invalid username/password';
			}
			else if($query_num_rows==1){
				echo ' WElcome !'.$username;
				$user_id=mysql_result($query_run,0,'id');
				$_SESSION['user_id']=$user_id;
				header('Location: index.php');
			}
			
		}
	}
	else
	{
	echo 'YOU must enter the fields';	
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
		<a class="btn btn-outline-success my-2 my-sm-0" href="register.php">Register</a>
         
        </form>
      </div>
    </nav>

 
  
  
    <form class="form-signin" action="<?php echo $current_file; ?>" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      
      <input type="text"  class="form-control" placeholder="Username" name="username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>
  </body>
</html>
