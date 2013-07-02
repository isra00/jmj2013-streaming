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
    <link href='http://fonts.googleapis.com/css?family=Signika:400,300,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/streaming.css">
</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe"><?php echo $msg['chrome_frame'] ?></p>
    <![endif]-->

    <nav class="languages">
        <?php if ($lang != 'pt') : ?><a href="" class="pt">Português</a><?php endif ?>
        <?php if ($lang != 'en') : ?><a href="" class="en">English</a><?php endif ?>
        <?php if ($lang != 'it') : ?><a href="" class="it">Italiano</a><?php endif ?>
        <?php if ($lang != 'es') : ?><a href="" class="es">Español</a><?php endif ?>
    </nav>

    <div class="main">

        <header>
            <h1 class="title"><?php echo $msg['title'] ?></h1>
            <h2 class="subtitle"><?php echo $msg['subtitle'] ?></h2>
        </header>

        <p class="intro-text"><?php echo $msg['intro_text'] ?></p>

        <section class="video-area">
            <!--<div class="livestream-player">
                <object width="853" height="480"><param name="movie" value="//www.youtube.com/v/s6NDY8FSr9M?hl=es_ES&amp;version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="//www.youtube.com/v/s6NDY8FSr9M?hl=es_ES&amp;version=3" type="application/x-shockwave-flash" width="853" height="480" allowscriptaccess="always" allowfullscreen="true"></embed></object>
                <p class="help"><?php echo $msg['streaming_help'] ?></p>
            </div>-->
            <div class="not-yet">
                <?php echo $msg['not_yet_title'] ?>
                <ul>
                    <li><?php echo $msg['tz_spain'] ?>: 22:00</li>
                    <li><?php echo $msg['tz_central_america'] ?>: 15:00</li>
                    <li><?php echo $msg['tz_usa'] ?>: 16:00</li>
                </ul>
            </div>
        </section>

        <footer class="bottom-links">
            <a class="jmj-cnc" href="http://www.rio2013cnc.com/"><?php echo $msg['link_jmj_cnc'] ?></a>
            <a class="jmj" href="http://rio2013.com"><img src="<?php echo ROOT ?>/img/logo-jmj.png" alt="<?php echo $msg['link_jmj'] ?>"></a>
            <a class="cnc" href="http://camminoneocatecumenale.it"><?php echo $msg['link_cnc'] ?></a>
        </footer>

    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        /*var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src='//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));*/
    </script>
</body>
</html>