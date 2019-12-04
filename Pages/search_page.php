<?php
    include_once "../Database/connection.php";
    include_once "../PHP_Scripts/search.php";

    $location = $_POST['location'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date']; 
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Rentify</title>
    <link rel="icon" href="../Images/icon.png">
    <link rel="stylesheet" type="text/css" href="../Styles/layout.css">
    <link rel="stylesheet" type="text/css" href="../Styles/style.css">
    <link rel="stylesheet" type="text/css" href="../Styles/search_page.css">
    <link rel="stylesheet" type="text/css" href="../Styles/search_page_layout.css">
    <link rel="stylesheet" type="text/css" href="../Styles/search_bar.css">
    <meta name="keywords" content="unicode emoji characters, utf-8">
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
        <form id="search_form" action="search_page.php" method="post"> 
            <div class="search_box">
                <input class="location" name="location" type="text" placeholder="Where to?"/>
                <input class="date" name="start_date" type="date" value="2019-11-13" min="2019-11-13">
                <input class="date" name="end_date" type="date" value="2019-11-14" min="2019-11-14">
                <button class="search_button" type="submit">Search</button>
            </div>
        </form>
    </section>

    <section id="properties">
        <?php 
        $articles = getSearch($location);
        if(count($articles) == 0){
        ?>    
        <article id="not_found">
            <img src="../Images/search.png" alt="Not found"/>
            <p>No results were found for the specified search.</p> 
        </article>
        <?php
        }
        else{
        foreach($articles as $propertyArticle){
        ?>
        <a href="property_page.php?property=<?=$propertyArticle['id']?>">
            <article id="property">
                <img src="../Images/<?=$propertyArticle['image'] ?>" alt="<?=$propertyArticle['image']?>"/>
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
