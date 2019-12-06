<?php
    include_once "../templates/tpl_common.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rentify</title>
    <link rel="icon" href="../images/icon.png">
    <link rel="stylesheet" type="text/css" href="../css/layout.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/search_bar.css">
    <link rel="stylesheet" type="text/css" href="../css/account_layout.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <meta name="keywords" content="unicode emoji characters, utf-8">
</head>
<body>
    <header>
        <h1><a href="index.php"> RENTIFY </a></h1>
    </header>

    <?php draw_body_menu(); ?>
    
    <section id="main_account">
        <section id="account">
            <h2>Login</h2>
            <form id="account_form">
                <div class="account_box">
                    <div class="username">
                        <label for="username">Username:</label>
                        <input name="username" type="text" placeholder="Username"/>
                    </div>
                    <div class="password">
                        <label for="password">Password:</label>
                        <input name="password" type="password" placeholder="Password"/>
                    </div>
                    <input class="account_button" type="Submit" value="Login">
                    <div class="sign_up">
                        <p>Don't have an account? Sign up <a href="register.php">here</a></p> 
                    </div>
                </div>
            </form>
        </section>
    </section>

</body>
</html>      
