<?php
    include_once "../templates/tpl_common.php";
    include_once "../templates/tpl_account.php";

    document_main_part();
?>
    <link rel="stylesheet" type="text/css" href="../css/account_layout.css">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
</head>
<body>    
    <?php 
    draw_website_name();
    ?>

    <script type="module" src="../js/ajax_register.js" async></script>

    <section id="main_account">
        <section id="account">
            <h2>Register</h2>
            <form id="account_form" action="../actions/action_register.php" method="post">
                <div class="account_box">
                    <?php 
                    draw_input_box('username', 'text', 'Username', true);
                    draw_input_box('email', 'email', 'Email', true);
                    draw_input_box('first_name', 'text', 'First Name', true);
                    draw_input_box('last_name', 'text', 'Last Name', true);
                    draw_input_box('phone', 'tel', 'Phone Number', true);
                    draw_input_label_box('birthdate', 'date', 'Birthdate', null, true, date('Y-m-d'), null, date('Y-m-d'), null);
                    draw_input_box('password', 'password', 'Password', true);
                    draw_account_submit('Register', 'login', 'Already have an account? Sign in');
                    ?>
                </div>
            </form>
        </section>
    </section>
<?php
    draw_footer(false);
?>