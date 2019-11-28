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
        <header>
            <h1> RENTIFY </h1>
            <div id="signup">
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
            </div>
        </header>
        <nav id="menu">  
            <ul>
              <li><a href="#">About</a></li>
              <li><a href="#">Language</a></li>
              <li><a href="#">Contacts</a></li>
            </ul>
        </nav> 
        <section id="search_bar">
            <h1>Find the perfect place</h1>
            <img src="../Images/main_page.jpg" alt="Main Page Image"/>
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
            <?php $recommended = getRecommended(); 
            foreach($recommended as $recommendedArticle){
                ?>
                <li>
                    <article>
                        <h3><?=$recommendedArticle['title'] ?></h3>
                        <img src="../Images/<?=$recommendedArticle['image'] ?>" alt="<?=$recommendedArticle['image'] ?>"/>
                        <p><?=$recommendedArticle['description'] ?></p>                                                
                    </article>
                </li>
            <?php } ?>
            </ul>
        </section>
    </body>
</html>