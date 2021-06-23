<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<h1 style="color: red;">Page 3 [History]</h1>
	<h2 style="color: red;">Conversion Site</h2>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<a href="page1.php" style="color: blue;">1. Home</a>
		<a href="page2.php" style="color: blue;">2. Conversion Rate</a>
		<a href="page3.php" style="color: blue;">3. History</a>
		
	</form>

</body>
</html>