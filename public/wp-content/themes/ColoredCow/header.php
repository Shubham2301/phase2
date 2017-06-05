<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1">
    <title><?php echo bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <nav class = "navbar navbar-static-top navbar-default navbar-inverse" role = "navigation">
        <div class = "navbar-header">
            <a class = "navbar-brand" href="<?php echo get_home_url(); ?>">SOIREE</a>
        </div>
        <div>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 0">
                <?php 
                    $page = get_page_by_title("All Soirees");
                    $link_all_soiree_page = get_page_link($page->ID); 
                ?>
                <li><a href="<?php echo $link_all_soiree_page; ?>">All-Soirees</a></li>
            </ul>
        </div>
    </nav>
</head>

<body>