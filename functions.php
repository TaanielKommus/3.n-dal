<?php
      $database = "if16_taankomm";
      //functions.php

        function signup($email, $password) {

          //loon yhenduse

      		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"],
      		$GLOBALS["database"]);

      		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUES (?, ?)");

      		//asendan kysim2rgid
      		//iga m2rgi kohta tuleb lisada yks t2ht - mis tyypi muutuja on
      		//s - string
      		//i - int
      		//d - double
      		$stmt->bind_param("ss", $email, $password);

      		if ($stmt->execute()) {
      			echo "õnnestus";
      		} else {
      			echo "ERROR ".$stmt->error;

      		}

        }









      /*function hello($firstname, $lastname) {

        return "Tere tulemast ".ucfirst($firstname)." ".ucfirst($lastname)."!";

      }

      echo hello("taaniel", "kõmmus");

      echo "<br>";
      */

 ?>
