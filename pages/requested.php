<?php
    include_once "../includes/init.php";
    include_once "../database/property.php"; 
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
        <link href="../css/requested.css" rel="stylesheet">
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
            <p>Tourists didn't booked any of your properties yet.</p>
        <?php
        }
        else{
            foreach ($reservations as $reservation) {
                try{
                    $property_info = getPropertyInfo($reservation['id_property']);
                }catch(PDOException $e){
                    catchException($e);
                }
            ?>
            <a href="property_page.php?property=<?=$property_info['id']?>">
                <article id="tourist_reservation">
                    <h4>Property: <?=$property_info['title']?></h4>
                    <p>Location: <?=$property_info['location']?></h5>
                    <p>Start: <?=$reservation['date_start']?></p>
                    <p>End: <?=$reservation['date_end']?></p>
                    <?php 
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