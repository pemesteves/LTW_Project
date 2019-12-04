<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rentify</title>
    <link rel="icon" href="../Images/icon.png">
    <link rel="stylesheet" type="text/css" href="../Styles/layout.css">
    <link rel="stylesheet" type="text/css" href="../Styles/style.css">
    <link rel="stylesheet" type="text/css" href="../Styles/search_bar.css">
    <link rel="stylesheet" type="text/css" href="../Styles/account_layout.css">
    <link rel="stylesheet" type="text/css" href="../Styles/register.css">
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
            <h2>Register</h2>
            <form id="register_form">
                <div class="account_box">
                    <div class="username">
                        <label for="username">Username:</label>
                        <input name="username" type="text" placeholder="Username"/>
                    </div>
                    <div class="email">
                        <label for="email">Email:</label>
                        <input name="email" type="email" placeholder="Email"/>
                    </div>
                    <div class="first_name">
                        <label for="first_name">First Name:</label>
                        <input name="first_name" type="text" placeholder="First Name"/>
                    </div>
                    <div class="last_name">
                        <label for="last_name">Last Name:</label>
                        <input name="last_name" type="text" placeholder="Last Name"/>
                    </div>
                    <div class="phone">
                        <label for="phone">Phone Number:</label>
                        <input name="phone" type="tel" placeholder="Phone Number"/>
                    </div>
                    <div class="birthdate">
                        <label for="birthdate">Birthdate:</label>
                        <input name="birthdate" type="date" placeholder="Birth Date"/>
                    </div>
                    <div class="password">
                        <label for="password">Password:</label>
                        <input name="password" type="password" placeholder="Password"/>
                    </div>
                    <input class="account_button" type="Submit" value="Register">
                </div>
            </form>
        </section>
    </section>
</body>
</html>      
