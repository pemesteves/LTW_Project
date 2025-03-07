<?php
    include_once "../templates/tpl_common.php";
    include_once "../templates/tpl_account.php";

    if(isset($_SESSION['username'])){
        header('Location: index.php');
        die();
    }

    document_main_part();
?>
    <link rel="stylesheet" type="text/css" href="../css/account_layout.css">
</head>
<body>
    <?php 
    draw_website_name();
    ?>
    
    <script type="module" src="../js/ajax_login.js" async></script>

    <section id="main_account">
        <section id="account">
            <h2>Login</h2>
            <form id="account_form" action="../actions/action_login.php" method="post">
                <div class="account_box">
                    <div id="login_error" class="error_box">
                        <p>Wrong username/password</p>
                    </div>
                    <?php
                    draw_input_box('username', 'text', 'Username', true);
                    draw_input_box('password', 'password', 'Password', true);
                    draw_account_submit('Login', 'register', 'Don\'t have an account? Sign up');
                    ?>
                </div>
            </form>
        </section>
    </section>
<?php
    draw_footer(false);
?>