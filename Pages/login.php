<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Rentify</title>
    <link rel="icon" href="../Images/icon.png">
    <link rel="stylesheet" type="text/css" href="../Styles/layout.css">
    <link rel="stylesheet" type="text/css" href="../Styles/style.css">
    <link rel="stylesheet" type="text/css" href="../Styles/search_bar.css">
    <link rel="stylesheet" type="text/css" href="../Styles/account_layout.css">
    <meta name="keywords" content="unicode emoji characters, utf-8">
</head>
<body>
    <header>
        <h1> RENTIFY </h1>
    </header>
    <nav id="menu">  
        <ul>
          <li><a href="#">About</a></li>
          <li><a href="#">Language</a></li>
          <li><a href="#">Contacts</a></li>
        </ul>
    </nav> 
    
    <section id="main_account">
        <section id="search_bar">
            <form id="search_form" action="search_page.php" method="post"> 
                <div class="search_box">
                    <input class="location" name="location" type="text" placeholder="Where to?"/>
                    <input class="date" name="start_date" type="date" value="2019-11-13" min="2019-11-13">
                    <input class="date" name="end_date" type="date" value="2019-11-14" min="2019-11-14">
                    <button class="search_button" type="submit">Search</button>
                </div>
            </form>
        </section>

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
                </div>
            </form>
        </section>
    </section>

</body>
</html>      
