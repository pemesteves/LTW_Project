<?php 
    include_once "../Database/connection.php";
    include_once "../PHP_Scripts/search.php";
    include_once "../PHP_Scripts/property.php";

    $property_id = $_GET['property'];
    $property_info = getPropertyInfo($property_id);
    $property_images = getPropertyImages($property_id);
    /*
        TODO: CORRIGIR QUERY
        $property_commodities = getCommodities($property_id); 
    */
?>
<!DOCTYPE html>
<html language="en">
    <head>
        <title>Property</title>
        <link rel="icon" href="../Images/icon.png">
        <link href="../Styles/style.css" rel="stylesheet">
        <link href="../Styles/property_page.css" rel="stylesheet">
        <link href="../Styles/layout.css" rel="stylesheet">
        <script src="../Scripts/slideshow.js" async></script>
        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <h1> RENTIFY </h1>
            <div id="signup">
                <a href="register.html">Register</a>
                <a href="login.html">Login</a>
            </div>
        </header>
        <nav id="menu">  
            <ul>
              <li><a href="#">About</a></li>
              <li><a href="#">Language</a></li>
              <li><a href="#">Contacts</a></li>
            </ul>
        </nav> 
        <section id="main">
            <section id="property">
                <article id="slideshow" >
                    <div class="slideshow-container">
                    <?php foreach($property_images as $image){
                            console.log($image);    
                    ?>
                        <div class="mySlides">
                            <img src="../Images/<?=$image?>" alt="<?=$image?>">
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
                    <?php foreach($property_commodities as $commodity){ ?>
                        <li><p><?=$commodity?></p></li>
                    <?php } ?>
                    </ul>
                </article>
                <article id="price">
                    <h3>Price</h3>
                    <p><?=<$property_info['price']?>$</p>
                </article>
                <article id="dates">
                    <form>
                        <legend>Dates</legend>
                        <input type="date" name="start_date" value="2019-11-13" min="2019-11-13"> <!-- Change start date to today with JS -->
                        <input type="date" name="end_date" value="2019-11-13" min="2019-11-14"> <!-- Check if end date is after start date -->
                    </form>
                </article>
            </section>
        </section>
    </body>
</html>