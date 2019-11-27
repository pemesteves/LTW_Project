<?php 
    include_once "../Database/connection.db";
?>
<!DOCTYPE html>
<html language="en">
    <head>
        <title>Property</title>
        <meta charset="utf-8">
        <link rel="icon" href="../Images/icon.png">
        <link href="property_page.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="../Images/icon.png" alt="Icon" width="100" height="100">
            <h1>RENTIFY</h1>
            <div id="signup">
                <a href="register.html">Register</a>
                <a href="login.html">Login</a>
            </div>
        </header>
        <nav id="menu">  
            <ul>
              <li><a href="nothing.html">Home</a></li>
              <li><a href="nothing.html">About</a></li>
              <li><a href="nothing.html">Language</a></li>
              <li><a href="nothing.html">Contacts</a></li>
            </ul>
        </nav> 
        <section id="main">
            <h2>Property Name</h2>
            <article id="Images">
                <img src="../Images/p_house1.jpg" alt="House 1" >
                <img src="../Images/p_house2.jpg" alt="House 2" >
                <img src="../Images/p_house3.jpg" alt="House 3" >
            </article>
            <article id="description">
                <h3>Description</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut ante sit amet nisi rhoncus blandit. Donec tempus, dui eu tristique sollicitudin, nulla enim congue tortor, sit amet posuere ipsum tellus et tortor. Nunc dignissim, ligula in vehicula placerat, lacus mauris fringilla leo, vel mollis mi est et mauris. Curabitur a ante dui. Nam pulvinar, nulla nec euismod facilisis, nisl sem efficitur sem, sit amet hendrerit ex lectus ut dolor. Proin id pellentesque nunc, in faucibus magna. Ut molestie turpis arcu, quis porta nibh dapibus non. Maecenas ut fringilla arcu, sed fermentum nisi. Fusce tempus nisl sit amet magna varius, eu porta nibh rutrum. Phasellus convallis orci a urna congue, eu laoreet tortor ultrices. Praesent at nisl sem. Duis vitae massa felis.
                </p>
            </article>
            <article id="comodities">
                <h3>Comodities</h3>
                <ul>
                    <li><a>Wifi</a></li>
                    <li><a>Cable TV</a></li>
                </ul>
            </article>
            <article id="price">
                <h3>Price</h3>
                <p>
                    3000€
                </p>
            </article>
            <article id="dates">
                <form>
                    <legend>Dates</legend>
                    <input type="date" name="start_date" value="2019-11-13" min="2019-11-13"> <!-- Change start date to today with JS -->
                    <input type="date" name="end_date" value="2019-11-13" min="2019-11-14"> <!-- Check if end date is after start date -->
                </form>
            </article>
        </section>
    </body>
</html>