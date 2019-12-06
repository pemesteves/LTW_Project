<?php 
    include_once "../Database/connection.php"; 
    include_once "../PHP_Scripts/recommended.php"; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Rentify</title>
        <meta name="keywords" content="unicode emoji characters, utf-8">
        <link rel="icon" href="../Images/icon.png">
        <link href="../Styles/main_page.css" rel="stylesheet">
        <link href="../Styles/search_bar.css" rel="stylesheet">
        <link href="../Styles/layout.css" rel="stylesheet">
        <link href="../Styles/style.css" rel="stylesheet">
    </head>
    <body> 
        <?php include ('templates/header.html') ?>
        <?php include ('templates/menu.html') ?>
        
        <section id="search_bar">
            <h1>Find the perfect place</h1>
            <div class="height_crop">
                <img src="../Images/main_page.jpg" alt="Main Page Image"/>
            </div>
            <?php include ('templates/search_bar.html') ?>
        </section>
        
        <section id="recommended">
            <h2>Recommended</h2>
            <ul>
            <?php 
            try{
                $recommended = getRecommended(); 
                foreach($recommended as $recommendedArticle){
            ?>
                <li>
                    <article>
                        <div class="height_crop">
                            <img src="../Images/<?=$recommendedArticle['image'] ?>" alt="<?=$recommendedArticle['image'] ?>"/>
                        </div>
                        <h3><?=$recommendedArticle['title'] ?></h3>
                        <p><?=$recommendedArticle['description'] ?></p>                                                
                    </article>
                </li>
            <?php } 
            }catch(Exception $e){
            ?>
                <p>Can't find recommended houses!</p>
            <?php }
            ?>
            </ul>
        </section>
        <section id="rent_new_houses">
            <h2>Rentify your property here</h2>
            <div class="height_crop">
                <img src="../Images/main_paradise.jpg" alt="Main Page Rntify Image"/>
            </div>
            <div class="rentify_box">
                <button class="rentify_button" type="submit">Rentify</button>
            </div>
        </section>
    </body>
</html>