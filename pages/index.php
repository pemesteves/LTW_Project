<?php 
    include_once "../database/connection.php"; 
    include_once "../database/property.php"; 
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
        <header>
            <h1><a href="index.php"> RENTIFY </a></h1>
            <div id="signup">
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
            </div>
        </header>
        <nav id="menu">  
            <ul>
              <li><a href="#">About</a></li>
              <li><a href="#">Contacts</a></li>
            </ul>
        </nav> 
        <section id="search_bar">
            <h1>Find the perfect place</h1>
            <div class="height_crop">
                <img src="../images/main_page.jpg" alt="Main Page Image"/>
            </div>
            <form id="search_form" action="search_page.php" method="post"> 
                <div class="search_box">
                    <input class="location" name="location" type="text" placeholder="Where to?"/>
                    <input class="date" name="start_date" type="date" value="2019-11-13" min="2019-11-13">
                    <input class="date" name="end_date" type="date" value="2019-11-14" min="2019-11-14">
                    <button class="search_button" type="submit">Search</button>
                </div>
            </form>
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