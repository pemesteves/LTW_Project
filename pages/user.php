<?php
    include_once "../database/connection.php"; 
    include_once "../database/property.php"; 
    include_once "../database/user.php";
    include_once "../database/reservations.php";
    include_once "../templates/tpl_common.php";
    
    /**
     * TODO CHANGE THE USERNAME AND PASSWORD 
     */
    $username = 'miguel_pinto_69';
    $password_hash = 12345;

    $user_info = getUserInfo($username, $password_hash);
    $property_ids = getUserProperties($username); 
    $reservations = getUserReservations($username);

    document_main_part();
?>
        <link href="../css/user_page.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1><a href="index.php"> RENTIFY </a></h1>
            <div id="signup">
                <a id="change_profile" href="change_profile.php">Change Profile</a>
            </div>
        </header>
        <?php
            draw_body_menu();
        ?>
        <section id="user_info">
            <img src="../images/<?=$user_info['image_name']?>"/>
            <h2><?=$user_info['full_name']?></h2>
            <h3>(<?=$user_info['username']?>)</h3>
            <p>Email: <?=$user_info['email']?></p>
            <p>Phone Number: <?=$user_info['phone']?></p>
            <p>Birthdate: <?=$user_info['birthdate']?></p>
        </section>
        <section id="user_properties">
            <h3>Properties</h3>
        <?php
        if(count($property_ids) == 0){
        ?>
            <p>You didn't register any property yet.</p>
        <?php
        }
        else{
            foreach ($property_ids as $id) {
                $property_info = getPropertyInfo($id['id']);
                $property_images = getPropertyImages($id['id']);
            ?>
            <div id="user_property">
                <h4><?=$property_info['title']?></h4>
                <p><?=$property_info['description']?></p>
                <p><?=$property_info['price_per_day']?>/<?=$property_info['sleeps']?>/<?=$property_info['location']?></p>
                <img src="../images/<?=$property_images[0]['image']?>"/>
            </div>
            <?php
            }
        }
        ?>
        </section>
        <section id="user_reservations">
            <h3>Reservations</h3>
        <?php
        if(count($reservations) == 0){
        ?>
            <p>You didn't make any reservation yet.</p>
        <?php
        }else{
            foreach ($reservations as $reservation) {
                $property_info = getPropertyInfo($reservation['id_property']);
            ?>
            <div id="user_reservation">
                <h4>Property: <?=$property_info['title']?></h4>
                <p>Start: <?=$property_info['date_start']?></p>
                <p>End: <?=$property_info['date_end']?></p>
                <p>Rating: 
                <?php
                if($property_info['rating'] == NULL){
                ?>
                    <form id="rating">
                        <input type="number" name="rating" value="5" min="0" max="10" required/>
                    </form>
                <?php
                }else{
                    print($property_info['rating']);
                }
                ?>
                </p>
                <p>Comment:
                <?php
                if($property_info['comment'] == NULL){
                ?>
                    <form id="comment">
                        <input type="text" name="comment" required/>
                    </form>
                <?php
                }else{
                    print($property_info['comment']);
                }
                ?>
                </p>
            </div>
            <?php
            }
        }
        ?>
        </section>
    </body>
</html>