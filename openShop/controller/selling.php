<?php 

	session_start();
	callFunc();


	$host =  'localhost';
  	$user = 'root';
  	$password = '123456';
  	$dbname = 'openshop';


  	$dsn = 'mysql:host='. $host .';dbname='. $dbname;

  	$pdo = new PDO($dsn, $user, $password);
  	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


  	$productName = $_POST['productName'];
  	$productCategory=$_POST['productCategory'];
	$productPrice = $_POST['productPrice'];
	$productQuantity=$_POST['productQuantity'];
	$productLocation=$_POST['productLocation'];
	$productOwner=$_SESSION['userName'];
	$productType=$_POST['productType'];

	$productImage = $_FILES['productImage']['name'];
	$target = "../view/images/".basename($productImage);
	//$productImage=$_POST['productImage'];
	$msg="";

	if (move_uploaded_file($_FILES['productImage']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}


	$sql = 'INSERT into products(product_name,p_category_id,product_price,product_quantity,product_image,product_location,product_owner,product_type) values (?,?,?,?,?,?,?,?);';
	  $stmt = $pdo->prepare($sql);
	  if($stmt->execute([$productName,$productCategory,$productPrice,$productQuantity,$productImage,$productLocation,$productOwner,$productType]))
	  {
	  	header("Location:../view/shop.php");
	  	exit();
	  }
	  else
	  {
	  	echo "<script> alert('Error inserting data in database!');history.go(-1);  </script>";
	  }


	function callFunc(){
  		if(!isset($_POST['productName']) || empty($_POST['productName']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/sellFail.php");
			exit();
		}
		else if(!isset($_POST['productPrice']) || empty($_POST['productPrice']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/sellFail.php");
			exit();
		}
		else if(!isset($_POST['productQuantity']) || empty($_POST['productQuantity']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/sellFail.php");
			exit();
		}
		else if(!isset($_POST['productLocation']) || empty($_POST['productLocation']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/sellFail.php");
			exit();
		}
		else if(!isset($_FILES['productImage']) || empty($_FILES['productImage']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/sellFail.php");
			exit();
		}
		else if(!isset($_POST['productType']) || empty($_POST['productType']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/sellFail.php");
			exit();
		}
  	}

?>