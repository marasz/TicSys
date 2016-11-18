<!DOCTYPE html>
<?php
include_once 'config/config.php';
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="There's a lot to do.">
    <meta name="author" content="Mauro">
    <link rel="stylesheet" href="/style.css">
    <title>Hello World</title>
</head>

<body>
<div id="wrapper">
    <a href="/kontakt"><img id="feedbackimg" src="/images/feedback.png"></a>
    <header>
        <img src="/images/logo-black.png">
    </header>
        <nav>
            <ul class="navUl">

                <?php
                $navigation = getMenu();
                foreach ($navigation as $href => $title) {
                    $liContent = $title;
                    if ($href != strtolower($_SERVER['REQUEST_URI'])) {
                        $liContent = "<a href=\"$href\">$title</a>";
                    }
                    echo "<li class=\"navLi\">$liContent</li>\n";
                }

                ?>
            </ul>
        </nav>

    <div id="content" class="content">
        <?php
            switch (getSelectedMenuPoint()){
                case URI_EVENTS:
                    include_once 'controller/eventscontroller.php';
                    break;

                case URI_KONTAKT:
                    include_once 'controller/contactcontroller.php';
                    break;
            }
        ?>

    </div>
    <footer>
        <p>Copyright &copy; 2012 -
            <?php echo date('Y') ?> TicSys</p>
    </footer>
</div>
</body>
<?php
    function getMenu(){
        $navigation = array(
            URI_HOME => 'Home',
            URI_EVENTS => 'Events',
            URI_FAQ => 'FAQ',
            URI_KONTAKT => 'Kontakt'
        );
        return $navigation;
    }

/**
 * returns the current 1th Folder.
 *
 * @author  Mauro Stehle
 *
 * @since 1.0
 *
 *
 */

    function getSelectedMenuPoint(){

        $url_array = parse_url($_SERVER['REQUEST_URI']);
        preg_match('@/(?<path>[^/]+)@', $url_array['path'], $m);
        $url_folder = $m['path'];
        return "/" . $url_folder;
    }
?>
</html>