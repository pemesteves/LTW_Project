<?php
    include_once "../includes/init.php";

    function getCommodityID($commodity){
        global $db;

        $stmt = $db->prepare('
            SELECT id 
            FROM Commodity
            WHERE description = ?
        ');

        $stmt->execute(array($commodity));

        $commodityID = $stmt->fetch();
        
        return $commodityID;
    }
    
    function addPropertyCommodity($property_id, $commodityID){
        global $db;

        $stmt = $db->prepare('
            INSERT INTO PropertyCommodity
                (property_id, commodity_id)
            VALUES
                (?, ?)
        ');
        
        $stmt->execute(array($property_id, $commodityID));
    }

    header('Location: ../pages/index.php');
?>