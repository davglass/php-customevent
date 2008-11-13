<?php

$files = array();
$files[1] = 'index.php';
$files[2] = 'customevent.php';
$files[3] = 'comp.php';

$str_file = '';

if ($files[$_GET['file']]) {
    $file = file('./'.$files[$_GET['file']]);
    while (list($na, $line) = each($file)) {
        $str_file .= $line;
    }
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>YUI: PHP Custom Events</title>
    <link rel="stylesheet" href="http://blog.davglass.com/files/yui/css/yuicss.css" type="text/css">
    <link rel="stylesheet" href="http://blog.davglass.com/wp-content/themes/davglass/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://blog.davglass.com/files/yui/css/dpSyntaxHighlighter.css">
    <style type="text/css" media="screen">
        p {
            padding: .25em;
        }
	</style>
</head>
<body>
<div id="davdoc" class="yui-t7">
    <div id="hd"><h1 id="header"><a href="http://blog.davglass.com/">YUI: Custom Events</a></h1></div>
    <div id="bd">
    <p><a href="index.php">&lt; &lt; Back</a></p>
    <?php highlight_string($str_file); ?>
</div>
<div id="ft">&nbsp;</div>
</div>
    
<script type="text/javascript" src="../js/yui-012.js"></script>
<script src="http://blog.davglass.com/files/yui/js/dpSyntaxHighlighter.js"></script>
<script type="text/javascript">
function init() {
    dp.SyntaxHighlighter.HighlightAll('code'); 
}

YAHOO.util.Event.addListener(window, 'load', init);

</script>
</body>
</html>
