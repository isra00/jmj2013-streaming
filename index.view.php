<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $current_lang ?>"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title><?php echo $msg['page_title'] ?></title>
    <meta name="viewport" content="width=device-width">

    <?php /** @todo Elegir solo los pesos y subset adecuados de la tipo!!! */ ?>
    <link href='http://fonts.googleapis.com/css?family=Signika:300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo ROOT ?>/css/normalize.main.min.css">
    <link rel="stylesheet" href="<?php echo ROOT ?>/css/streaming.css">

    <meta name="description" content="<?php echo $msg['meta_content'] ?>" />
    <link rel="canonical" href="http://www.rio2013cnc.com<?php echo $_SERVER['REQUEST_URI'] ?>" />
    <meta property="og:locale" content="<?php echo $languages[$current_lang]['code'] ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $msg['page_title'] ?>" />
    <meta property="og:description" content="<?php echo $msg['meta_content'] ?>" />
    <meta property="og:url" content="<?php echo URL_SELF ?>" />
    <meta property="og:site_name" content="<?php echo $msg['meta_site_name'] ?>" />
    <meta property="fb:admins" content="100003576128882" />
    <meta property="og:image" content="http://<?php echo $_SERVER['SERVER_NAME'] ?><?php echo ROOT ?>/img/thumb.jpg" />
</head>
<body onload="init()">
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

            <?php if ($show['player'] && $show['redevida']) : ?>
            <div class="redevida-player <?php if ($show['streaming_now']) echo 'block' ?>">
                <object width="480" height="380" type="application/x-oleobject" standby="Loading Microsoft Windows Media Player components..." codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,0,02,0902" classid="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95" id="mediaPlayer"> 
                    <param value="mms://wmedia.telium.com.br/redevida" name="fileName">  
                    <param value="0" name="animationatStart"> 
                    <param value="1" name="transparentatStart"> 
                    <param value="1" name="autoStart"> 
                    <param value="1" name="ShowControls"> 
                    <param value="0" name="ShowDisplay"> 
                    <param value="0" name="ShowStatusBar"> 
                    <param value="0" name="loop"> 
                    <embed width="480" height="380" loop="0" designtimesp="5311" autostart="1" src="mms://wmedia.telium.com.br/redevida" videoborder3d="0" showstatusbar="0" showdisplay="0" showtracker="0" showcontrols="1" bgcolor="darkblue" autosize="0" displaysize="4" id="mediaPlayer" pluginspage="http://microsoft.com/windows/mediaplayer/en/download/" type="application/x-mplayer2">  
                </object>
            </div>
            <?php endif ?>

            <?php if ($show['player'] && !$show['redevida']) : ?>
            <div class="livestream-player <?php if ($show['streaming_now']) echo 'block' ?>" id="livestream-player">
                <iframe src="http://new.livestream.com/accounts/4698529/events/<?php echo $config['livestream_event'] ?>/player?width=640&height=360&autoPlay=false&mute=false" width="640" height="360" frameborder="0" scrolling="no"> </iframe>
                <!--<p class="help"><?php echo $msg['streaming_help'] ?></p>-->
                <p class="radiomaria"><?php echo $msg['listen_radiomaria'] ?> <a href="http://www.radiomaria.org.br/link2/">Radio Maria</a></p>
            </div>
            <?php endif ?>

            <?php if ($show['not_yet'] && !$config['general_disable']) : ?>
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

        <section class="other-channels">
            <h3><?php echo $msg['other_media'] ?></h3>

            <ul class="channels">
                <li>
                    <h4><?php echo $msg['brazil'] ?></h4>
                    <ul>
                        <li><a target="_blank" href="http://www.radiomaria.org.br/">Rádio Maria</a></li>
                    </ul>
                </li>
                <li>
                    <h4><?php echo $msg['italy'] ?></h4>
                    <ul>
                        <li><a target="_blank" href="http://www2.tv2000.it/home_page/mediacenter/00000014_Video.html">TV2000</a></li>
                        <li><a target="_blank" href="http://www.telepace.it/web-tv.php">Telepace</a></li>
                    </ul>
                </li>
                <li>
                    <h4><?php echo $msg['spain'] ?></h4>
                    <ul>
                        <li><a target="_blank" href="http://live.13tv.hollybyte.tv/">13tv</a></li>
                        <li><a target="_blank" href="http://www.mariavision.com/senal_en_vivo.php">María+Visión</a></li>
                    </ul>
                </li>
                <li>
                    <h4><?php echo $msg['latam'] ?></h4>
                    <ul>
                        <li><a target="_blank" href="http://www.ewtn.com/multimedia/live_player.asp?satname=domesplp&servertime=&telrad=t007">EWTN</a></li>
                        <li><a target="_blank" href="http://www.mariavision.com/senal_en_vivo.php">María+Visión</a></li>
                    </ul>
                </li>
            </ul>
        </section>

        <footer class="bottom-links">
            <a class="jmj-cnc" href="http://www.rio2013cnc.com/"><?php echo $msg['link_jmj_cnc'] ?></a>
            <a class="jmj" href="http://rio2013.com"><?php echo $msg['link_jmj'] ?></a>
            <a class="cnc" href="http://camminoneocatecumenale.it"><?php echo $msg['link_cnc'] ?></a>
        </footer>

    </div>


    <?php if ($show['player']) : ?>
    <script>
    function init() {

        var localTime,
            meeting_date_utc = new Date();

        meeting_date_utc.setUTCFullYear(<?php echo gmdate('Y', MEETING_START) ?>);
        meeting_date_utc.setUTCMonth(<?php echo gmdate('m', MEETING_START) - 1 ?>);
        meeting_date_utc.setUTCDate(<?php echo gmdate('d', MEETING_START) ?>);
        meeting_date_utc.setUTCHours(<?php echo gmdate('H', MEETING_START) ?>);
        meeting_date_utc.setUTCMinutes(<?php echo gmdate('i', MEETING_START) ?>);

        if (localTime = document.getElementById("local-time"))
        {
            localTime.innerHTML = "<?php echo $msg['local_time'] ?>" + meeting_date_utc.getHours() + ":00.";
        }

        var checkDate = function() {
           var now = new Date();

           if (now >= meeting_date_utc)
            {
                document.getElementById("livestream-player").style.display = "block";
                document.getElementById("not-yet").style.display = "none";
            }
        };

        checkDate();

        setInterval(checkDate, 30*1000);
    };
    </script>
    <?php endif ?>

    <script>
        var _gaq=[['_setAccount','UA-42284163-1'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src='//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</body>
</html>
