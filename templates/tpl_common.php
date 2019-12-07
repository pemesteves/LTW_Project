<?php 
function draw_body_header(){
?>
    <header>
        <h1><a href="index.php"> RENTIFY </a></h1>
        <div id="signup">
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        </div>
    </header>
<?php
}

function draw_website_name(){
?>
    <header>
        <h1><a href="index.php"> RENTIFY </a></h1>
    </header>
<?php
}

function draw_body_menu(){
?>
    <nav id="menu">  
        <ul>
            <li><a href="../pages/about.php">About</a></li>
            <li><a href="#">Contacts</a></li>
        </ul>
    </nav>
<?php
}

function draw_search_bar(){
?>
    <form id="search_form" action="search_page.php" method="post"> 
        <div class="search_box">
            <input class="location" name="location" type="text" placeholder="Where to?"/>
            <input class="date" name="start_date" type="date" value="2019-11-13" min="2019-11-13">
            <input class="date" name="end_date" type="date" value="2019-11-14" min="2019-11-14">
            <button class="search_button" type="submit">Search</button>
        </div>
    </form>
<?php
}

function document_main_part(){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Rentify</title>
        <meta name="keywords" content="unicode emoji characters, utf-8">
        <link rel="icon" href="../images/icon.png">
        <link href="../css/layout.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
<?php    
}
?>