<?php

	$value = $valueErr = $category = $result = "";
	$flag = false;
	$successfulMessage = $errorMessage = "";
	define("filepath2", "history.txt");
	define("filepath", "category.txt");

	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$value = $_POST['value'];
		$category = $_POST['category'];

		if (empty($value)) {
			$valueErr = "Field can not be empty";
			$flag = true;
		}
		else if(!is_numeric($value)){
			$valueErr = "Please enter number";
			$flag = true;
		}

		if(!$flag)
		{
			//$result = $value *1000;

			$fileData = read();
			$data[] = json_decode($fileData);
			// foreach ($data as $obj) 
			// {
			// 	print_r($data);
			// 	echo $obj->category;
			// }

			
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
	<h1 style="color: red;">Page 1 [Home]</h1>
	<h2 style="color: red;">Conversion Site</h2>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<a href="page1.php" style="color: blue;">1. Home</a>
		<a href="page2.php" style="color: blue;">2. Conversion Rate</a>
		<a href="page3.php" style="color: blue;">3. History</a>
		<br>
		<h3>Converter:</h3>
		<br>
		<label for="category">Select Category:</label>
		<select name="category">
			<option value="feet_to_inch">feet_to_inch</option>
			<option value="inch_to_feet">inch_to_feet</option>
			<option value="kg_to_gram">kg_to_gram</option>
		</select>
		<br><br>
		<label for="value">Value:</label>
		<input type="text" name="value" id="value">
		<input type="submit" name="submit" value="Submit">
		<span style="color: red"><?php echo $valueErr; ?></span>
		<br><br>
		<label for="result">Result:</label>
		<input type="text" name="result" id="result" value="<?php echo $result; ?>">
		<br><br>
		<span style="color: green"><?php echo $successfulMessage; ?></span>
		<span style="color: red"><?php echo $errorMessage; ?></span>
	</form>

</body>
</html>