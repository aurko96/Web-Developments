<?php 

    session_start();
  	//callFunc();


  	$host =  'localhost';
  	$user = 'root';
  	$password = '123456';
  	$dbname = 'openshop';


  	$dsn = 'mysql:host='. $host .';dbname='. $dbname;

  	$pdo = new PDO($dsn, $user, $password);
  	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $proName= $_POST['cartButton'];
    $proID = $_POST['cartID'];
    $userName = $_SESSION['userName'];

    $sql='DELETE from product_cart where user_name=? and product_id=? ;';
    $stmt = $pdo->prepare($sql);
    if( $stmt->execute([$userName,$proID]))
    {
      header("Location: ../view/myCart.php");
      exit();
    }
    else
    {
      echo '<p> Error occurred while deleting item. </p>';
    }
   




?>