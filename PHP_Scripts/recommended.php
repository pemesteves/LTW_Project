<?php
    include_once "../Database/connection.php";

    function getRecommended(){
        global $db;
		$stmt = $db->prepare('
			SELECT Property.title as title, Property.description as description, 
				   PropertyImage.image_name as image, (
				SELECT avg(price_per_day)
				FROM Property
			) as avgPrice
			FROM Property     
			JOIN PropertyImage 
			ON Property.id = PropertyImage.property_id 
			GROUP BY id
			ORDER BY abs(price_per_day - avgPrice) DESC LIMIT 3
	 	');
		$stmt->execute();
		$recommended = $stmt->fetchAll();
		return $recommended;
    }
?>