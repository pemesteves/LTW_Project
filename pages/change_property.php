<?php 
    include_once "../templates/tpl_common.php";
    include_once "../database/connection.php";
    include_once "../database/property.php";
    include_once "../templates/tpl_scroll_top.php";
    
    $property_id = $_GET['property'];

    if(!isset($_SESSION['username'])){
        header('Location: property_page.php?property='.$property_id);
        die('Users must be logged in to change their properties');
    }
    
    try{
        $property_info = getPropertyInfo($property_id);
    }catch(PDOException $e){
        die($e->getMessage());
    }
    
    if($property_info['owner_username'] !== $_SESSION['username']){ 
        header('Location: property_page.php?property='.$property_id);
        die('Only the owner can change its properties.');
    }

        if(isset($_SESSION['property_id'])){
            unset($_SESSION['property_id']);
        }

        $_SESSION['property_id'] = $property_id;

    document_main_part();
    include_scroll_top();
?>
        <link href="../css/property_page.css" rel="stylesheet"/>
        <link href="../css/search_bar.css" rel="stylesheet"/>
        <script src="../js/slideshow.js" async></script>
    </head>
    <body>
        <?php draw_body_header(); ?>
        <form action="../actions/action_edit_property.php" method="post">
            <section id="main">
            <?php 
                if($property_info != null){
                    try{
                        $property_images = getPropertyImages($property_id);
                        $property_commodities = getCommodities($property_id); 
                    
                    ?>
                <article id="property">
                    <div id="slideshow" >
                        <div class="slideshow-container">
                        <?php foreach($property_images as $image){?>
                            <div class="mySlides">
                                <img src="../images/<?=$image['image']?>" alt="<?=$image['image']?>"/>
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
                    </div>
                    <div id="main_info">
                        <h2><input type="text" name="title" value="<?=$property_info['title']?>" placeholder="<?=$property_info['title']?>" required/></h2>
                        <div id="description">
                            <h3>Description</h3>
                            <p><input type="text" name="description" value="<?=$property_info['description']?>" placeholder="<?=$property_info['description']?>" required/></p>
                        </div>
                    </div>
                    <div id="comodities">
                        <h3>Commodities</h3>
                        <ul>
                        <?php  
                            foreach($property_commodities as $commodity) {
                        ?>
                            <li><p><?=$commodity['commodity']?></p></li>
                        <?php
                            }
                        ?>
                            <li><input type="text" name="commodity" placeholder="New commodity"/></li>
                        </ul>
                    </div>
                    <div id="reservation_info">
                        <div id="price">
                            <h3>Price per night:</h3>
                            <p><input type="number" name="price_per_day" value="<?=$property_info['price_per_day']?>" placeholder="<?=$property_info['price_per_day']?>" required/>$</p>
                        </div>
                        <a id="change_property_link" href="change_property.php?property=<?=$property_id?>">
                            <input type="submit" value="Edit Property"/>
                        </a>
                    </div>
                </article>
                    <?php 
                    }catch(Exception $e){ 
                    ?>
                        <p>Can't find property information!</p>
                    <?php    
                    }
                }else{ //If the property does not exist
                    draw_not_found_message('Property not found!');
                }
                ?>
            </section>
        </form>
<?php
    draw_footer(true);
?>