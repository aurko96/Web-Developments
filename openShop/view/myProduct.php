<!DOCTYPE html>
<html>
<head>
	<title>OpenShop</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body id="different">
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
				<li><a href="sell.php">Sell</a></li>
				<li><a href="myProduct.php"><u>My Product</u></a></li>
				<li><a href="index.html">Log Out</a></li>
				<li><form action="http://localhost/openshop/view/myProduct.php" method="POST"><input class="button2" type="submit" value="Search" name="submit"></li>
				<li><input type="text" placeholder="Search.." name="search"></form></li>
				
				<li><a href="myCart.php">My Favourites</a></li>
			</ul>
		</div>
	</nav>
	<section >
		<div class="container">
			
			<?php

				session_start();
				$host =  'localhost';
			  	$user = 'root';
			  	$password = '123456';
			  	$dbname = 'openshop';
			  	$owner=$_SESSION['userName'];
			  	if(!isset($_POST['search']) || empty($_POST['search'])){

			  		$srch='%%';
			  	}
			  	else{
			  		$string=$_POST['search'];
			  		$srch='%'.$string.'%';

			  	} 


			  	$dsn = 'mysql:host='. $host .';dbname='. $dbname;

			  	$pdo = new PDO($dsn, $user, $password);
			  	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			  	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

			  	$sql='SELECT * from products where product_owner=? and product_name like ?;';
			  	$stmt = $pdo->prepare($sql);
			  	$stmt->execute([$owner,$srch]);
			  	$count=$stmt->rowcount();
			  	if($count){
			  		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			  			echo "<div class='block'>";
	                    echo "<form action='http://localhost/openshop/view/myProductDetail.php' method='POST'><input type='image' src='../view/images/".$row['product_image']."' height='200' width='200' value='".$row['product_id']."' name='product_detail'></form>";
	      				echo "<p>".$row['product_name']."<br> Unit Price: ".$row['product_price']."</p>";
	      				echo '</div>';
      				}
			  	}
			  	else{
			  		echo "<div class='error'> No Match Found! </div>";
			  	}

			?> 


		</div>
	</section>
</body>
</html>