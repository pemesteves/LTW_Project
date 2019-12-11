<?php
    include_once "../templates/tpl_common.php";
    include_once "../templates/tpl_account.php";
    include_once "../templates/tpl_upload_image.php";

    document_main_part();
?>
    <link rel="stylesheet" type="text/css" href="../css/add_properties.css"/>
    <link rel="stylesheet" type="text/css" href="../css/form.css"/>
    <script src="../js/upload_image.js" defer></script>
</head>
<body>
    <?php 
    draw_website_name(); 
    ?>
    
    <section id="main_form_section">
        <section id="rentify_form_section">
            <h2>Rentify your property</h2>
            <?php
            $image_name = "";
            upload_image($image_name, 'property');
            ?>
            <form id="rentify_form" action="../actions/action_rentify.php" method="post">
                <div class="rentify_box">
                    <?php
                    draw_input_box('title', 'text', 'Property title', true);
                    draw_input_box('location', 'text', 'Location', true);
                    draw_input_min_box('sleeps', 'number', 'Sleeps', true, 1);
                    draw_input_box('price', 'number', 'Price per day', true);
                    draw_input_box('description', 'text', 'Description', true);
                    ?>
                    <input class="rentify_button" type="Submit" value="Rentify">
                </div>
            </form>
        </section>
    </section>
<?php
    draw_footer(false);
?>
