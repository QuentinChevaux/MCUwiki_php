<?php

	session_start();	

	if(!isset($_SESSION['admin'])){

		header('Location: .');

	}

	if(isset($_SESSION['admin'])) {

		if(isset($_POST['update'])) {
			
			$connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');

			$request = $connexion_bdd -> prepare('SELECT * FROM film');

			$update = $connexion_bdd -> prepare('UPDATE film SET streaming = ? WHERE tmdb = ?');

			$request -> execute();

			$result = $request -> fetchAll();

			foreach($result as $res) {

												// CURL

				$curl = curl_init();

				curl_setopt_array($curl, [
					CURLOPT_URL => "https://streaming-availability.p.rapidapi.com/get/basic?country=fr&tmdb_id=movie%2F". $res['tmdb'] . "&output_language=en",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "GET",
					CURLOPT_HTTPHEADER => [
						"x-rapidapi-host: streaming-availability.p.rapidapi.com",
						"x-rapidapi-key: c259f58326msh81c225d8de2c3f6p17abf5jsn926f3db2d353"
					],
				]);

				$response = curl_exec($curl);
				$error = curl_error($curl);

				curl_close($curl);

				if ($error) {

					echo "cURL Error #:" . $error;

				} 
				
				else {

					if (preg_match("/disney/", $response, $matches)) {

						echo 'Mis ' . $matches . ' dans ' . $res['titre'];

						$update -> execute([ $matches[0], $res['tmdb'] ]);

					} else if (preg_match("/netflix/", $response, $matches)) {

						echo 'Mis ' . $matches . ' dans ' . $res['titre'];

						$update -> execute([ $matches[0], $res['tmdb'] ]);

					} else if (preg_match("/prime/", $response, $matches)) {

						echo 'Mis ' . $matches . ' dans ' . $res['titre'];

						$update -> execute([ $matches[0], $res['tmdb'] ]);				

					} 
					
				}
			
			}

		}

	}

	include 'admin_header.php';

?>

<form action="" method="POST">

	<input type="submit" name="update" value="Update Database" />

</form>
