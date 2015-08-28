<?php
/**
 * Created by PhpStorm.
 * User: gmarten
 * Date: 27/08/15
 * Time: 21:37
 */
session_start();
include_once("database/generated/include_dao.php");

// get language and page parameters
$pathinfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : $_SERVER['REDIRECT_URL'];
$params = preg_split('|/|', $pathinfo, -1, PREG_SPLIT_NO_EMPTY);
switch (count($params)){
    case 0:
        if (!isset($_SESSION['language']))
        {
            //TODO: go to select language page
        }
        break;
    case 2:
        $_SESSION["page"] = $params[1];
    case 1:
        $_SESSION["language"] = $params[0];
}
?>
<html>
<head>
    <meta name="keywords" content="bed breakfast, bnb, akouna matataa, boat, accommodation, hotel, hostel, logement, peniche">
    <meta name="description" content="Akouna Matataa offers now added to the already established boat events the service of bed and breakfast with different packages for family and business">
    <title>Akouna Matataa Bed And Breakfast</title>
    <link rel="icon" href="/assets/img/favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Tangerine:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Nunito:300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/flags.css">
    <script type="text/javascript" src="/assets/js/common.js"></script>
    <script type="text/javascript" src="/assets/js/index.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>
</head>

<body id="main" style="background-image: url(/assets/img/body-background.jpg);">
<!-- Start Open Web Analytics Tracker -->
<script type="text/javascript">
    var owa_baseUrl = 'http://decobroq.byethost11.com/owa/';
    var owa_cmds = owa_cmds || [];
    owa_cmds.push(['setSiteId', 'fa7cffc73273f97f56333dddc648e448']);
    owa_cmds.push(['trackPageView']);
    owa_cmds.push(['trackClicks']);
    owa_cmds.push(['trackDomStream']);

    (function() {
        var _owa = document.createElement('script'); _owa.type = 'text/javascript'; _owa.async = true;
        owa_baseUrl = ('https:' == document.location.protocol ? window.owa_baseSecUrl || owa_baseUrl.replace(/http:/, 'https:') : owa_baseUrl );
        _owa.src = owa_baseUrl + 'modules/base/js/owa.tracker-combined-min.js';
        var _owa_s = document.getElementsByTagName('script')[0]; _owa_s.parentNode.insertBefore(_owa, _owa_s);
    }());
</script>
<!-- End Open Web Analytics Code -->

<!-- header -->
<?php
include 'includes/header.php';
