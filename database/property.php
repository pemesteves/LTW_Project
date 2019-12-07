<?php
    include_once "../database/connection.php";

    // Property Information

    function getPropertyInfo($id){
        global $db;
        $stmt = $db->prepare('
            SELECT *
			FROM Property
            WHERE id = ?
        ');
		$stmt->execute(array($id));
        
        $propertyInfo = $stmt->fetch();
		return $propertyInfo;
    }

    function getPropertyImages($id){
        global $db;
        $stmt = $db->prepare('
            SELECT PropertyImage.image_name as image
            FROM Property
            JOIN PropertyImage
            ON Property.id = PropertyImage.property_id
            WHERE Property.id = ?
        ');
        $stmt->execute(array($id));

        $propertyImages = $stmt->fetchAll();
        return $propertyImages;
    }

    function getCommodities($id){
        global $db;
        $stmt = $db->prepare('
            SELECT commodity
            FROM Property
            NATURAL JOIN (
                SELECT Commodity.description as commodity, PropertyCommodity.property_id as id
                FROM PropertyCommodity
                JOIN Commodity
                ON PropertyCommodity.commodity_id = Commodity.id
            )
            WHERE Property.id = ?
        ');
        $stmt->execute(array($id));

        $propertyCommodities = $stmt->fetchAll();
        return $propertyCommodities;
    }


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


        $pattern = '/\b'.$location.'\b/i';
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

    function getUserProperties($username){
        global $db;
        $stmt = $db->prepare('
            SELECT Property.id as id
            FROM Property
            WHERE owner_username = ?
        ');
        $stmt->execute(array($username));
        return $stmt->fetchAll();
    }
?>