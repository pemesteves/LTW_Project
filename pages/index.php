<?php 
    include_once "../database/connection.php"; 
    include_once "../database/property.php"; 
    include_once "../templates/tpl_common.php";
    include_once "../templates/tpl_scroll_top.php";

    document_main_part();
    include_scroll_top();
?>
        <link href="../css/main_page.css" rel="stylesheet">
        <link href="../css/search_bar.css" rel="stylesheet">
     </head>
    <body> 
        <?php
            draw_body_header();
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
                    <a class="recommmended_link" href="property_page.php?property=<?=$recommendedArticle['id']?>">
                        <article>
                            <div class="height_crop">
                                <img src="../images/<?=$recommendedArticle['image'] ?>" alt="<?=$recommendedArticle['image'] ?>"/>
                            </div>
                            <div class="info">
                                <h3><?=$recommendedArticle['title'] ?></h3>
                                <p>Sleeps: <?=$recommendedArticle['sleeps'] ?></p>
                                <p>Price per day: <?=$recommendedArticle['price_per_day'] ?>$</p>
                            </div>                                                
                        </article>
                    </a>
                </li>
            <?php } 
            }catch(Exception $e){
            ?>
                <p>Can't find recommended houses!</p>
            <?php 
            }
            ?>
            </ul>
        </section>
        <section id="rent_new_houses">
            <h2>Rentify your property here</h2>
            <div class="height_crop">
                <img src="../images/main_paradise.jpg" alt="Main Page Rntify Image"/>
            </div>
            <?php 
                if (isset($_SESSION['username'])) {
            ?>
            <form id="rentify_form" action="add_properties.php"> 
            <?php
                }
                else {
            ?>
                <form id="rentify_form" action="login.php">
            <?php
                }
            ?>
                <div class="rentify_box">
                    <button class="rentify_button" type="submit">Rentify</button>
                </div>
            </form>
        </section>
<?php
    draw_footer(true);
?>