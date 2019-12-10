<?php 
    include_once "../database/connection.php"; 
    include_once "../database/property.php"; 
    include_once "../templates/tpl_common.php";
    include_once "../templates/tpl_scroll_top.php";

    document_main_part();
    include_scroll_top();
?>
        <link href="../css/main_page.css" rel="stylesheet">
        <link href="../css/search_bar.css" rel="stylesheet">
        <link href="../css/about_page.css" rel="stylesheet">
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
        <section id="about">
            <article>
                <h2>Our mission</h2>
                <p>Connect travelers to the people and places they love, giving them the space they need to drop the distractions of everyday life and simply be together.</p>
            </article>
            <article>
                <h2>About Rentify</h2>
                <p>In 2019, Rentify  introduced a new way for people to travel together, pairing homeowners with families and friends looking for places to stay. We were grounded in one purpose: To give people the space they need to drop the distractions of everyday life and simply be together.</p>
                <p>Since then, we’ve grown into a global community of homeowners and travelers, with unique properties around the world. Rentify makes it easy and fun to book cabins, condos, beach houses and every kind of space in between.</p>
            </article>
            <article>
                <h2>What we believe</h2>
                <p>Only in a vacation home can you have those private dinner conversations with loved ones that go long into the night, or more space for those fun, silly moments that bring you closer together.</p>
                <p>People are increasingly forced to choose work over life — screen time over family time. We could all use more connection with the people we love.</p>
                <p>But too often, it doesn't happen. Planning a trip with family and friends is too stressful. Too time consuming. Too hard. There’s always an excuse not to go. Planning a trip should feel as effortless and enjoyable as being on one.</p>
                <p>Welcome to Rentify, helping people everywhere travel better together.</p>
            </article>
        </section>
<?php
    draw_footer(true);
?>