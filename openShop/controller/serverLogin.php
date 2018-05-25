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


  	$userName = $_POST['userName'];
	$psw = $_POST['psw'];
	$psw=md5($psw);
	

	//GET ROW COUNT

  	$stmt = $pdo->prepare('SELECT * FROM usertable WHERE UserName = ? && Password = ?');
  	$stmt->execute([$userName, $psw]);
  	$postCount = $stmt->rowCount();
  	if($postCount){

  	// PL-SQL

  	// 	$val='aurko96';
  	// 	$sql = "SELECT `DO_IT`(?) AS `DO_IT`;";
	  // 	$stmt = $pdo->prepare($sql);
	 	// $stmt->execute([$val]);
	  // 	$posts = $stmt->fetchAll();
	  // 	print_r($posts);


  		// Session


  		$sql = 'SELECT FirstName,LastName FROM usertable WHERE UserName=? && Password=?;';
  		//echo $sql;

	  	$stmt = $pdo->prepare($sql);
	  	$stmt->execute([$userName,$psw]);
	  	$posts = $stmt->fetchAll();

	  	//var_dump($posts);
	  	foreach($posts as $post){
	    	$_POST['firstName']=$post->FirstName;
	    	$_POST['lastName']=$post->LastName;
	  	}

	  	//$_SESSION['sql']=htmlentities($sql);
  		$_SESSION['firstName']=htmlentities($_POST['firstName']);
  		$_SESSION['lastName']=htmlentities($_POST['lastName']);
  		$_SESSION['userName']=htmlentities($_POST['userName']);

  		header("Location: ../view/indexUser.php");



  		exit();
  	}
  	else{

  		echo "<script> alert('Wrong user name or password!');history.go(-1);  </script>";

  		//header("Location: ../view/loginFail.html");
  		exit();
  	}



  	function callFunc(){
  		if(!isset($_POST['userName']) || empty($_POST['userName']))
		{
			echo "<script> alert('Wrong user name or password!');history.go(-1);  </script>";

			//header("Location: ../view/loginFail.html");
			exit();
		}
		else if(!isset($_POST['psw']) || empty($_POST['psw']))
		{
			echo "<script> alert('Wrong user name or password!');history.go(-1);  </script>";

			//header("Location: ../view/loginFail.html");
			exit();
		}
  	}
?>