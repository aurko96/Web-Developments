
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

<!--	<nav id="navbar">
		<div class="container">
			<ul>
				<li><a href="indexUser.php">Home</a></li>
				<li><a href="shop.php">Shop</a></li>
				<li><a href="sell.php">Sell</a></li>
				<li><a href="#">About</a></li>
				<li><a href="index.html">Log Out</a></li>
				<li><form action="http://localhost/openshop/view/shop.php" method="POST"><input class="button2" type="submit" value="Search" name="submit"></li>
				<li><input type="text" placeholder="Search.." name="search"></form></li>
				<li><a href="myProduct.php">My Product</a></li>
				<li><a href="myCart.php">My Favourites</a></li>
			</ul>
		</div>
	</nav> -->
	<section id="secbar">
		<div class="container">
			
			<?php

				session_start();
				$host =  'localhost';
			  	$user = 'root';
			  	$password = '123456';
			  	$dbname = 'openshop';
			  	$owner=$_SESSION['userName'];
			  	$odr_id=$_SESSION['order_id'];
			  	

			  	$dsn = 'mysql:host='. $host .';dbname='. $dbname;

			  	$pdo = new PDO($dsn, $user, $password);
			  	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			  	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);



			  	$sql='SELECT * from ordertable where order_id=?;';
			  	$stmt = $pdo->prepare($sql);
			  	$stmt->execute([$odr_id]);
			  	$number=$stmt->fetch(PDO::FETCH_ASSOC);
			  	$pro_id=$number['product_id'];
			  	$buy_quantity=$number['product_quantity'];
			  	$buyer_name=$number['user_name'];
			  	$buyer_addr=$number['user_address'];
			  	$buyer_district=$number['user_district'];



			  	$sql='SELECT * from products where product_id=?;';
			  	$stmt = $pdo->prepare($sql);
			  	$stmt->execute([$pro_id]);
			  	$count=$stmt->rowcount();
			  	if($count){
			  		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			  			echo "<div class='block'>";
	                    echo "<img src='../view/images/".$row['product_image']."' height='200' width='200'>";
	      				echo "<p>".$row['product_name']."<br> Product Location: ".$row['product_location']."<br> Product Type: ".$row['product_type']."<br> Product Owner: ".$row['product_owner']."</p>";
	      				//echo '</div>';
	      				$pro_name=$row['product_name'];
	      				$pro_id=$row['product_id'];
      				}


      				$sql='SELECT * from shipment_details where order_id=?;';
				  	$stmt = $pdo->prepare($sql);
				  	$stmt->execute([$odr_id]);
				  	$ship=$stmt->fetch(PDO::FETCH_ASSOC);
				  	$shipper_id=$ship['shipper_id'];
				  	$delivery_date=$ship['delivery_date'];
				  	$total_price=$ship['total_price'];

				  	$sql='SELECT shipper_name from shipper where shipper_id=?;';
				  	$stmt = $pdo->prepare($sql);
				  	$stmt->execute([$shipper_id]);
				  	$ship=$stmt->fetch(PDO::FETCH_ASSOC);
				  	$shipper_name=$ship['shipper_name'];

				  	//echo "<p> Order id: ".$odr_id."</p>";
				  	echo "<p> Purchase Order ID: ".$odr_id."<br> Buyer Name: ".$buyer_name."<br> Purchase quantity: ".$buy_quantity."<br> Buyer Address: ".$buyer_addr."<br> Buyer District: ".$buyer_district."<br> Shipper Name: ".$shipper_name."<br> Delivery Date: ".$delivery_date."<br> Total Price: ".$total_price."<p> </div>";



			  	}
			  	else{
			  		echo "<div class='error'> No Match Found! </div>";
			  	}

			?> 

		<ul>

			<li>
				<form action="http://localhost/openshop/view/shippingDetail.php" method="POST">

				<label> Do you confirm purchase? <label>

				<input type="hidden" value="<?php echo htmlspecialchars($pro_id); ?>" name="prodID">

			</li>
			<li>
				<button class="button2" type="submit" value="yes" name="yesBuyButton">YES</button>

				<button class="button2" type="submit" value="no" name="noBuyButton">NO</button>
			</form>

			</li>		

		</ul>
			
		<?php

			if(isset($_POST['yesBuyButton']) && !empty($_POST['yesBuyButton']))
			{
				$sql = "CALL `EDIT_QUANTITY`(?,?);";
     			$stmt = $pdo->prepare($sql);
     			if($stmt->execute([$pro_id,-$buy_quantity]))
     			{
     				$sql='SELECT product_quantity from products where product_id=?;';
			        $stmt = $pdo->prepare($sql);
			        $stmt->execute([$pro_id]);
			        $num=$stmt->fetch(PDO::FETCH_ASSOC);
			        $jinish =  $num['product_quantity'];
			        //echo '<label>'.$jinish.'</label>';
			        if($jinish==0){
			        	//echo '<label> Val: '.$jinish.' '.$pro_id.'</label>';

			          // $sql='DELETE from products where products.product_id=?;';
			          // $stmt = $pdo->prepare($sql);
			          // $stmt->execute([$pro_id]);
			        }

			        header("Location:shop.php");
			        exit();

     			}
     			else{
     				echo "<script> alert('Error Occurred!');history.go(-3);  </script>";
     				exit();
     			}

			}
			else if(isset($_POST['noBuyButton']) && !empty($_POST['noBuyButton']))
			{
				  $sql='DELETE from shipment_details where order_id=?;';
		          $stmt = $pdo->prepare($sql);
		          $stmt->execute([$odr_id]);

		          $sql='DELETE from ordertable where order_id=?;';
		          $stmt = $pdo->prepare($sql);
		          $stmt->execute([$odr_id]);

		          header("Location:shop.php");
		          exit();

			}

		?>

		</div>
	</section>
</body>
</html>