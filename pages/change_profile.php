<?php
    include_once "../database/connection.php"; 
    include_once "../database/user.php";
    include_once "../templates/tpl_common.php";
    include_once "../templates/tpl_account.php";
    
    /**
     * TODO CHANGE THE USERNAME AND PASSWORD 
     */
    $username = 'miguel_pinto_69';
    $password_hash = 12345;

    $user_info = getUserInfo($username, $password_hash);

    document_main_part();
?>  
        <link href="../css/change_profile.css" rel="stylesheet">
    </head>
    <body>
        <?php
            draw_website_name();
            draw_body_menu();
        ?>
        <form id="update_profile_form" action="../actions/action_update_profile.php" method="post">
            <section id="user_info">
                <img src="../images/<?=$user_info['image_name']?>"/>
                <h2><input type="text" name="full_name" value=<?=$user_info['full_name']?> placeholder=<?=$user_info['full_name']?>/></h2>
                <h3>(<?=$user_info['username']?>)</h3>
                <p>Email: <input type="email" name="email" value="<?=$user_info['email']?>" placeholder="<?=$user_info['email']?>"/></p>
                <p>Phone Number: <input type="tel" name="phone" value="<?=$user_info['phone']?>" placeholder="<?=$user_info['phone']?>"/></p>
                <p>Birthdate: <input type="date" name="birthdate" value="<?=$user_info['birthdate']?>" placeholder="<?=$user_info['birthdate']?>"/></p>
            </section>
            <input class="account_button" type="Submit" value="Update Profile"> 
        </form>
    </body>
</html>