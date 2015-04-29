<?php include_once("config.php");
session_start();
require_once('php-sql-parser.php');
require_once('search.php');
?>
<html>

<head>
<title> dummy website</title>
</head>

<body>

<div class="container">
	<div class="col-md-offset-5 col-md-3">
	<div class="row">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">			
				<h4>Search for products' details</h4>
				<input type="text" name="product_name" id="product_name" placeholder="Product name" />
				</br>
				<input type="submit" name="submit0" value="SUBMIT and use SQLProb"/>
				<input type="submit" name="submit" value="SUBMIT and use Candid"/>
				<input type="submit" name="submit1" value=" SUBMIT and use SQLrand"/>
				<input type="submit" name="submit2" value=" SUBMIT and use SQLIPA"/>
				<input type="submit" name="submit3" value=" SUBMIT"/>
		</form>
	</div>

	<div class="row">
		<div class="span5">
            		<table class="table table-striped table-condensed">
                  		<thead>
                  		<tr>
                  		    <th>Product name</th>
                  		    <th>Details</th>                                          
                  		</tr>
              			</thead>   
              			<tbody>
<?php

if(isset($_POST['submit0'])){

$time_start = microtime(true);

	$name=$_POST['product_name'];
	$query="SELECT Product_name, detail FROM product_details WHERE Product_name='$name'";

	$parser = new PHPSQLParser($query);
	
	echo "<pre>";
	print_r($parser->parsed);
	echo"</pre>";
	$copy=$parser->parsed;
	
	$result= mysql_query($query);

	while($row=mysql_fetch_array($result)){
?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>                                  
                </tr>
<?php 
	}

$time_end = microtime(true);
$time = $time_end - $time_start;

echo "time taken: $time seconds\n";

}


if(isset($_POST['submit'])){

$time_start = microtime(true);

	$name=$_POST['product_name'];
	$query="SELECT Product_name, detail FROM product_details WHERE Product_name='$name'";

	$parser = new PHPSQLParser($query);
	
	echo "<pre>";
	print_r($parser->parsed);
	echo"</pre>";

	$bename=str_repeat("a",strlen($name));
	$bequery="SELECT Product_name, detail FROM product_details WHERE Product_name='$bename'";
	$parser1 = new PHPSQLParser($bequery);

	echo"<pre>";
	print_r($parser1->parsed);
	echo"</pre>";


	function array_diff_assoc2_deep($array1, $array2) {
    		$ret = array();
    		foreach ($array1 as $k => $v) {
        		if (!isset($array2[$k])) $ret[$k] = $v;
        		else if (is_array($v) && is_array($array2[$k])) $ret[$k] = array_diff_assoc2_deep($v, $array2[$k]);
        		else if ((string)$v != (string)$array2[$k]) $ret[$k] = $v;
    		}
    		return $ret;
	}

	$result= mysql_query($query);

	if(count($parser->parsed,COUNT_RECURSIVE)==count($parser1->parsed, COUNT_RECURSIVE)){

		while($row=mysql_fetch_array($result)){
?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>                                  
                </tr>
<?php 
		}
	}
	//else
	//	echo "invalid input\n";

$time_end = microtime(true);
$time = $time_end - $time_start;

echo "time taken: $time seconds\n";

//echo"<pre>";
//print_r(array_diff_assoc2_deep($parser->parsed, $parser1->parsed)); 
//echo"</pre>";

//echo (count(array_filter(array_diff_assoc2_deep($parser->parsed, $parser1->parsed)),COUNT_RECURSIVE));

//print_r(array_diff_assoc_recursive($parser->parsed, $parser1->parsed));
//print_r(array_diff_assoc_recursive($parser1->parsed, $parser->parsed));
}

if(isset($_POST['submit'])){
	$name=$_POST['product_name'];
	if($name=="all"){
		$query="SELECT Product_name, detail FROM product_details";
		$result= mysql_query($query);
		while($row=mysql_fetch_array($result)){
?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>                                  
                </tr>
<?php 
		}
	}
}

if(isset($_POST['submit1'])){
	$time_start = microtime(true);
	$conn=mysqli_connect($dbhost, $dbuser, $dbpass,"btp");
	if (mysqli_connect_errno()) {
    		printf("Connect failed: %s\n", mysqli_connect_error());
    		exit();
	}
	$name=mysqli_real_escape_string($conn,$_POST['product_name']);
	$query="SELECT Product_name, detail FROM product_details WHERE Product_name='$name'";
	$result= mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result)){
?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>                                  
                </tr>
<?php 
	}
$time_end = microtime(true);
$time = $time_end - $time_start;

echo "time taken: $time seconds\n";
}

if(isset($_POST['submit2'])){
	$time_start = microtime(true);
	$name=$_POST['product_name'];
	$query="SELECT Product_name, detail FROM product_details WHERE hash_value=md5('$name')";
	$result= mysql_query($query);
	while($row=mysql_fetch_array($result)){
?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>                                  
                </tr>
<?php 
	}
$time_end = microtime(true);
$time = $time_end - $time_start;

echo "time taken: $time seconds\n";

}

if(isset($_POST['submit3'])){
	$time_start = microtime(true);
	$name=$_POST['product_name'];
	$query="SELECT Product_name, detail FROM product_details WHERE Product_name='$name'";
	$result= mysql_query($query);
	while($row=mysql_fetch_array($result)){
?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>                                  
                </tr>
<?php 
	}
$time_end = microtime(true);
$time = $time_end - $time_start;

echo "time taken: $time seconds\n";

}
?>                         
              </tbody>
            </table>
            </div>
	</div>
</div>

</body>

</html>
