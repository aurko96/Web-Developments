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


    $productName = $_POST['cartButton'];
    $productID = $_POST['cartID'];
    $userName = $_SESSION['userName'];


    $stmt = $pdo->prepare('SELECT * FROM product_cart where product_id=? and user_name=?');
    $stmt->execute([$productID,$userName]);
    $cnt=$stmt->rowcount();
    if($cnt>0)
    {
      echo "<script> alert('Product already exists in your favourites!'); history.go(-2); </script>";
    }
    else
    {
      $stmt = $pdo->prepare('INSERT into product_cart values(?,?,?);');
      if($stmt->execute([$userName,$productID,$productName]))
      {
        header("Location: ../view/myCart.php");
        exit();
      }
      else
      {
        echo 'Error';
      }
    }
    


    

    function callFunc(){
      if(!isset($_SESSION['userName']) || empty($_SESSION['userName']))
    {
      //echo 555555;
      header("Location: ../view/shop.php");
      exit();
    }
    if(!isset($_POST['cartID']) || empty($_POST['cartID']))
    {
      //echo 5555;
      header("Location: ../view/shop.php");
      exit();
    }
    else if(!isset($_POST['cartButton']) || empty($_POST['cartButton']))
    {
      //echo 5555;
      header("Location: ../view/shop.php");
      exit();
    }

    }
?>