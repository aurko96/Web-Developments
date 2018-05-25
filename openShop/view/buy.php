
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
				<li><a href="myProduct.php">My Product</a></li>
				<li><a href="index.html">Log Out</a></li>
				<li><form action="http://localhost/openshop/view/shop.php" method="POST"><input class="button2" type="submit" value="Search" name="submit"></li>
				<li><input type="text" placeholder="Search.." name="search"></form></li>

				<li><a href="myCart.php">My Favourites</a></li>
			</ul>
		</div>
	</nav>
	<section id="secbar">
		<div class="container">
			
			<?php

				session_start();
				$host =  'localhost';
			  	$user = 'root';
			  	$password = '123456';
			  	$dbname = 'openshop';
			  	$owner=$_SESSION['userName'];
			  	$detail=$_POST['buyButton'];
			  	$pro_name="";
			  	$pro_id=-1;
			  	$pro_owner="";
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

			  	$sql='SELECT * from products where product_id=?;';
			  	$stmt = $pdo->prepare($sql);
			  	$stmt->execute([$detail]);
			  	$count=$stmt->rowcount();
			  	if($count){
			  		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			  			echo "<div class='block2'>";
	                    echo "<img src='../view/images/".$row['product_image']."' height='200' width='200'>";
	      				echo "<p>".$row['product_name']."<br> Unit Price: ".$row['product_price']."<br> Quantity: ".$row['product_quantity']."<br> Location: ".$row['product_location']."<br> Upload time: ".$row['product_update_time']."<br> Product Type: ".$row['product_type']."<br> Owner: ".$row['product_owner']."</p>";
	      				echo '</div>';
	      				$pro_name=$row['product_name'];
	      				$pro_id=$row['product_id'];
	      				$pro_owner=$row['product_owner'];
      				}
			  	}
			  	else{
			  		echo "<div class='error'> No Match Found! </div>";
			  	}

			?> 

		<ul>

			<li>
				<div class="block2">
				<form action="http://localhost/openshop/controller/shipment.php" method="POST">

				<div class="form-group2">
					<label> Enter Quantity: </label>
					<input type="number" name="amount">
				</div>
				<br>
				<div class="form-group2">
					<label> Enter Address: </label>
					<textarea name="addr"></textarea>
				</div>
				<br>
				<div class="form-group2">
					<label>District:</label>
					<select name="district">
						<option value="Dhaka">Dhaka</option>
						<option value="Chittagong">Chittagong</option>
						<option value="Rajshahi">Rajshahi</option>
					</select>
				</div>

				<input type="hidden" value="<?php echo htmlspecialchars($pro_id); ?>" name="prodID">

			<br>
				<button class="button2" type="submit" value="ship" name="shipButton">Shipment Order</button>

				</form>
				<br>
				<button class="button2" onclick="myFunc(2)" value="contactSeller" name="sellerButton">Contact Seller</button>

			</div>

			<br><br>

			<div id="contact"> 

				<?php
					$sql='SELECT Contact_No from usertable where UserName=?;';
				  	$stmt = $pdo->prepare($sql);
				  	$stmt->execute([$pro_owner]);
				  	$number=$stmt->fetch(PDO::FETCH_ASSOC);

				  	echo '<p>'.$number['Contact_No'].'</p>';

				?>

			</div>

		<br><br>
				<label> <u>Shipment Information: </u> We have particular number of shippers assigned to their respective districts. Each shipper takes at most four orders a day and can take orders for the upcoming seven days. </label>

				

			</li>		

		</ul>
	
		<br>

		<!-- <div id="contact"> 

			<?php
				$sql='SELECT Contact_No from usertable where UserName=?;';
			  	$stmt = $pdo->prepare($sql);
			  	$stmt->execute([$pro_owner]);
			  	$number=$stmt->fetch(PDO::FETCH_ASSOC);

			  	echo '<p>'.$number['Contact_No'].'</p>';

			?>



		</div> -->

		<script>
			function myFunc(n){
				var x=document.getElementById("contact");

				if (x.style.display === "none" ) {
			        x.style.display = "block";
			    } else {
			        x.style.display = "none";
			    }
				

			}

			
		</script>

		</div>
	</section>
</body>
</html>