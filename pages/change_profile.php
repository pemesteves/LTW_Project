<?php
    include_once "../includes/init.php";
    include_once "../database/user.php";
    include_once "../templates/tpl_common.php";
    include_once "../templates/tpl_account.php";
    
    $username = $_SESSION['username'];
    $password_hash = getUserPassword($username)['password'];

    $user_info = getUserInfo($username, $password_hash);
    
    if(isset($_SESSION['image_name']))
        $image_name = $_SESSION['image_name'];
    else
        $image_name = $user_info['image_name'];

    document_main_part();
?>  
        <link href="../css/change_profile.css" rel="stylesheet">
        <link href="../css/profile.css" rel="stylesheet">
    </head>
    <body>
        <?php
            draw_website_name();
            draw_body_menu();
        ?>
        
        <form id="upload_image_form" action="../actions/action_upload_image.php" method="post" enctype="multipart/form-data"> </form>
        <form id="update_profile_form" action="../actions/action_update_profile.php" method="post">
            <section id="user_info">
                <div id="fit_crop">
                    <img src="../images/<?=$image_name?>"/>
                </div>
                <p>Preferred size: 160px x 160px</p>
                <input type="file" name="fileToUpload" value="../images/<?=$image_name?>" id="fileToUpload" form="upload_image_form"/>
                <input type="hidden" name="image_name" value="<?=$image_name?>" />
                <input type="submit" value="Upload Image" form="upload_image_form"/> 
                <div id="headers">
                    <h2><input id="full_name" type="text" name="full_name" value="<?=$user_info['full_name']?>" placeholder="<?=$user_info['full_name']?>"/></h2>
                    <h3>(<?=$user_info['username']?>)</h3>
                </div>
                <p id="email">Email: <input type="email" name="email" value="<?=$user_info['email']?>" placeholder="<?=$user_info['email']?>"/></p>
                <p id="phone">Phone Number: <input type="tel" name="phone" value="<?=$user_info['phone']?>" placeholder="<?=$user_info['phone']?>"/></p>
                <p id="birthdate">Birthdate: <input type="date" name="birthdate" value="<?=$user_info['birthdate']?>" placeholder="<?=$user_info['birthdate']?>"/></p>
            </section>
            <input class="account_button" type="Submit" value="Update Profile"> 
        </form>
    </body>
</html>