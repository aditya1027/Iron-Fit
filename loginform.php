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
				header('Location: user.php');
			}
			
		}
	}
		
	}
	else
	{
	echo 'YOU must enter the fields';	
	}
	

?>


<form action="<?php echo $current_file; ?>" method="POST">

Username: <input type="text" name="username">
PAssword: <input type="password" name="password"><br>
<input type="submit" value="Login in">

</form>