<?php
    include_once "../Database/connection.php";

    function getPropertyInfo($id){
        global $db;
        $stmt = $db->prepare('
            SELECT *
			FROM Property
            WHERE id = ?
        ');
		$stmt->execute(array($id));
        
        $propertyInfo = $stmt->fetchAll();
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
            SELECT Commodity.description as commodity
            FROM Property
            NATURAL JOIN (
                SELECT Commodity.description, PropertyCommodity.property_id as id
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
?>