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

    if(isset($_POST['addButton']) && !empty($_POST['amount']))
    {
      $add=$_POST['addButton'];
      $id=$_POST['prodID'];
      $amount=$_POST['amount'];
      if($amount<0)
      {
        echo "<script> alert('Invalid Input!'); history.go(-2); </script>";


      // header("Location: ../view/myProduct.php");
        exit();
      }

     $sql = "CALL `EDIT_QUANTITY`(?,?);";
     $stmt = $pdo->prepare($sql);
     if($stmt->execute([$id,$amount])){
        header("Location: ../view/myProduct.php");
        exit();
     }
      else echo 'Error';
     

      
    }
    else if(isset($_POST['deleteButton']) && !empty($_POST['amount']))
    {
      $delete=$_POST['deleteButton'];
      $id=$_POST['prodID'];
      $amount=$_POST['amount'];
      $sql='SELECT product_quantity from products where product_id=?;';
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$id]);
      $number=$stmt->fetch(PDO::FETCH_ASSOC);
      $jinish =  $number['product_quantity'];
      //echo '<p>'.$number.$id.'</p>';
      if($amount<0 || $amount>$jinish)
      {
        echo "<script> alert('Invalid Input!');history.go(-2);  </script>";


        // history.go(-2);
      //header("Location: ../view/myProduct.php");
        exit();
      }

      $sql = "CALL `EDIT_QUANTITY`(?,?);";
     $stmt = $pdo->prepare($sql);
     if($stmt->execute([$id,-$amount])){

        $sql='SELECT product_quantity from products where product_id=?;';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $number=$stmt->fetch(PDO::FETCH_ASSOC);
        $jinish =  $number['product_quantity'];
        if($jinish==0){

          // $sql='DELETE from products where product_id=?;';
          // $stmt = $pdo->prepare($sql);
          // $stmt->execute([$id]);
        }

        header("Location: ../view/myProduct.php");
        exit();
     }
      else echo 'Error';

    }
    else echo "<div class='error'> No Match Found! </div>";
 
    ?>