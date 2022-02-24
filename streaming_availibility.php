<?php

	session_start();	

	if(!isset($_SESSION['admin'])){

		header('Location: .');

	}


	if(isset($_SESSION['admin'])) {

		include 'admin_header.php';

			// UPDATE MOVIE DATABASE WITH THE TMDB LINK + ADD STREAMING AVAILIBILITY + ADD LINK

?>

<form action="" method="POST" class="text-center mt-5">

	<input type="submit" name="update_movie" value="Update Movie Database" class="btn btn-primary w-25 fs-2 pt-4 pb-4 rounded" />

	<input type="submit" name="update_serie" value="Update Serie Database" class="btn btn-primary w-25 fs-2 pt-4 pb-4 rounded" />

</form>

<?php

		if(isset($_POST['update_movie'])) {
			
			$connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');

			$request = $connexion_bdd -> prepare('SELECT * FROM film');

			$update = $connexion_bdd -> prepare('UPDATE film SET streaming = ? WHERE tmdb = ?');

			$update_link = $connexion_bdd -> prepare('UPDATE film SET streaming_link = ? WHERE tmdb = ?');

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

						$update -> execute([ $matches[0], $res['tmdb'] ]);
						
						$response = explode('{', $response);
							
							$link = $response[6];
							
							$link = explode('"', $link);
							
							$update_link -> execute([ $link[3], $res['tmdb'] ]);
							
						echo 'Mis ' . $matches[0] . ' dans ' . $res['titre'] . 'avec le lien : ' . $link[3] . '<br />';

					} else if (preg_match("/netflix/", $response, $matches)) {

						$update -> execute([ $matches[0], $res['tmdb'] ]);
						
						$response = explode('{', $response);
							
							$link = $response[6];
							
							$link = explode('"', $link);
							
							$update_link -> execute([ $link[3], $res['tmdb'] ]);

						echo 'Mis ' . $matches[0] . ' dans ' . $res['titre'] . 'avec le lien : ' . $link[3] . '<br />';

					} else if (preg_match("/prime/", $response, $matches)) {

						$update -> execute([ $matches[0], $res['tmdb'] ]);
						
							$response = explode('{', $response);

							$link = $response[6];

							$link = explode('"', $link);

							$update_link -> execute([ $link[3], $res['tmdb'] ]);

						echo 'Mis ' . $matches[0] . ' dans ' . $res['titre'] . 'avec le lien : ' . $link[3] . '<br />';

					} 
					
				}
			
			}

		}

		// UPDATE SERIE DATABASE WITH THE TMDB LINK + ADD LINK

		if(isset($_POST['update_serie'])) {
			
			$connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');

			$request = $connexion_bdd -> prepare('SELECT * FROM serie');

			$update = $connexion_bdd -> prepare('UPDATE serie SET streaming_link = ? WHERE tmdb = ?');

			$request -> execute();

			$result = $request -> fetchAll();

			foreach($result as $res) {

												// CURL

				$curl = curl_init();

				curl_setopt_array($curl, [
					CURLOPT_URL => "https://streaming-availability.p.rapidapi.com/get/basic?country=fr&tmdb_id=tv%2F" . $res['tmdb'] . "&output_language=en",
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

					$response = explode('{', $response);

					$link = $response[6];

					// echo $link . '<br />';

					$link = explode('"', $link);

					// echo $link[3];

					if($link) {

						echo 'Mis : ' . $link[3] . ' dans ' . $res['titre'] . '<br />';

						$update -> execute([ $link[3], $res['tmdb'] ]);

					}

				}
			
			}

		}

	}

?>