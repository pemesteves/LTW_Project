<?php 
    include_once "../templates/tpl_common.php";
    include_once "../database/connection.php";
    include_once "../database/property.php";
    include_once "../templates/tpl_scroll_top.php";
    
    document_main_part();
    include_scroll_top();
?>
        <link href="../css/property_page.css" rel="stylesheet">
        <script src="../js/slideshow.js" async></script>
    </head>
    <body>
        <?php draw_body_header(); ?>
        
        <section id="main">
        <?php 

            $property_id = $_GET['property'];
            try{
                $property_info = getPropertyInfo($property_id);
                $property_images = getPropertyImages($property_id);
                $property_commodities = getCommodities($property_id); 
            
            ?>
            <section id="property">
                <article id="slideshow" >
                    <div class="slideshow-container">
                    <?php foreach($property_images as $image){?>
                        <div class="mySlides">
                            <img src="../images/<?=$image['image']?>" alt="<?=$image['image']?>">
                        </div>
                    <?php } ?>                       
                        <a class="prev" >&#10094;</a>
                        <a class="next" >&#10095;</a>
                    </div>
                    
                    <div class="dots">
                    <?php foreach($property_images as $image){?>
                        <span class="dot"></span>
                    <?php } ?>
                    </div>
                </article>
                <h2><?=$property_info['title']?></h2>
                <article id="description">
                    <h3>Description</h3>
                    <p><?=$property_info['description']?></p>
                </article>
                <article id="comodities">
                    <h3>Commodities</h3>
                    <ul>
                    <?php  
                        foreach($property_commodities as $commodity) {
                    ?>
                        <li><p><?=$commodity['commodity']?></p></li>
                    <?php
                        }
                    ?>
                    </ul>
                </article>
                <article id="price">
                    <h3>Price</h3>
                    <p><?=$property_info['price_per_day']?>$</p>
                </article>
                <article id="dates">
                    <form method="post" action="../actions/action_booking.php">
                        <legend>Dates</legend>
                        <input type="hidden" name="id_property" value="<?=$property_id?>" />
                        <input type="date" name="start_date" value="2019-11-13" min="2019-11-13" /> <!-- Change start date to today with JS -->
                        <input type="date" name="end_date" value="2019-11-13" min="2019-11-14" /> <!-- Check if end date is after start date -->
                        <input type="number" name="sleeps" value="1" min="1" />
                        <input type="submit" value="Book Property"/>
                    </form>
                </article>
            </section>
            <?php 
            }catch(Exception $e){ 
            ?>
                <p>Can't find property information!</p>
            <?php    
            }
            ?>
            <section id="rating">
            <?php
                try{
                    $ratings = getPropertyRatings($property_id);
                    if(($num_ratings = count($ratings)) != 0){
                        $rating_sum = 0;
                        foreach($ratings as $rating){
                            $rating_sum += $rating['rating'];
                        }
                        $rating_sum /= $num_ratings;
            ?>
                <p>Rating: <?=$rating_sum?>/10</p>
            <?php
                    }else{
            ?>
                <p>Rating: No one has rated this property yet.</p>
            <?php
                    }
                }catch(PDOException $e){
                    die($e->getMessage());
                }
            ?>
            <!--RATING-->
            </section>
            <?php
            try{
                $comments = getPropertyComments($property_id);
            ?>
            <section id="comments">
                <h4>Comments</h4>
            <?php
                if(count($comments) != 0){
                    foreach ($comments as $comment) {
            ?>
                    <h5 id="tourist_name"><?=$comment['tourist']?></h4>
                    <p><?=$comment['comment']?></p>    
            <?php
                    }
                }else{
            ?>  
                    <p>There are no comments yet</p>
            <?php
                }
            }catch(PDOException $e){
                die($e->getMessage());
            }
            ?>
            </section>
        </section>
<?php
    draw_footer(true);
?>