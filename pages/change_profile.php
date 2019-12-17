<?php
    include_once "../includes/init.php";
    include_once "../database/user.php";
    include_once "../templates/tpl_common.php";
    include_once "../templates/tpl_account.php";
    include_once "../templates/tpl_upload_image.php";
    
    if(!isset($_SESSION['username'])){
        header('Location: ../pages/login.php');
        die();
    }

    $username = $_SESSION['username'];
    
    try{
        $password_hash = getUserPassword($username)['password'];
        $user_info = getUserInfo($username, $password_hash);
    }catch(PDOException $e){
        catchException($e);
    }
    
    if(isset($_SESSION['image_name']))
        $image_name = $_SESSION['image_name'];
    else
        $image_name = $user_info['image_name'];

    document_main_part();
?>  
        <link href="../css/change_profile.css" rel="stylesheet">
        <link href="../css/profile.css" rel="stylesheet">
        <script src="../js/upload_image.js" defer></script>
        <script src="../js/resizable_input.js" defer></script>
    </head>
    <body>
        <?php
            draw_body_header();
            upload_image($image_name, 'profile');
        ?>
        <form id="update_profile_form" action="../actions/action_update_profile.php" method="post">
            <section id="user_info">
                <div id="fit_crop">
                    <img src="../images/<?=$image_name?>"/>
                    <input type="hidden" name="image_name" value="<?=$image_name?>"/>
                    <p>Preferred size: 160px x 160px</p>
                </div>
                <div id="headers">
                    <h2><?php draw_input_id('full_name', 'text', 'full_name', $user_info['full_name'], $user_info['full_name'], true);?></h2>
                    <h3>(<?php draw_input_id('username', 'text', 'username', $user_info['username'], $user_info['username'], true);?>)</h3>
                </div>
                <p id="email">Email: <?php draw_input('email', 'email', $user_info['email'], $user_info['email'], true);?></p>
                <p id="phone">Phone Number: <?php draw_input('tel', 'phone', $user_info['phone'], $user_info['phone'], true);?></p>
                <p id="birthdate">Birthdate:  <?php draw_input('date', 'birthdate', $user_info['birthdate'], $user_info['birthdate'], true);?></p>
                <div id ="pass_info">
                    <input id="password" type="password" name="old_password" placeholder="Current Password"/>
                    <input id="password" type="password" name="new_password" placeholder="New Password"/>
                    <input id="password" type="password" name="confirm_password" placeholder="Confirm Password"/>
                </div>
                <input class="account_button" type="Submit" value="Update Profile">
            </section> 
        </form>
<?php
    draw_footer(false);
?>