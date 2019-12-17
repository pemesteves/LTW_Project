<?php 

include_once "../includes/init.php";
include_once "../database/user.php";

function draw_user_image(){
    try{
        $image_name = getUserImagePath($_SESSION['username']);
    }catch(PDOException $e){
        catchException($e);
    }
    
    $image_path = "../images/".$image_name['image_name'];

    echo "<img src=".$image_path." alt=\"User's photo\" id=\"user_photo\">";
}

function draw_body_header(){
    draw_header('user.php', 'Profile');
}

function draw_header($page, $name){
?>
    <header>
        <div id="fixed">
    <?php
    if(isset($_SESSION['username'])){
    ?>
      <script src="../js/dropdown.js" async></script>
    <?php
    }
    ?>
        <h1><a href="index.php"> Rentify </a></h1>

        <?php
        if(isset($_SESSION['username'])) {
        ?> 
            <div class="dropdown">

                <?php draw_user_image(); ?>
                <button  class="dropdown_button" id="user_badge" > <?php echo $_SESSION['username'] ?> </button>
                <div class="dropdown_content" id="user_badge_dropdown">
                    <a href="<?=$page?>"><?=$name?></a>
                    <a href="add_properties.php">Rentify property</a>
                    <a href="tourist_reservations.php">Requests</a>
                    <a href="../actions/action_logout.php">Log out</a>
                </div>
            </div>
        <?php
        }
        else {
        ?>        
            <div id="signup">
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
            </div>
        <?php
        }
        ?>
        </div>
    </header>
<?php
}

function draw_website_name(){
?>
    <header>
        <div id="fixed">
            <h1><a href="index.php"> Rentify </a></h1>
        </div>
    </header>
<?php
}

function draw_search_bar(){
?>
    <form id="search_form" action="search_page.php" method="post"> 
        <div class="search_box">
            <input class="location" name="location" type="text" placeholder="Where to?"/>
            <input class="date" name="start_date" type="date" value="2019-11-13" min="2019-11-13" required/>
            <input class="date" name="end_date" type="date" value="2019-11-14" min="2019-11-14" required/>
            <input class="guests" name="guests" type="number" placeholder="Guests" min="1"/>
            <input class="search_button" type="submit" value="Search"/>
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
        <meta name="keywords" content="unicode emoji characters, utf-8"/>
        <link rel="icon" href="../images/icon.png"/>
        <link href="../css/layout.css" rel="stylesheet"/>
        <link href="../css/style.css" rel="stylesheet"/>
        <script src="../js/date.js" defer></script>
        <script src="../js/windowPosition.js" async></script>
<?php    
}

function draw_footer($include_button){
    if($include_button){
?>
        <button id="scrollTop" title="Go to top"><img src="../images/arrow.png"/></button>
<?php
    }
?>  
        <footer id="footer">
            <p><a href="../pages/index.php">Rentify™</a></p>
            <ul>
                <li><a href="../pages/about.php">About</a></li>
                <li><a href="../pages/contacts.php">Contacts</a></li>
            </ul>
        </footer>
    </body>
</html>
<?php
}

function draw_not_found_message($message){
?>
    <article id="not_found">
        <img src="../images/search.png" alt="Not found"/>
        <p><?=$message?></p> 
    </article>
<?php
}
?>