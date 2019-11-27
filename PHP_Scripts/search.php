<?php
    include_once "../Database/connection.php";

    function getSearch($location){
        global $db;
		$stmt = $db->prepare('
			SELECT *
			FROM Property
			WHERE location = ?');
		$stmt->execute(array($location));
        
        $articles = $stmt->fetchAll();
		return $articles;
    }
?>