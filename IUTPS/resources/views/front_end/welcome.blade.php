<!DOCTYPE html>
<html lang="en">
<head>
	<title>IUTPS Film Festival</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">


	<link href="css/sweetalert.css" rel="stylesheet">
<!--===============================================================================================-->


<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>


</head>
<body>
	
	<!--  -->
	<div class="simpleslide100">
		<div class="simpleslide100-item bg-img1" style="background-image: url('images/bg01.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('images/bg02.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('images/bg03.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('images/bg04.jpg');"></div>
	</div>


	<!-- the div below had p-l-75 p-r-75 -->

	<div class="flex-col-c-sb size1 overlay1 p-l-75 p-r-75 p-t-20 p-b-40 p-lr-15-sm">
		<!--  -->
		<div class="w-full flex-w flex-sb-m">
			<!-- the div below had no m-l-70 -->
			<div class="wrappic1 m-l-70 m-r-30 m-t-10 m-b-10">
				<a href="#"><img src="images/icons/logo.png" alt="LOGO"></a>
			</div>

			<div class="flex-w cd100 p-t-15 p-b-15 p-r-36">
				<div class="flex-w flex-b m-r-22 m-t-8 m-b-8">
					<span class="l1-txt1 wsize1 days">35</span>
					<span class="m1-txt1 p-b-2">Days</span>
				</div>

				<div class="flex-w flex-b m-r-22 m-t-8 m-b-8">
					<span class="l1-txt1 wsize1 hours">17</span>
					<span class="m1-txt1 p-b-2">Hours</span>
				</div>

				<div class="flex-w flex-b m-r-22 m-t-8 m-b-8">
					<span class="l1-txt1 wsize1 minutes">50</span>
					<span class="m1-txt1 p-b-2">Min</span>
				</div>

				<div class="flex-w flex-b m-r-22 m-t-8 m-b-8">
					<span class="l1-txt1 wsize1 seconds">39</span>
					<span class="m1-txt1 p-b-2">Sec</span>
				</div>
			</div>

			<!-- the div below had no m-r-10 -->

			<!-- <div class="m-r-10 m-t-10 m-b-10">
				<a href="#" class="size2 s1-txt1 flex-c-m how-btn1 trans-04">
					Sign Up
				</a>
			</div> -->
		</div>

	<!-- <div>
      <img src={{asset('images/Banner.png')}} width="100%" height="100%">
    </div> -->

		<!--  -->
		<div class="flex-col-c-m p-l-15 p-r-15 p-t-80 p-b-90">
			<h3 class="l1-txt2 txt-center p-b-55 respon1">
				IUTPS FILM FESTIVAL
			</h3>

			<!-- <div>
				<button class="how-btn-play1 flex-c-m">
					<i class="zmdi zmdi-play"></i>
				</button>
			</div> -->
		</div>
		
		<!-- <div class="flex-sb-m flex-w w-full">
			
			<div class="flex-w flex-c-m m-t-10 m-b-10">
				<a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-3 m-t-3">
					<i class="fa fa-facebook"></i>
				</a>

				<a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-3 m-t-3">
					<i class="fa fa-twitter"></i>
				</a>

				<a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-3 m-t-3">
					<i class="fa fa-youtube-play"></i>
				</a>
			</div>

			<form class="contact100-form validate-form m-t-10 m-b-10">
				<div class="wrap-input100 validate-input m-lr-auto-lg" data-validate = "Email is required: ex@abc.xyz">
					<input class="s2-txt1 placeholder0 input100 trans-04" type="text" name="email" placeholder="Email Address">

					<button class="flex-c-m ab-t-r size4 s1-txt1 hov1">
						<i class="zmdi zmdi-long-arrow-right fs-16 cl1 trans-04"></i>
					</button>
				</div>		
			</form>
		</div>
	</div> -->



	


