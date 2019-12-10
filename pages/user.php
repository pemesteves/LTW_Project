<?php
    include_once "../includes/init.php";
    include_once "../database/property.php"; 
    include_once "../database/user.php";
    include_once "../database/reservations.php";
    include_once "../templates/tpl_common.php";
    include_once "../templates/tpl_scroll_top.php";

    if(!isset($_SESSION['username'])){
        header('Location: ../pages/index.php');
    }

    $username = $_SESSION['username'];
    $password_hash = getUserPassword($username)['password'];

    $user_info = getUserInfo($username, $password_hash);
    $property_ids = getUserProperties($username); 
    $reservations = getUserReservations($username);

    document_main_part();
    include_scroll_top();
?>
        <link href="../css/user_page.css" rel="stylesheet">
        <link href="../css/properties_list.css" rel="stylesheet">
        <link href="../css/profile.css" rel="stylesheet">
    </head>
    <body>
        <?php
            draw_header('change_profile.php', 'Change Profile');
        ?>
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
                $property_info = getPropertyInfo($id['id']);
                $property_images = getPropertyImages($id['id']);
            ?>
            <a href="property_page.php?property=<?=$id['id']?>">
                <article id="property">
                    <div id="image">
                        <img src="../images/<?=$property_images[0]['image']?>"/>
                    </div>
                    <h4 id="property_name"><?=$property_info['title']?></h4>
                    <p id="description"><?=$property_info['description']?></p>
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
<?php
    draw_footer(true);
?>