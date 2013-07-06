<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title><?php echo $msg['page_title'] ?></title>
    <meta name="description" content="<?php echo $msg['meta_content'] ?>">
    <meta name="viewport" content="width=device-width">

    <?php /** @todo Elegir solo los pesos y subset adecuados de la tipo!!! */ ?>
    <link href='http://fonts.googleapis.com/css?family=Signika:300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo ROOT ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo ROOT ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo ROOT ?>/css/streaming.css">
</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe"><?php echo $msg['chrome_frame'] ?></p>
    <![endif]-->

    <nav class="languages">
    <?php foreach ($languages as $code=>$l) : ?>
        <?php if ($current_lang != $code) : ?>
        <a href="<?php echo $l['url'] ?>" class="<?php echo $code ?>"><?php echo $l['name'] ?></a>
        <?php endif ?>
    <?php endforeach ?>
    </nav>

    <div class="main">

        <header>
            <h1 class="title"><?php echo $msg['title'] ?></h1>
            <h2 class="subtitle"><?php echo $msg['subtitle'] ?></h2>
        </header>

        <p class="intro-text"><?php echo $msg['intro_text'] ?></p>

        <section class="video-area">

            <?php if ($show['player']) : ?>
            <div class="livestream-player <?php if ($show['streaming_now']) echo 'block' ?>" id="livestream-player">
                <object width="853" height="480"><param name="movie" value="//www.youtube.com/v/s6NDY8FSr9M?hl=es_ES&amp;version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="//www.youtube.com/v/s6NDY8FSr9M?hl=es_ES&amp;version=3" type="application/x-shockwave-flash" width="853" height="480" allowscriptaccess="always" allowfullscreen="true"></embed></object>
                <p class="help"><?php echo $msg['streaming_help'] ?></p>
            </div>
            <?php endif ?>

            <?php if ($show['not_yet']) : ?>
            <div class="warning" id="not-yet">
                <?php echo $msg['not_yet_title'] ?>
                <p id="local-time"></p>
            </div>
            <?php endif ?>

            <?php if ($show['finished']) : ?>
            <div class="warning finished" id="finished">
                <?php echo $msg['finished'] ?>
            </div>
            <?php endif ?>

            <?php if ($config['general_disable']) : ?>
            <div class="warning error">
                <?php echo $msg['unavailable'] ?>
            </div>
            <?php endif ?>

        </section>

        <footer class="bottom-links">
            <a class="jmj-cnc" href="http://www.rio2013cnc.com/"><?php echo $msg['link_jmj_cnc'] ?></a>
            <a class="jmj" href="http://rio2013.com"><?php echo $msg['link_jmj'] ?></a>
            <a class="cnc" href="http://camminoneocatecumenale.it"><?php echo $msg['link_cnc'] ?></a>
        </footer>

    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
    $(function() {
        var meeting_date_utc = new Date();
        meeting_date_utc.setUTCFullYear(2013);
        meeting_date_utc.setUTCMonth(06);
        meeting_date_utc.setUTCDate(29);
        meeting_date_utc.setUTCHours(17); //UTC-3

        document.getElementById("local-time").innerHTML = "<?php echo $msg['local_time'] ?>" + meeting_date_utc.getHours() + ":00.";

        var checkDate = function() {
            var now = new Date();
            if (now >= meeting_date_utc) {
                document.getElementById("livestream-player").style.display = "block";
                document.getElementById("not-yet").style.display = "none";
            }
        };

        setInterval(checkDate, 30*1000);
    });
    </script>

    <script>
        /*var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src='//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));*/
    </script>
</body>
</html>
