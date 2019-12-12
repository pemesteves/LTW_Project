<?php
	include_once "../database/connection.php";
	include_once "reservations.php";

    // Property Extraction

    function getPropertyByLocation($location){
        global $db;
		$stmt = $db->prepare('
			SELECT Property.*, PropertyImage.image_name as image
			FROM Property
			JOIN PropertyImage 
            ON Property.id = PropertyImage.property_id'
        );
        $stmt->execute();
        $articles = $stmt->fetchAll();

		$location = preg_quote($location);
		$pattern = '#\b'.$location.'\b#i';
        $matches = [];
        $index = 0;
        foreach($articles as $article) {
            if (preg_match($pattern, $article['location'])) {
                $matches[$index] = $article;
                $index++;
            }
        }

		return $matches;
	} 
	
	function getPropertyByLocationBetweenDates($location, $start_date, $end_date){
        $properties = getPropertyByLocation($location);

		$matches = array();

		foreach ($properties as $property) {
			try{
				$reservations = getHouseReservationsBetweenDates($property['id'], $start_date, $end_date);
				if(count($reservations) == 0)
					array_push($matches, $property);
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}

		return $matches;
    } 
?>