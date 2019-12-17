<?php
    include_once "../includes/init.php";
    include_once "../database/property.php"; 
    include_once "../database/user.php";
    include_once "../database/reservations.php";
    include_once "../templates/tpl_common.php";
    include_once "../templates/tpl_scroll_top.php";

    if(!isset($_SESSION['username'])){
        header('Location: ../pages/index.php');
        die();
    }

    $username = $_SESSION['username'];

    try{
        $password_hash = getUserPassword($username)['password'];
        $user_info = getUserInfo($username, $password_hash);
        $property_ids = getUserProperties($username); 
        $reservations = getUserReservations($username);
    }catch(PDOException $e){
        catchException($e);
    }

    document_main_part();
    include_scroll_top();
?>
        <link href="../css/properties_list.css" rel="stylesheet">
        <link href="../css/profile.css" rel="stylesheet">
        <script src="../js/longDescription.js" async></script>
    </head>
    <body>
        <?php
            draw_header('change_profile.php', 'Change Profile');
        ?>
        <h3 id="profile">Profile</h3>
        <section id="user_info">
            <div id="fit_crop">
                <img src="../images/<?=$user_info['image_name']?>"/>
            </div>
            <div id="headers">
                <h2><?=$user_info['full_name']?></h2>
                <h3>(<?=$user_info['username']?>)</h3>
            </div>
            <p id="email">Email: <?=$user_info['email']?></p>
            <p id="phone">Phone Number: <?=$user_info['phone']?></p>
            <p id="birthdate">Birthdate: <?=$user_info['birthdate']?></p>
        </section>
        <section id="properties">
            <h3 id="properties_h">Properties</h3>
        <?php
        if(count($property_ids) == 0){
        ?>
            <p>You didn't register any property yet.</p>
        <?php
        }
        else{
            foreach ($property_ids as $id) {
                try{
                    $property_info = getPropertyInfo($id['id']);
                    $property_images = getPropertyImages($id['id']);
                }catch(PDOException $e){
                    catchException($e);
                }
            ?>
            <a href="property_page.php?property=<?=$id['id']?>">
                <article id="property">
                    <div id="image">
                        <img src="../images/<?=$property_images[0]['image']?>"/>
                    </div>
                    <h4 id="property_name"><?=$property_info['title']?></h4>
                    <p class="description"><?=$property_info['description']?></p>
                    <div id="price_box">
                        <p id="price"><?=$property_info['price_per_day']?></p>
                    </div>
                    <p id="sleeps"><?=$property_info['sleeps']?></p>
                    <p id="location"><?=$property_info['location']?></p>
                </article>
            </a>
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
                try{
                    $property_info = getPropertyInfo($reservation['id_property']);
                }catch(PDOException $e){
                    catchException($e);
                }
            ?>
            <div id="user_reservation">
                <h4><?=$property_info['title']?></h4>
                <h5>Location: <?=$property_info['location']?></h5>
                <p>Total Price: <?=$reservation['sleeps']?>x<?=$property_info['price_per_day']?>$ = <?=$reservation['sleeps']*$property_info['price_per_day']?>$</p>
                <p>Start: <?=$reservation['date_start']?></p>
                <p>End: <?=$reservation['date_end']?></p>
                <?php 
                if(date('Y-m-d') < date($reservation['date_start'])){
                ?>
                <form action="../actions/action_cancel_reservation.php" method="post">
                    <input type="hidden" name="reservation" value="<?=$reservation['id']?>"/>
                    <input type="submit" class="cancelReservation" value="Cancel Reservation"/>
                </form>
                <?php
                }

                if(date($reservation['date_end']) <= date('Y-m-d')){
                ?>
                <p>Rating: 
                <?php
                    if($reservation['rating'] == NULL){
                ?>
                    <form id="rating" action="../actions/action_rate.php" method="post">
                        <input type="hidden" name="reservation" value="<?=$reservation['id']?>"/>
                        <input type="number" name="rating" value="5" min="0" max="10" required/>
                    </form>
                <?php
                    }else{
                        print($reservation['rating']);
                    }
                ?>
                </p>
                <p>Comment:
                <?php
                    if($reservation['comment'] == NULL){
                ?>
                    <form id="comment" action="../actions/action_comment.php" method="post">
                        <input type="hidden" name="reservation" value="<?=$reservation['id']?>"/>
                        <input type="text" name="comment" placeholder="My comment" required/>
                    </form>
                <?php
                    }else{
                        print($reservation['comment']);
                    }
                }
                ?>
                </p>
            </div>
            <?php
            }
        }
        ?>
        </section>
<?php
    draw_footer(true);
?>