<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="{{ route('store_film_front') }}" method="post" id="myform" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="form-left">
					<h2>Team Infomation</h2>

					<div class="form-row">
						<input type="text" name="team_name" class="input-text" placeholder="Team Name" required>
					</div>

					<div class="form-row">
						<input type="text" name="member_1_name" class="input-text" placeholder="Team Leader's Name" required>
					</div>

					<div class="form-row">
						<input type="text" name="member_2_name" class="input-text" placeholder="Member 1 Name" required>
					</div>

					<div class="form-row">
						<input type="text" name="member_3_name" class="input-text" placeholder="Member 2 Name" required>
					</div>

					<div class="form-row">
						<input type="text" name="member_4_name" class="input-text" placeholder="Member 3 Name (Optional)">
					</div>

					<div class="form-row">
						<input type="text" name="nationality" class="input-text" placeholder="Nationality" required>
					</div>


					<div class="form-row">
						<label> Occupation </label>
						<select name="occupation" class="input-text" required="required">
							<!-- <option class="option" value="">Please Select an Occupation</option> -->
						    <option value="student">Student</option>
						    <option value="freelancer">Freelancer</option>
						    <!-- <option class="option" value="reporter">Reporter</option>
						    <option class="option" value="secretary">Secretary</option> -->
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>

					<!-- <div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="first_name" id="first_name" class="input-text" placeholder="First Name" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="last_name" id="last_name" class="input-text" placeholder="Last Name" required>
						</div>
					</div>
					<div class="form-row">
						<select name="position">
						    <option value="position">Position</option>
						    <option value="director">Director</option>
						    <option value="manager">Manager</option>
						    <option value="employee">Employee</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-row">
						<input type="text" name="company" class="company" id="company" placeholder="Company" required>
					</div>
					<div class="form-group">
						<div class="form-row form-row-3">
							<input type="text" name="business" class="business" id="business" placeholder="Business Arena" required>
						</div>
						<div class="form-row form-row-4">
							<select name="employees">
							    <option value="employees">Employees</option>
							    <option value="trainee">Trainee</option>
							    <option value="colleague">Colleague</option>
							    <option value="associate">Associate</option>
							</select>
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
					</div> -->
				</div>
				<div class="form-right">
					<h2>Contact Details &amp; Film Information </h2>

					<div class="form-row">
						<input type="text" name="contact" class="input-text" placeholder="Contact Number" required>
					</div>

					<div class="form-row">
						<input type="email" name="email" class="input-text" placeholder="Email Address" required>
					</div>

					<div class="form-row">
						<input type="text" name="address" class="input-text" placeholder="Residential Address" required>
					</div>

					<div class="form-row">
						<input type="text" name="film_name" class="input-text" placeholder="Film Name" required>
					</div>

					<h2>Please upload the file of your film [Max File Size: 30MB] </h2>
					<div class="form-row">

						<input type="file" name="pdf" class="form-group" placeholder="" required>
					</div>

					<!-- <div class="form-row">
						<input type="text" name="street" class="street" id="street" placeholder="Street + Nr" required>
					</div>
					<div class="form-row">
						<input type="text" name="additional" class="additional" id="additional" placeholder="Additional Information" required>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="zip" class="zip" id="zip" placeholder="Zip Code" required>
						</div>
						<div class="form-row form-row-2">
							<select name="place">
							    <option value="place">Place</option>
							    <option value="Street">Street</option>
							    <option value="District">District</option>
							    <option value="City">City</option>
							</select>
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
					</div>
					<div class="form-row">
						<select name="country">
						    <option value="country">Country</option>
						    <option value="Vietnam">Vietnam</option>
						    <option value="Malaysia">Malaysia</option>
						    <option value="India">India</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="code" class="code" id="code" placeholder="Code +" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="phone" class="phone" id="phone" placeholder="Phone Number" required>
						</div>
					</div>
					<div class="form-row">
						<input type="text" name="your_email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email">
					</div>
					<div class="form-checkbox">
						<label class="container"><p>I do accept the <a href="#" class="text">Terms and Conditions</a> of your site.</p>
						  	<input type="checkbox" name="checkbox">
						  	<span class="checkmark"></span>
						</label>
					</div> -->
					<div class="form-row-last">
						<input type="submit" name="register" class="register" value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>





	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/moment.min.js"></script>
	<script src="vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 35,
			endtimeHours: 19,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script src="js/sweetalert.min.js"></script>
</body>
</html>