<?php

require 'userdbc.php';
require 'core.php';

if(loggedin()){
	
	$age=getuserfield('age');
 	 $name=getuserfield('name');
	
	
	echo 'You \'re logged in,'.$name.'
    <a href=logout.php>LOG OUT </a><br>';
}
else
	include 'signin.php';



?>