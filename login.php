<?php

	
	require("functions.php");

	// kui on sisse loginud siis suunan data lehele
	if(isset($_SESSION["userId"])) {
		header("Location: data.php");
	}
//var_dump($_GET);

//echo "<br>";

//var_dump($_POST);

//Muutujad
	$signupEmailError = " ";
	$signupEmail = " ";

	//kas keegi vajutas nuppu ja see on olemas

	if (isset ($_POST["signupEmail"])) {

		//on olemas
		// kas epost on tühi
		if (empty ($_POST["signupEmail"])) {

			// on tühi
			$signupEmailError = "* Väli on kohustuslik!";

		} else {
			// email on olemas ja õige
			$signupEmail = $_POST["signupEmail"];

		}

	}

	$signupPasswordError = " ";


	if (isset ($_POST["signupPassword"])) {


		if (empty ($_POST["signupPassword"])) {

			$signupPasswordError = "* Väli on kohustuslik";

		} else {

			//parool ei olnud tyhi

			if( strlen($_POST["signupPassword"]) < 8 ) {

				$signupPasswordError = "* Parool peab olema vähemalt 8 tähemärki pikk";
			}
		}

	}

	$firstnameError = " ";

	if (isset ($_POST["firstname"])) {


		if (empty ($_POST["firstname"])) {

			$firstnameError = "* Väli on kohustuslik";

		}

	}

	$lastnameError = " ";


	if (isset ($_POST["lastname"])) {


		if (empty ($_POST["lastname"])) {

			$lastnameError = "* Väli on kohustuslik";

		}

	}

	//vaikimisi väärtus
	$gender = "";
	$genderError = "";

	if (isset ($_POST["gender"])) {
		if (empty ($_POST["gender"])) {
// IKKA EI TÖÖTA!!!
			$genderError = "* Valik on kohustuslik!";

		} else {
			$gender = $_POST["gender"];
		}

	}

	if ( $signupEmailError == " " &&
			 $signupPasswordError == " " &&
			 isset($_POST["signupEmail"]) &&
			 isset($_POST["signupPassword"])
	   ) {

		//vigu ei olnud, kõik on olemas
		echo "Salvestan...<br>";
		echo "email ".$signupEmail."<br>";
		echo "parool ".$_POST["signupPassword"]."<br>";

		$password = hash("sha512", $_POST["signupPassword"]);

		echo $password."<br>";

		signup($signupEmail, $password);


	}
	$notice = " ";
	//kas kasutaja tahab sisse logida
	if ( isset($_POST["loginEmail"]) &&
			isset($_POST["loginPassword"]) &&
			!empty($_POST["loginEmail"]) &&
			!empty($_POST["loginPassword"])

	) {

		$notice = login($_POST["loginEmail"], $_POST["loginPassword"]);
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise leht</title>
	</head>
	<body>

		<h1>Logi sisse</h1>
		<p style="color:red;"><?=$notice;?></p>
		<form method="POST" >

			<label> E-post</label><br>
			<input name="loginEmail" type="email">

			<br><br>
			<label> Parool</label><br>
			<input name="loginPassword" type="password">

			<br><br>

			<input type="submit" value="Logi sisse">

		</form>


		<h1>Loo uus kasutaja</h1>

		<form method="POST" >

			<label> E-post</label><br>
			<input name="signupEmail" type="email" value="<?=$signupEmail;?>"> <?php echo $signupEmailError; ?>

			<br><br>
			<label> Parool</label><br>
			<input name="signupPassword" type="password"> <?php echo $signupPasswordError; ?>

			<br><br>

			<label> Eesnimi</label><br>
			<input name="firstname" type="text"> <?php echo $firstnameError; ?>

			<br><br>

			<label> Perekonnanimi</label><br>
			<input name="lastname" type="text"> <?php echo $lastnameError; ?>

			<br><br>

			<label> Sünniaasta</label><br>
			<input name="byear" type="date">

			<br><br>

			<label> Sugu</label> <?php echo $genderError; ?> <br>

			<?php if ($gender == "male") { ?>
				<input type="radio" name="gender" value="male" checked> Male<br>
			<?php } else { ?>
				<input type="radio" name="gender" value="male" > Male<br>
			<?php } ?>

			<?php if ($gender == "female") { ?>
				<input type="radio" name="gender" value="female" checked> Female<br>
			<?php } else { ?>
				<input type="radio" name="gender" value="female" > Female<br>
			<?php } ?>

			<br><br>

			<label> Eriala</label><br>
			<input name="profession" type="text">

			<br><br>

			<label> Hobid</label><br>
			<input name="hobbies" type="text">

			<br><br>

			<input type="submit" value="Loo kasutaja">

			<br><br>

		</form>



	</body>
</html>
