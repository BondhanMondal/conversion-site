<?php
	$category = $unit = $rate ="";
	$categoryErr = $unitErr = $rateErr = "";
	$flag = false;
	$successfulMessage = $errorMessage = "";

	define("filepath", "category.txt");


	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$category = $_POST['category'];
		$unit = $_POST['unit'];
		$rate = $_POST['rate'];

		if (empty($rate)) {
			$rateErr = "Field can not be empty";
			$flag = true;
		}
		else if(!is_numeric($rate)){
			$rateErr = "Please enter number";
			$flag = true;
		}
		if (empty($unit)) {
			$unitErr = "Field can not be empty";
			$flag = true;
		}
		else if(!is_numeric($rate)){
			$unitErr = "Please enter number";
			$flag = true;
		}
		if (empty($category)) {
			$categoryErr = "Field can not be empty";
			$flag = true;
		}
		else if(is_numeric($category)){
			$categoryErr = "Please enter text";
			$flag = true;
		}
		if(!$flag) {
		$fileData = read();

		if(empty($fileData)) {
		$data[] = array("category" => $category, "unit" => $unit, "rate" => $rate);
		}
		else {
		$data[] = json_decode($fileData);
		array_push($data, array("category" => $category, "unit" => $unit, "rate" => $rate));
		}



		$data_encode = json_encode($data);
		write("");
		$res = write($data_encode);
		if($res) {
		$successfulMessage = "Sucessfully saved.";
		}
		else {
		$errorMessage = "Error while saving.";
		}
		}


	}





	function write($content) {
	$file = fopen(filepath, "w");
	$fw = fwrite($file, $content . "\n");
	fclose($file);
	return $fw;
	}

	function read() {
	$file = fopen(filepath, "r");
	$fz = filesize(filepath);
	$fr = "";
	if($fz > 0) {
	$fr = fread($file, $fz);
	}
	fclose($file);
	return $fr;
	}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<h1 style="color: red;">Page 2 [Conversion Rate]</h1>
	<h2 style="color: red;">Conversion Site</h2>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<a href="page1.php" style="color: blue;">1. Home</a>
		<a href="page2.php" style="color: blue;">2. Conversion Rate</a>
		<a href="page3.php" style="color: blue;">3. History</a>
		<br>
		<h3>Conversion Rate:</h3>
		<br>
		<label for="category">Category:</label>
		<input type="text" name="category" id="category">
		<span style="color: red"><?php echo $categoryErr; ?></span>
		<label for="unit">Unit:</label>
		<input type="text" name="unit" id="unit">
		<span style="color: red"><?php echo $unitErr; ?></span>
		<label for="rate">Rate:</label>
		<input type="text" name="rate" id="rate">
		<span style="color: red"><?php echo $rateErr; ?></span>
		<input type="submit" name="submit" value="Submit">
		<br><br>
		<span style="color: green"><?php echo $successfulMessage; ?></span>
		<span style="color: red"><?php echo $errorMessage; ?></span>
	</form>

</body>
</html>