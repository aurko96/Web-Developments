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
				<li><a href="indexUser.php">Home</a></li>
				<li><a href="shop.php">Shop</a></li>
				<li><a href="#"><u>Sell</u></a></li>
				<li><a href="#">About</a></li>
				<li><a href="index.html">Log Out</a></li>
				<li><form action="http://localhost/openshop/view/shop.php" method="POST"><input class="button2" type="submit" value="Search" name="submit"></li>
				<li><input type="text" placeholder="Search.." name="search"></form></li>
				<li><a href="myProduct.php">My Product</a></li>
				<li><a href="myCart.php">My Cart</a></li>
			</ul>
		</div>
	</nav>
	<section id="login">
		<div class="container">
			<div id="wrong">
				<p> All fields were not properly filled up </p>
			</div>
			<form action="http://localhost/openshop/controller/selling.php" method="POST" enctype="multipart/form-data">
				
			<div class="form-group2">
				<label>Product Name: </label>
				<input type="text" name="productName">
			</div>
			<br>
			<div class="form-group2">
				<label>Product Category: </label>
				<select name="productCategory">
					<?php
						$host =  'localhost';
					  	$user = 'root';
					  	$password = '123456';
					  	$dbname = 'openshop';


					  	$dsn = 'mysql:host='. $host .';dbname='. $dbname;

					  	$pdo = new PDO($dsn, $user, $password);
					  	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
					  	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

					  	$sql='SELECT * from productcategories;';
					  	$stmt = $pdo->prepare($sql);
					  	$stmt->execute();


					  	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>';
                        }

					?>
					
				</select>

			</div>
			<br>
			<div class="form-group2">
				<label>Product Unit Price: </label>
				<input type="number" name="productPrice">
			</div>
			<br>
			<div class="form-group2">
				<label>Product Quantity: </label>
				<input type="number" name="productQuantity">
			</div>
			<br>
			<div class="form-group2">
				<label>Product Location: </label>
				<input type="text" name="productLocation">
			</div>
			<br>
			<div class="form-group2">
				<label>Product Image: </label>
				<input type="file" name="productImage">
			</div>
			<br>
			

			<input class="button" type="submit" value="Submit" name="submit">
			<br>
			</form>
		</div>
	</section>
</body>
</html>