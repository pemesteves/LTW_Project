<?php
    include_once "../templates/tpl_common.php";

    document_main_part();
?>
    <link rel="stylesheet" type="text/css" href="../css/search_bar.css">
    <link rel="stylesheet" type="text/css" href="../css/account_layout.css">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
</head>
<body>
    <header>
        <h1><a href="index.php"> RENTIFY </a></h1>
    </header>
    
    <?php draw_body_menu(); ?>

    <section id="main_account">
        <section id="account">
            <h2>Register</h2>
            <form id="account_form">
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
                    
                    <div class="link_to">
                        <p>Already have an account? Sign in <a href="login.php">here</a></p> 
                    </div>
                </div>
            </form>
        </section>
    </section>
</body>
</html>      
