<?php
    include_once "../database/connection.php";
    include_once "../database/property.php";
    include_once "../templates/tpl_common.php";

    $location = $_POST['location'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rentify</title>
    <link rel="icon" href="../images/icon.png">
    <link rel="stylesheet" type="text/css" href="../css/layout.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/search_page.css">
    <link rel="stylesheet" type="text/css" href="../css/search_bar.css">
    <meta name="keywords" content="unicode emoji characters, utf-8">
</head>
<body>
    <?php draw_body_header(); ?>
    <?php draw_body_menu(); ?>

    <section id="search_bar">
        <h1>Find the perfect place</h1>
        <?php draw_search_bar(); ?>
    </section>

    <section id="properties">
        <?php 
        $articles = getPropertyByLocation($location);
        if(count($articles) == 0){
        ?>    
        <article id="not_found">
            <img src="../images/search.png" alt="Not found"/>
            <p>No results were found for the specified search.</p> 
        </article>
        <?php
        }
        else{
        foreach($articles as $propertyArticle){
        ?>
        <a href="property_page.php?property=<?=$propertyArticle['id']?>">
            <article id="property">
                <img src="../images/<?=$propertyArticle['image'] ?>" alt="<?=$propertyArticle['image']?>"/>
                <h3><?=$propertyArticle['title']?></h3>
                <p id="short_description"><?=$propertyArticle['description']?></p>
            
                <p class="price"><?=$propertyArticle['price_per_day']?>$</p>

                <p id="sleeps"><?=$propertyArticle['sleeps']?></p>
            </article>
        </a>
        <?php } 
        }
        ?>
    </section>
</body>
</html>      
