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
				<li><a href="shop.php"><u>Shop</u></a></li>
				<li><a href="sell.php">Sell</a></li>
				<li><a href="myProduct.php">My Product</a></li>
				<li><a href="index.html">Log Out</a></li>
				<li><form action="http://localhost/openshop/view/shop.php" method="POST"><input class="button2" type="submit" value="Search" name="submit"></li>
				<li><input type="text" placeholder="Search.." name="search"></form></li>
				
				<li><a href="myCart.php">My Favourites</a></li>
			</ul>
		</div>
	</nav>
	<aside id="sideside">
		<form action="http://localhost/openshop/view/shop.php" method="POST">

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

					  	echo '<option value="all"> All </option>'; 
					  	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>';
                        }

					?>
					
				</select>

			</div>
			<br>

			<div class="form-group2">
				<label>Product Type</label>
				<select name="productType">
					<option value="all"> All </option>
					<option value="new">New</option>
					<option value="used">Used</option>
				</select>
			</div>
			<br>

			<div class="form-group2">
				<label>Price Range: </label>
				<select name="priceRange">
					<option value="all"> All </option>
					<option value="1k">0 - 1000</option>
					<option value="2k">1000 - 2000</option>
					<option value="5k">2000 - 5000</option>
					<option value="10k">5000 - 10000</option>
					<option value="30k">10000 - 30000</option>
					<option value="50k">30000 - 50000</option>
					<option value="100k">50000 - 100000</option>
					<option value="200k"> > 100000</option>
				</select>
			</div>
			<br>
			<input class="button2" type="submit" value="Find" name="submit">
			<br>
		</form>
	</aside>
	<section >
		<div class="container">
			
			<?php
				session_start();
				$host =  'localhost';
			  	$user = 'root';
			  	$password = '123456';
			  	$dbname = 'openshop';
			  	$owner=$_SESSION['userName'];
			  	// $productCategory=$_POST['productCategory'];
			  	// $productType=$_POST['productType'];
			  	// $priceRange=$_POST['priceRange'];
			  	//echo '<div class="block">'.var_dump($priceRange).'</div>';
			  	if(!isset($_POST['search']) || empty($_POST['search'])){

			  		$srch='%%';
			  	}
			  	else{
			  		$string=$_POST['search'];
			  		$srch='%'.$string.'%';

			  	}
			  	if(!isset($_POST['productCategory']) || empty($_POST['productCategory']) || $_POST['productCategory']=="all")
			  	{
			  		$p_category=0;
			  	}
			  	else
			  	{
			  		$p_category=$_POST['productCategory'];
			  	}
			  	if(!isset($_POST['productType']) || empty($_POST['productType']) || $_POST['productType']=="all")
			  	{
			  		$p_type='%%';
			  	}
			  	else
			  	{
			  		$p_type='%'.$_POST['productType'].'%';
			  	}
			  	if(!isset($_POST['priceRange']) || empty($_POST['priceRange']) || $_POST['priceRange']=="all")
			  	{
			  		$p_range1=0;
			  		$p_range2=9999999999;
			  	}
			  	else if($_POST['priceRange']=="1k"){
			  		$p_range1=0;
			  		$p_range2=1000;
			  	}
			  	else if($_POST['priceRange']=="2k"){
			  		$p_range1=1000;
			  		$p_range2=2000;
			  	}
			  	else if($_POST['priceRange']=="5k"){
			  		$p_range1=2000;
			  		$p_range2=5000;
			  	}
			  	else if($_POST['priceRange']=="10k"){
			  		$p_range1=5000;
			  		$p_range2=10000;
			  	}
			  	else if($_POST['priceRange']=="30k"){
			  		$p_range1=10000;
			  		$p_range2=30000;
			  	}
			  	else if($_POST['priceRange']=="50k"){
			  		$p_range1=30000;
			  		$p_range2=50000;
			  	}
			  	else if($_POST['priceRange']=="100k"){
			  		$p_range1=50000;
			  		$p_range2=100000;
			  	}
			  	else if($_POST['priceRange']=="200k"){
			  		$p_range1=100000;
			  		$p_range2=9999999999;
			  	}


			  	$dsn = 'mysql:host='. $host .';dbname='. $dbname;

			  	$pdo = new PDO($dsn, $user, $password);
			  	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			  	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

			  	$var=0;
			  	if($p_category==0)$var=0;
			  	else $var=10000000;
			  	$sql='SELECT * from products where product_owner!=? and product_name like ? and ( p_category_id=? or p_category_id>= '.$var.') and product_quantity>0 and product_type like ? and product_price between ? and ?;';
			  	$stmt = $pdo->prepare($sql);
			  	$stmt->execute([$owner,$srch,$p_category,$p_type,$p_range1,$p_range2]);
			  	$count=$stmt->rowcount();
			  	if($count){
			  		//$ii=1;
			  		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			  			echo "<div class='block3'>";
			  			// echo $ii.'<br>';
			  			// $ii++;
	                    echo "<form action='http://localhost/openshop/view/productDetail.php' method='POST'><input type='image' src='../view/images/".$row['product_image']."' height='200' width='200' value='".$row['product_id']."' name='product_detail'></form>";
	      				echo "<p>".$row['product_name']."<br> Unit Price: ".$row['product_price']."</p>";
	      				echo '</div>';
      				}

      				// <img src='../view/images/".$row['product_image']."' height='200' width='200'>

			  	}
			  	else{
			  		echo "<div class='error'> No Match Found! </div>";
			  	}

			?> 


		</div>
	</section>
</body>
</html>