<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rentify</title>
    <link rel="icon" href="../Images/icon.png">
    <link rel="stylesheet" type="text/css" href="../Styles/layout.css">
    <link rel="stylesheet" type="text/css" href="../Styles/style.css">
    <link rel="stylesheet" type="text/css" href="../Styles/search_bar.css">
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

    <section id="register">
        <h2>Register</h2>
        <form id="register_form">
            <div class="register_box">
                <label for="username">Username:</label>
                <input name="username" type="text" placeholder="Username"/>
                
                <label for="email">Email:</label>
                <input name="email" type="email" placeholder="Email"/>
                
                <label for="first_name">First Name:</label>
                <input name="first_name" type="text" placeholder="First Name"/>
                
                <label for="last_name">Last Name:</label>
                <input name="last_name" type="text" placeholder="Last Name"/>
                
                <label for="phone">Phone Number:</label>
                <input name="phone" type="tel" placeholder="Phone Number"/>
                
                <label for="birthdate">Birthdate:</label>
                <input name="birthdate" type="date" placeholder="Birth Date"/>
                
                <label for="password">Password:</label>
                <input name="password" type="password" placeholder="Password"/>
                
                <input type="Submit" value="Register">
            </div>
        </form>
    </section>

</body>
</html>      
