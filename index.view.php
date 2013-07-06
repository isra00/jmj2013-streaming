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

    <meta name="description" content="<?php echo $msg['meta_content'] ?>" />
    <link rel="canonical" href="<?php echo URL_SELF ?>" />
    <meta property="og:locale" content="<?php echo $languages[$current_lang]['code'] ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $msg['page_title'] ?>"/>
    <meta property="og:description" content="<?php echo $msg['meta_content'] ?>"/>
    <meta property="og:url" content="<?php echo URL_SELF ?>"/>
    <meta property="og:site_name" content="Rio 2013 Caminho Neocatecumenal"/>
    <meta property="fb:admins" content="100003576128882"/>
    <meta property="og:image" content="<?php echo ROOT ?>/img/thumb.jpg"/>
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

    <div class="main" itemscope itemtype="http://data-vocabulary.org/Event">

        <header>
            <h1 class="title">
                <a href="<?php echo URL_SELF ?>" itemprop="url" >
                    <span itemprop="summary"><?php echo $msg['title'] ?></span>
                </a>
            </h1>
            <h2 class="subtitle">
                <?php echo $msg['subtitle'] ?>
                <time class="start" itemprop="startDate" datetime="2013-07-29T14:30-03:00"><?php echo $msg['subtitle_start'] ?></time>
                <time class="end" itemprop="endDate" datetime="2013-07-29T19:00-03:00">Jul 29, 19:00PM</time>
                ·
                <span class="location" itemprop="location" itemscope itemtype="http://data-vocabulary.org/​Organization">
                    <span itemprop="name">RioCentro</span>
                    ​<span class="address" itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
                        <span itemprop="street-address">Av. Salvador Allende, 6555</span>, 
                        <span itemprop="locality">Barra da Tijuca, Rio de Janeiro</span>, 
                        <span itemprop="region">RJ</span>
                    </span>
                    <span class="geo" itemprop="geo" itemscope itemtype="http://data-vocabulary.org/​Geo">
                        <meta itemprop="latitude" content="-22.979024" />
                        <meta itemprop="longitude" content="-43.413181" />
                    </span>
                </span>
            </h2>
        </header>

        <p class="intro-text" itemprop="description"><?php echo $msg['intro_text'] ?></p>

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
