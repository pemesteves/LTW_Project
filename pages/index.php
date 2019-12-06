<?php 
    include_once "../database/connection.php"; 
    include_once "../database/property.php"; 
    include_once "../templates/tpl_common.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Rentify</title>
        <meta name="keywords" content="unicode emoji characters, utf-8">
        <link rel="icon" href="../images/icon.png">
        <link href="../css/main_page.css" rel="stylesheet">
        <link href="../css/search_bar.css" rel="stylesheet">
        <link href="../css/layout.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body> 
        <?php
            draw_body_header();
            draw_body_menu();
        ?>

        <section id="search_bar">
            <h1>Find the perfect place</h1>
            <div class="height_crop">
                <img src="../images/main_page.jpg" alt="Main Page Image"/>
            </div>
            <?php draw_search_bar(); ?>
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
                            <img src="../images/<?=$recommendedArticle['image'] ?>" alt="<?=$recommendedArticle['image'] ?>"/>
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
                <img src="../images/main_paradise.jpg" alt="Main Page Rntify Image"/>
            </div>
            <div class="rentify_box">
                <button class="rentify_button" type="submit">Rentify</button>
            </div>
        </section>
    </body>
</html>