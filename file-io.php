<!DOCTYPE html>
<html>
<head>
	<title> Survey Form </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1>Registration Form</h1>



	<?php 

	define("filepath", "data.txt");

	$fName= $lName= $Radio= $Religion= $Birthday= $Prsadd= $Pemadd= $Email= $Phone= $Link= $Username= $Password= "";

	$fNameEr= $lNameEr= $RadioEr= $ReligionEr= $BirthdayEr= $PrsaddEr= $PemaddEr= $EmailEr= $PhoneEr= $LinkEr= $UsernameEr= $PasswordEr= "";

	$successfulMessage = $errorMessage = "";
	$flag = false;

	if($_SERVER['REQUEST_METHOD'] === "POST") 
		$fName = $_POST['fname'];
		$lName = $_POST['lname'];
		$Radio = $_POST['radio'];
		$Religion = $_POST['religion'];
		$Birthday = $_POST['birthday'];
		$Prsadd = $_POST['prsadd'];
		$Pemadd = $_POST['pemadd'];
		$Email = $_POST['email'];
		$Phone = $_POST['phone'];
		$Link = $_POST['link'];
		$Username = $_POST['username'];
		$Password = $_POST['password'];

	if(empty($fName)) {
		$fNameEr = "Enter first namme";
		$flag = true;}

	if(empty($lName)) {
		$lNameEr = "Enter last name";
		$flag = true;}

	if(empty($Rdio)) {
		$RadioEr = "Enter gender";
		$flag = true;}

	if(empty($Religion)) {
		$ReligionEr = "Select Religion";
		$flag = true;}

	if(empty($Birthday)) {
		$BirthdayEr = "Enter Date of birth";
		$flag = true;}

	if(empty($Prsadd)) {
		$PrsaddEr = "Enter Present Address";
		$flag = true;}

	if(empty($Pemadd)) {
		$PemaddEr = "Enter Permanent Adress";
		$flag = true;}

	if(empty($Email)) {
		$EmailEr = "Enter Email";
		$flag = true;}

	if(empty($Phone)) {
		$PhoneEr = "Enter Phone number xxx-xxx-xxx";
		$flag = true;}

	if(empty($Link)) {
		$LinkEr = "Enter Personal Website link";
		$flag = true;}

	if(empty($Username)) {
		$UsernameEr = "Enter User name";
		$flag = true;}

	if(empty($Password)) {
		$PasswordEr = "Enter User name";
		$flag = true;}

	if(!$flag){
		$fName = test_input($fName);
		$lName = test_input($lName);
		$data = $fName . "," . $lName;
		$result1 = write($data);
		if($result1) {
			$successfulMessage = "Successfully saved.";}
	else {
		$errorMessage = "Error while saving.";}
	}



	function write($content) {
		$resource = fopen(filepath, "a");
		$fw = fwrite($resource, $content . "\n");
		fclose($resource);
		return $fw;}

	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	?>


<form action="file-io.php" method="POST" >
<fieldset> <legend>Basic Information:</legend><br>
	
	    <label for="fname">First Name:</label>
	    <input type="text" id="fname" name="fname">
	</span><?php echo $fNamEr;?></span><br><br>


		<label for="lname">Last Name:</label>
		<input type="text" id="lname" name="lname">
	</span><?php echo $lNamEr;?></span><br><br>

		<span><?php echo $successfulMessage; ?></span>
		<span><?php echo $errorMessage; ?></span>



		<label for="gender"> Gender:</label>
		<input type="radio" id="male" name="gender" value="male">
		<label for="male">Male</label>
		<input type="radio" id="gender" name="gender" value="gender">
		<label for="gender">Female</label>
	</span><?php echo $RadioEr;?></span><br><br>

		 <label for="birthday">Birthday:</label>
         <input type="date" id="birthday" name="birthday">
    </span><?php echo $BirthdayEr;?></span><br><br>

        <label for="reg">Religion:</label>
		<select id="reg">
			<option value="islam">Islam</option>
			<option value="christianity">Christianity</option>
			<option value="hinduism">Hinduism</option>
			<option value="buddhism">Buddhism</option>
			<option value="others">otheres</option>
		</select>
	</span><?php echo $ReligionEr;?></span><br><br></fieldset>
    


<fieldset><legend>Contact Information:</legend><br>

     	<label for="prsadd">Pressent Address:</label>
		<input type="text" id="prsadd" name="prsadd"><br><br>

		<label for="pemadd">Permanent Address :</label>
		<input type="text" id="pemadd" name="pemadd"><br><br>

		<label for="email">Enter Email Adress : </label>
		<input type="email" id="email" name="email"><br><br>

		<label for="phone">Enter Phone Number :</label>
		<input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"><br><br>

		<label for="link">Personal Website Lienk :</label>
		<input type="text" id="link" name="link"><br><br></fieldset>



<fieldset> <legend>Basic Information:</legend><br>
	
	    <label for="username">User Name:</label>
		<input type="text" id="username" name="username"><br><br>

		<label for="pwd">Password:</label>
		<input type="password" id="pwd" name="pwd"> <br> <br>



        <input type="submit" name="submit" value="Submit"></fieldset>


    </form></body></html>