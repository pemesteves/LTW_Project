<?php 
    include_once "../database/connection.php"; 
    include_once "../templates/tpl_common.php";
    include_once "../templates/tpl_account.php";
    include_once "../templates/tpl_scroll_top.php";

    document_main_part();
    include_scroll_top();
?>
        <link href="../css/main_page.css" rel="stylesheet"/>
        <link href="../css/search_bar.css" rel="stylesheet"/>
        <link href="../css/form.css" rel="stylesheet"/>
     </head>
    <body> 
        <?php
            draw_body_header();
        ?>
        <section id="search_bar">
            <h1>Find the perfect place</h1>
            <div class="height_crop">
                <img src="../images/main_page.jpg" alt="Main Page Image"/>
            </div>
            <?php draw_search_bar(); ?>
        </section>
        <section id="main_form_section">
            <section id="rentify_form_section">
                <h2>Contact Us</h2>
                <form id="rentify_form" action="../actions/action_contact.php" method="post">
                    <div class="rentify_box">
                        <?php
                            draw_input_box('email', 'email', 'Email', true);
                            draw_input_box('first_name', 'text', 'First Name', true);
                            draw_input_box('last_name', 'text', 'Last Name', true);
                            draw_input_box('subject', 'text', 'Subject', true);
                            draw_input_box('message', 'text', 'Your message', true);
                        ?>
                        <input class="rentify_button" type="Submit" value="Send"/> 
                    </div>
                </form>
            </section>
        </section>
<?php
    draw_footer(true);
?>