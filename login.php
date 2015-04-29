<?php include_once("config.php");
session_start();
?>
<html>

<head>
<title> dummy website</title>
</head>

<body>

<link href="logi.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <form method="post" action="logincheck.php">			
		<h4>Welcome back.</h4>
            	<input type="text" id="userName" name="userName" placeholder="username" />
            	</br>
            	<input type="text" id="userPassword" name="userPassword" placeholder="password" />
            	</br>
            	<input type="submit" name="submit0" value="SUBMIT and use SQLProb"/>
		<input type="submit" name="submit" value="SUBMIT and use Candid"/>
		<input type="submit" name="submit1" value=" SUBMIT and use SQLrand"/>
		<input type="submit" name="submit2" value=" SUBMIT and use SQLIPA"/>
		<input type="submit" name="submit3" value=" SUBMIT"/>
	    </form>
        
        </div>
    </div>
</div>
</body>

</html>
