<?php 
	
	callFunc();

	$host =  'localhost';
  	$user = 'root';
  	$password = '123456';
  	$dbname = 'openshop';


  	$dsn = 'mysql:host='. $host .';dbname='. $dbname;

  	$pdo = new PDO($dsn, $user, $password);
  	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


  	//INSERT DATA

	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$userName = $_POST['userName'];
	$psw = $_POST['psw'];
	$psw=md5($psw);
	$country = $_POST['country'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$birthday = $_POST['birthday'];
	$mobile = $_POST['mobile'];
	$district = $_POST['district'];

	//echo $firstName;
	$sql = 'INSERT INTO usertable(FirstName,LastName,UserName,Password,Country,District,E_Mail,Gender,Birthday,Contact_No) VALUES(?,?,?,?,?,?,?,?,?,?)';
	$stmt = $pdo->prepare($sql);
	if($stmt->execute([$firstName, $lastName, $userName, $psw, $country, $district, $email, $gender, $birthday, $mobile])){

		header("Location:../view/login.html");
		exit();
	}
	else{
		echo "<script> alert('User name already exists!');history.go(-1);  </script>";

		//echo 'Error inserting value in database'.'<br>'.'<br>';
		//echo "<a href='../view/signup.html' > Go back </a>";
		exit();
	}
	


	function callFunc(){
		if(!isset($_POST['firstName']) || empty($_POST['firstName']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/signupFail.html");
			exit();
		}
		else if(!isset($_POST['lastName']) || empty($_POST['lastName']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/signupFail.html");
			exit();
		}
		else if(!isset($_POST['userName']) || empty($_POST['userName']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/signupFail.html");
			exit();
		}
		else if(!isset($_POST['psw']) || empty($_POST['psw']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/signupFail.html");
			exit();
		}
		else if(!isset($_POST['country']) || empty($_POST['country']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/signupFail.html");
			exit();
		}
		else if(!isset($_POST['email']) || empty($_POST['email']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/signupFail.html");
			exit();
		}
		else if(!isset($_POST['gender']) || empty($_POST['gender']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/signupFail.html");
			exit();
		}
		else if(!isset($_POST['birthday']) || empty($_POST['birthday']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/signupFail.html");
			exit();
		}
		else if(!isset($_POST['mobile']) || empty($_POST['mobile']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/signupFail.html");
			exit();
		}
		else if(!isset($_POST['district']) || empty($_POST['district']))
		{
			echo "<script> alert('All fields were not filled up!');history.go(-1);  </script>";

			//header("Location: ../view/signupFail.html");
			exit();
		}
	}
	
	/*echo $_POST['firstName'].'<br>';
	echo $_POST['lastName'].'<br>'.$_POST['userName'].'<br>';
	echo $_POST['psw'].'<br>'.$_POST['email'].'<br>';
	echo $_POST['gender'].'<br>'.$_POST['birthday'].'<br>';
	echo "<a href='../view/signup.html' > Go back </a>"; */

?>
