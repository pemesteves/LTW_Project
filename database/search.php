<?php
    include_once "../database/connection.php";

    function getSearch($location){
        global $db;
		$stmt = $db->prepare('
			SELECT Property.*, PropertyImage.image_name as image
			FROM Property
			JOIN PropertyImage 
			ON Property.id = PropertyImage.property_id 
			WHERE location = ?');
		$stmt->execute(array($location));
        
        $articles = $stmt->fetchAll();
		return $articles;
    }
?>