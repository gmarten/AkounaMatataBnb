<?php
/**
 * Created by PhpStorm.
 * User: gmarten
 * Date: 27/08/15
 * Time: 21:37
 */

// get the tags and contents from the database according to the selected language
$website = DAOFactory::getWebsiteDAO()->loadTagsByIDAndLanguage("header", $_SESSION["language"]);
echo "<script type='text/javascript'>$(document).ready(function() {";
$tagsCount = count($website->tags);
for ($i = 0; $i < $tagsCount; $i++){
    echo "$('#". $website->tags[$i]->name ."').html('". htmlspecialchars($website->tags[$i]->content, ENT_QUOTES, 'ISO-8859-1') ."');\n";
}
echo "}) \n</script>";

?>
<div id="header" class="section">
    <div class="container-fluid transparent" id="header-wrapper" style="background-image: url(/assets/img/container-bg.png?922006);">
        <div class="container-fluid">
            <div class="container-fluid no-padding">
                <div class="row-fluid">
                    <div class="col-md-4 col-xs-12 no-padding">
                        <a href="/" title="Akouna Matata logo"><img src="/assets/img/home-logo.png" alt="Akouna Matata logo" class="img-responsive"></a>
                    </div>
                    <div id="header-contact" class="col-md-8 col-xs-12 text-right no-padding">
                        <span class="hidden-sm hidden-xs">Bed &amp; Breakfast, Hogeweg 253, Mechelen 2800 | +32 495 25 53 65 |
                            <a href="mailto:christina.vandalem@gmail.com">christina.vandalem@gmail.com</a>&nbsp;|
                        </span>
                            <?php
                                // include the selected language dropdown menu
                                switch ($_SESSION["language"]) {
                                    case "nl":
                                        include("includes/nederlands.php");
                                        break;
                                    case "fr":
                                        include("includes/francais.php");
                                        break;
                                    case "de":
                                        include("includes/deutsch.php");
                                        break;
                                    default:
                                        include("includes/english.php");
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid" id="nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-toggle" id="navbar-toggle-header">Navigation</span>
                </div>
                <div class="collapse navbar-collapse navbar-right " id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li>
                            <a <?php
                            // Choose the active website (default is "home")
                            if (!isset($_SESSION['page']) || $_SESSION["page"] == "home") {
                                echo "class='activenavbar'";
                            }
                            ?> href="/<?php echo $_SESSION["language"] ?>/home"><span id="home"></span></a>
                        </li>
                        <li>
                            <a <?php
                            if ($_SESSION["page"] == "rooms") {
                                echo "class='activenavbar'";
                            }
                            ?> href="/<?php echo $_SESSION["language"] ?>/rooms"><span id="rooms"></span></a>
                        </li>
                        <li>
                            <a <?php
                            if ($_SESSION["page"] == "arrangements") {
                                echo "class='activenavbar'";
                            }
                            ?> href="/<?php echo $_SESSION["language"] ?>/arrangements"><span id="arrangements"></span></a>
                        </li>
                        <li>
                            <a <?php
                            if ($_SESSION["page"] == "guestbook") {
                                echo "class='activenavbar'";
                            }
                            ?> href="/<?php echo $_SESSION["language"] ?>/guestbook"><span id="guestbook"></span></a>
                        </li>
                        <li>
                            <a <?php
                            if ($_SESSION["page"] == "contact") {
                                echo "class='activenavbar'";
                            }
                            ?> href="/<?php echo $_SESSION["language"] ?>/contact"><span id="contact"></span></a>
                        </li>
                        <li>
                            <a <?php
                            if ($_SESSION["page"] == "poi") {
                                echo "class='activenavbar'";
                            }
                            ?> href="/<?php echo $_SESSION["language"] ?>/poi"><span id="poi"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

