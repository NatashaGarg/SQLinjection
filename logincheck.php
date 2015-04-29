<?php include_once("login.php");
session_start();
require_once('php-sql-parser.php');

if(isset($_POST['submit0'])){

	$uname=$_POST['userName'];
	$upass=$_POST['userPassword'];
	$query="SELECT * FROM user_details WHERE username='$uname' AND password='$upass'";
	
	$parser = new PHPSQLParser($query);
	
	//echo "<pre>";
	//print_r($parser->parsed);
	//echo"</pre>";

	if ($rows==1) 
    		{
        	header('Location: page.php');
		exit;
	}
	else{
	            header('Location: login.php');
	            exit();
	}
}


if(isset($_POST['submit'])){

	$uname=$_POST['userName'];
	$upass=$_POST['userPassword'];
	$query="SELECT * FROM user_details WHERE username='$uname' AND password='$upass'";
	
	$parser = new PHPSQLParser($query);
	
	//echo "<pre>";
	//print_r($parser->parsed);
	//echo"</pre>";

	$bename=str_repeat("a",strlen($uname));
	$bepass=str_repeat("a",strlen($upass));
	$bequery="SELECT * FROM user_details WHERE username='$bename' AND password='$bepass'";
	$parser1 = new PHPSQLParser($bequery);

	//echo"<pre>";
	//print_r($parser1->parsed);
	//echo"</pre>";
	if(count($parser->parsed,COUNT_RECURSIVE)==count($parser1->parsed, COUNT_RECURSIVE)){
		$result= mysql_query($query);
		$rows = mysql_num_rows($result);
		echo $rows;
    		if ($rows==1) 
    		{
        	header('Location: page.php');
		exit;
	    	}
	}
	else{
	            header('Location: login.php');
	            exit();
	}
}

if(isset($_POST['submit1'])){
	$conn=mysqli_connect($dbhost, $dbuser, $dbpass,"btp");
	if (mysqli_connect_errno()) {
    		printf("Connect failed: %s\n", mysqli_connect_error());
    		exit();
	}
	$uname=mysqli_real_escape_string($conn,$_POST['userName']);
	$upass=mysqli_real_escape_string($conn,$_POST['userPassword']);
	$query="SELECT * FROM user_details WHERE username='$uname' AND password='$upass'";
	$res= mysqli_query($conn,$query);
	$rows = mysqli_num_rows($res);
//echo $rows;
    	if ($rows==1) 
    	{
        header('Location: page.php');
	exit;
    	}
else{
            header('Location: login.php');
            exit();
        }
}
       
if(isset($_POST['submit2'])){
	$uname=$_POST['userName'];
	$upass=$_POST['userPassword'];
	$query = "SELECT * FROM user_details WHERE hash_name=md5('$uname') AND hash_pass=md5('$upass')";
	$res = mysql_query($query);
	$rows = mysql_num_rows($res);
    	if ($rows==1) 
    	{
        header('Location: page.php');
	exit;
    	}
else{
            header('Location: login.php');
            exit();
        }
}

if(isset($_POST['submit3'])){
	$uname=$_POST['userName'];
	$upass=$_POST['userPassword'];
	$query="SELECT * FROM user_details WHERE username='$uname' AND password='$upass'";
	$res = mysql_query($query);
	$rows = mysql_num_rows($res);
    	if ($rows==1) 
    	{
        header('Location: page.php');
	exit;
    	}
	else{
            header('Location: login.php');
            exit();
        }
}
?>
