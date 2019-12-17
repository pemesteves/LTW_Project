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
        $reservations = getTouristsReservations($username); 
    }catch(PDOException $e){
        catchException($e);
    }

    document_main_part();
    include_scroll_top();
?>
        <link href="../css/tourist_reservations.css" rel="stylesheet">
        <script src="../js/longDescription.js" async></script>
    </head>
    <body>
        <?php
            draw_body_header();
        ?>
        <section id="tourists_reservations">
            <h3>Tourists Reservations</h3>
        <?php
        if(count($reservations) == 0){
        ?>
            <p>Tourists didn't book any of your properties yet.</p>
        <?php
        }
        else{
            foreach ($reservations as $reservation) {
                try{
                    $property_info = getPropertyInfo($reservation['id_property']);
                    $user_contacts = getUserContacts($reservation['tourist_username']);
                    $user_image = getUserImagePath($reservation['tourist_username']);
                }catch(PDOException $e){
                    catchException($e);
                }
            ?>
            <a href="property_page.php?property=<?=$property_info['id']?>">
                <article id="tourist_reservation">
                    <div id="property_info">
                        <h4><?=$property_info['title']?></h4>
                        <p>Location: <?=$property_info['location']?></p>
                        <p>Start: <?=$reservation['date_start']?></p>
                        <p>End: <?=$reservation['date_end']?></p>
                    </div>
                    <div id="user_contacts">
                        <h4>User</h4>
                        <p>Username: <?=$reservation['tourist_username']?></p>
                        <p>Email: <?=$user_contacts['email']?></p>
                        <p>Phone: <?=$user_contacts['phone']?></p>
                    </div>
                    <img id="user_image" src="../images/<?=$user_image['image_name']?>" alt="<?=$user_image['image_name']?>" />
                    <?php 
                    if($reservation['rating'] != NULL){
                    ?>
                    <div id="other_info">
                        <p>Rating: <?=$reservation['rating'];?></p>
                    <?php
                    }

                    if($reservation['comment'] != NULL){
                    ?>
                        <p>Comment: <?=$reservation['comment'];?></p>
                    <?php
                    }
                    ?>
                    </div>

                    <?php
                    if(date('Y-m-d') < date($reservation['date_start'])){
                    ?>
                    <form action="../actions/action_cancel_reservation.php" method="post">
                        <input type="hidden" name="reservation" value="<?=$reservation['id']?>"/>
                        <input type="submit" class="cancelReservation" value="Cancel Reservation"/>
                    </form>
                    <?php
                    }
                    ?>
                </article>
            </a>
        <?php
            }
        }
        ?>
        </section>     
<?php
    draw_footer(true);
?>