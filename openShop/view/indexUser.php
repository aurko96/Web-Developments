<?php
	
	session_start();
	//$sql=$_SESSION['sql']
	$firstName=$_SESSION['firstName'];
	$lastName=$_SESSION['lastName'];
	$userName=$_SESSION['userName'];


?>


<!DOCTYPE html>
<html>
<head>
	<title>OpenShop</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
	<header id="main-header">
		<div class="container">
			<h1>OpenShop</h1>
		</div>
	</header>

	<nav id="navbar">
		<div class="container">
			<ul>
				<li><a href="indexUser.php"><u>Home</u></a></li>
				<li><a href="shop.php">Shop</a></li>
				<li><a href="sell.php">Sell</a></li>
				<li><a href="myProduct.php">My Product</a></li>
				<li><a href="index.html">Log Out</a></li>
				<li><form action="http://localhost/openshop/view/shop.php" method="POST"><input class="button2" type="submit" value="Search" name="submit"></li>
				<li><input type="text" placeholder="Search.." name="search"></form></li>
				
				<li><a href="myCart.php">My Favourites</a></li>

				



			</ul>
		</div>
	</nav>
	<section id="welcome">
		<div class="container">
			<h1> WELCOME <?php echo $firstName.' '.$lastName; ?></h1>
			<p> OpenShop is an E-Commerce website for transaction of buying or selling of products online. It gives you the platform to electronically exchange goods and services with no time and distance barriers. </p>
		</div>
	</section>

	<footer id="main-footer">
		<p>Copyright &copy; 2018, OpenShop Website <br> Created by Saadman Malik, Mezbaur Rahman and Shahed Ahmed </p>
	</footer>

</body>
</html>