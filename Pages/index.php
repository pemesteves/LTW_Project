<?php 
    include_once "../Database/connection.php"; 
    include_once "../PHP_Scripts/recommended.php"; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RENTIFY</title>
        <meta name="keywords" content="unicode emoji characters, utf-8">
        <link rel="icon" href="../Images/icon.png">
        <link href="../Styles/main_page.css" rel="stylesheet">
        <link href="../Styles/search_bar.css" rel="stylesheet">
        <link href="../Styles/layout.css" rel="stylesheet">
        <link href="../Styles/style.css" rel="stylesheet">
    </head>
    <body> 
        <header>
            <h1> Rentify </h1>
            <div id="signup">
                <a href="register.html">Register</a>
                <a href="login.html">Login</a>
            </div>
        </header>
        <section id="search_bar">
            <img src="../Images/main_page.jpg" alt="Main Page Image"/>
            <div>
                <form>
                    <input type="text" name="search_bar" placeholder="Search Bar" required>
                    <input type="date" name="start_date" value="2019-11-13" min="2019-11-13"> <!--CHANGE START DATE TO TODAY WITH JAVASCRIPT-->
                    <input type="date" name="end_date" value="2019-11-14" min="2019-11-14"> <!--END DATE MUST BE BIGGER THAN START DATE-->
                    <input type="submit" value="&#x1F50D;">
                </form>
            </div>
        </section>
        <section id="recommended">
            <h2>Recommended</h2>
            <ul>
            <?php $recommended = getRecommended(); 
            foreach($recommended as $recommendedArticle){
                ?>
                <li>
                    <article>
                        <h3><?php $recommendedArticle.title ?></h3>
                        <img src="../Images/<?php $recommendedArticle.image ?>" alt="<?php$recommendedArticle.image?>"/>
                        <p><?php $recommendedArticle.description ?></p>                                                
                    </article>
                </li>
            <?php } ?>
            </ul>
        </section>
    </body>
</html>