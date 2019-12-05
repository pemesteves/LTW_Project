<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rentify</title>
    <link rel="icon" href="../Images/icon.png">
    <link rel="stylesheet" type="text/css" href="../Styles/layout.css">
    <link rel="stylesheet" type="text/css" href="../Styles/style.css">
    <link rel="stylesheet" type="text/css" href="../Styles/search_bar.css">
    <link rel="stylesheet" type="text/css" href="../Styles/account_layout.css">
    <link rel="stylesheet" type="text/css" href="../Styles/login.css">
    <meta name="keywords" content="unicode emoji characters, utf-8">
</head>
<body>
    <header>
        <h1><a href="index.php"> RENTIFY </a></h1>
    </header>
    <nav id="menu">  
        <ul>
          <li><a href="#">About</a></li>
          <li><a href="#">Contacts</a></li>
        </ul>
    </nav> 
    
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
