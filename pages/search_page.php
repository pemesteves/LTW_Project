<?php
    include_once "../database/connection.php";
    include_once "../database/property.php";
    include_once "../database/search.php";
    include_once "../templates/tpl_common.php";
    include_once "../templates/tpl_scroll_top.php";

    $location = $_POST['location'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date']; 
    $guests = $_POST['guests'];

    document_main_part();
    include_scroll_top();
?>
    <link rel="stylesheet" type="text/css" href="../css/search_page.css">
    <link rel="stylesheet" type="text/css" href="../css/search_bar.css">
    <link rel="stylesheet" type="text/css" href="../css/properties_list.css">
</head>
<body>
    <?php draw_body_header(); ?>

    <section id="search_bar">
        <h1>Find the perfect place</h1>
        <?php draw_search_bar(); ?>
    </section>

    <section id="properties">
        <h2 id="properties_h">Properties</h2>
        <?php 
        $articles = searchProperties($location, $start_date, $end_date, $guests);
        if(count($articles) == 0){
            draw_not_found_message('No results were found for the specified search.');
        }
        else{
        foreach($articles as $propertyArticle){
        ?>
        <a href="property_page.php?property=<?=$propertyArticle['id']?>">
            <article id="property">
                <div id="image">
                    <img src="../images/<?=$propertyArticle['image'] ?>" alt="<?=$propertyArticle['image']?>"/>
                </div>
                <h3 id="property_name"><?=$propertyArticle['title']?></h3>
                <p class="description"><?=$propertyArticle['description']?></p>
                <div id="price_box">
                    <p id="price"><?=$propertyArticle['price_per_day']?></p>
                </div>
                <p id="sleeps"><?=$propertyArticle['sleeps']?></p>
                <p id="location"><?=$propertyArticle['location']?></p>
            </article>
        </a>
        <?php } 
        }
        ?>
    </section>
<?php
    draw_footer(true);
?>
