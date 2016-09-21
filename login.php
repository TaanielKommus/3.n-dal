<?php

//var_dump($_GET);

//echo "<br>";

//var_dump($_POST);

	$signupEmailError = "*";

	// kas keegi vajutas nuppu ja see on olemas

	if (isset ($_POST["signupEmail"])) {

		//on olemas
		// kas epost on tühi

		if (empty ($_POST["signupEmail"])) {

			// on tühi
			$signupEmailError = "Väli on kohustuslik";

		}

	}

	$signupPasswordError = "*";


	if (isset ($_POST["signupPassword"])) {


		if (empty ($_POST["signupPassword"])) {

			$signupPasswordError = "Väli on kohustuslik";

		} else {

			//parool ei olnud tyhi

			if( strlen($_POST["signupPassword"]) < 8 ) {

				$signupPasswordError = "* Parool peab olema vähemalt 8 tähemärki pikk";
			}
		}

	}

	$firstnameError = "*";

	if (isset ($_POST["firstname"])) {


		if (empty ($_POST["firstname"])) {

			$firstnameError = "Väli on kohustuslik";

		}

	}

	$lastnameError = "*";


	if (isset ($_POST["lastname"])) {


		if (empty ($_POST["lastname"])) {

			$lastnameError = "Väli on kohustuslik";

		}

	}

	$genderError = "*";

	if (isset ($_POST["gender"])) {


		if (empty ($_POST["gender"])) {
// Ei toimi nii nagu vaja! Help needed!
			$genderError = "- Valik on kohustuslik";

		}

  }


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise leht</title>
	</head>
	<body>

		<h1>Logi sisse</h1>

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
			<input name="signupEmail" type="email"> <?php echo $signupEmailError; ?>

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
			<input name="gender" type="radio" value="male"> Mees <br>
			<input name="gender" type="radio" value="female"> Naine<br>

			<br><br>

			<label> Eriala</label><br>
			<input name="profession" type="text">

			<br><br>

			<label> Hobid</label><br>
			<input name="hobbies" type="text">

			<br><br>

			<input type="submit" value="Loo kasutaja">


		</form>

<br><br><br>
MVP Idee
<br><br>
Nn internetiraadio, mis mängib 24/7 igasugust muusikat. Otsene "kvaliteedikontroll"
algselt (?) puuduks, mis võimaldaks ka vähetuntud ja muidu sahtlisse kirjutavatel artistidel
oma loomingut esitleda. Sisuliselt oleks tegemist kohaga, kus noored/vanad/uued/tuntud artistid saaksid oma
loomingut tasuta jagada ja kust entusiastlikumad melomaanid leiaksid potentsiaalselt uut ja põnevat muusikat.
Raadio formaat garanteerib artistile, et tema teos mingil hetkel 24h tunni jooksul kindlasti mängib.
Puuduks DJ - selle asemel on random playlist, mille infot (kes mängib millal jne)saaks näha netist/appist vms.
Mõned mõtted on veel, aga neid veel ei avalada :).

	</body>
</html>
