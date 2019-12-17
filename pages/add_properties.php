<?php
    include_once "../templates/tpl_common.php";
    include_once "../templates/tpl_account.php";
    include_once "../templates/tpl_upload_image.php";

    if(!isset($_SESSION['username']))
        header('Location: login.php');

    document_main_part();
?>
    <link rel="stylesheet" type="text/css" href="../css/add_properties.css"/>
    <link rel="stylesheet" type="text/css" href="../css/form.css"/>
    <script src="../js/long_image_name.js" defer></script>
</head>
<body>
    <?php 
        draw_body_header();
    ?>
    
    <section id="main_form_section">
        <section id="rentify_form_section">
            <h2>Rentify your property</h2>
            <?php
            upload_image("", 'property');
            ?>
            <form id="rentify_form" action="../actions/action_rentify.php" method="post">
                <div class="rentify_box">
                    <?php
                    draw_input_box('title', 'text', 'Property title', true);
                    draw_input_box('location', 'text', 'Location', true);
                    draw_input_min_box('sleeps', 'number', 'Sleeps', true, 1);
                    draw_input_step_box('price', 'number', 'Price per day', true, 0, 0.01);
                    draw_input_box('description', 'text', 'Description', true);
                    ?>
                    <input class="rentify_button" type="Submit" value="Rentify">
                </div>
            </form>
            <?php
            if(isset($_SESSION['image_names'])){
            ?>
            <div id="uploaded_images">
                <p>Uploaded Images: </p>
                <ul id="uploadedImages">
                <?php
                    $images = $_SESSION['image_names'];
                    foreach($images as $image){
                ?>
                    <li class="image_name"><?=$image?></li>
                <?php
                    }
                }
                ?>
                </ul>
            </div>
        </section>
    </section>
<?php
    draw_footer(false);
?>
