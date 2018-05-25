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

    $pro_quantity=$_POST['amount'];
    $user_address=$_POST['addr'];
    $user_district=$_POST['district'];
    $pro_ID=$_POST['prodID'];
    $userName=$_SESSION['userName'];

    $sql='SELECT product_quantity from products where product_id=?;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$pro_ID]);
    $number=$stmt->fetch(PDO::FETCH_ASSOC);
    $jinish =  $number['product_quantity'];
    if($pro_quantity<0 || $pro_quantity>$jinish)
    {
      echo "<script> alert('Invalid Input!');history.go(-3);  </script>";
      exit();
    }
    else
    {
      $sql='INSERT into ordertable(product_id,product_quantity,user_name,user_address,user_district) values (?,?,?,?,?);';
      $stmt = $pdo->prepare($sql);
      if($stmt->execute([$pro_ID,$pro_quantity,$userName,$user_address,$user_district]))
      {
        $sql='SELECT order_id from ordertable ORDER BY order_id DESC LIMIT 1;';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $number=$stmt->fetch(PDO::FETCH_ASSOC);

        $odr_id=$number['order_id'];

        $sql='SELECT product_price from products where product_id=?;';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$pro_ID]);
        $number=$stmt->fetch(PDO::FETCH_ASSOC);

        $pro_price=$number['product_price'];

         $sql = "CALL `ASSIGN_SHIPPER`(?,?,?,?,@ret);";
         $stmt = $pdo->prepare($sql);
         $stmt->execute([$odr_id,$user_district,$pro_quantity,$pro_price]);
         $stmt->closeCursor();

         $output = $pdo->query('SELECT @ret;')->fetch(PDO::FETCH_ASSOC);
         $ret=$output['@ret'];

         if($ret==1){

          $_SESSION['order_id']=$odr_id;

          header("Location: ../view/shippingDetail.php");
          exit();
         }
         else if($ret==-1){

          $sql='DELETE from ordertable where order_id=?;';
          $stmt = $pdo->prepare($sql);
          $stmt->execute([$odr_id]);

          echo "<script> alert('No shipper is available for the week! Try later!');history.go(-3);  </script>";
          exit();
         }

      }
      else {
        echo "<script> alert('Invalid Input!');history.go(-3);  </script>";
        exit();
      }
      

    }






    function callFunc(){
      if(!isset($_POST['amount']) || empty($_POST['amount']))
      {
        echo "<script> alert('All fields were not properly filled up!');history.go(-3);  </script>";

        //header("Location: ../view/loginFail.html");
        exit();
      }
      else if(!isset($_POST['addr']) || empty($_POST['addr']))
      {
        echo "<script> alert('All fields were not properly filled up!');history.go(-3);  </script>";

        //header("Location: ../view/loginFail.html");
        exit();
      }
      else if(!isset($_POST['district']) || empty($_POST['district']))
      {
        echo "<script> alert('All fields were not properly filled up!');history.go(-3);  </script>";

        //header("Location: ../view/loginFail.html");
        exit();
      }
    }


?>