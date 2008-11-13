<?php
@include('customevent.php');
@include('comp.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>YUI: CustomEvent ported to PHP.</title>
    <link rel="stylesheet" href="http://blog.davglass.com/files/yui/css/yuicss.css" type="text/css">
    <link rel="stylesheet" href="http://blog.davglass.com/wp-content/themes/davglass/style.css" type="text/css">
    <style type="text/css" media="screen">
        p, h2 {
            margin: 1em;
        }
	</style>
</head>
<body>
<div id="davdoc" class="yui-t7">
    <div id="hd"><h1 id="header"><a href="">YUI: CustomEvent ported to PHP.</a></h1></div>
    <div id="bd">
    <h2>YUI CustomEvent utility ported to PHP</h2>
    <p>Sources: <a href="source.php?file=1">index.php</a> -
    <a href="source.php?file=2">customevent.php</a> -
    <a href="source.php?file=3">comp.php</a></p>

    <p>
        <strong>Start Execution</strong><br>
        <?php
            $comp = new Comp();
        ?>
    </p>
    </div>
    <div id="ft">&nbsp;</div>
</div>
</body>
</html>
