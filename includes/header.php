<?php
defined('_JCMS_') or header('Location: ../');
include("dictionary/bhs_".$bhs.".php");

if(!isset($judulwebsite))
	$judulwebsite = '';


$metatitle = $judulwebsite;
if(!isset($urlfront))
	$urlfront = '';
$linkimgsrc = $urlfront."gbr/logo.jpg";
//include "includes/agent.$extfile";

if(isset($_GET['plgmodul']))
{
	$sth = $dbh->prepare("select lengkap,slug_".$bhs." slug from ".$namadepan."modul where nama = '".$_GET['plgmodul']."'");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	$modulx = $sth->fetch();	
	$slug = $modulx['slug'];

 


$judulmodul = $modulx['lengkap']; 
if(isset($_GET['fid']) or isset($_GET['pid']) or isset($_GET['bid']) or isset($_GET['hid']) or isset($_GET['tid']) or isset($_GET['did']) or (isset($_GET['b']) and isset($_GET['t']) and isset($_GET['h'])))
{

if(file_exists("modules/".$_GET['plgmodul']."/breadcumb.php"))
{
include("modules/".$_GET['plgmodul']."/breadcumb.php");
$judulmodulbesak = $judulsubmodul;
if ($_GET['plgmodul'] == 'halaman')
{
$judulmodulbreadcumbs = "<li>$judulsubmodul</li>";
}
else if ($_GET['plgmodul'] == 'kalender')
$judulmodulbreadcumbs = "<li><a href=\"/".$slug."\">$judulmodul</a></li><div class=\"divider\"> / </div><li>$_GET[h] ".namabulan($_GET['b'])." $_GET[t]</li>";
else if ($_GET['plgmodul'] == 'news')
$judulmodulbreadcumbs = "<li><a href=\"/".$slug."\">$judulmodul</a></li>";
else
$judulmodulbreadcumbs = "<li><a href=\"/".$slug."\">$judulmodul</a></li><div class=\"divider\"> / </div><li>$judulsubmodul</li>";
}
else
	$judulmodulbreadcumbs = "<li><a href=\"/".$slug."\">$judulmodul</a></li>";

	}
else
{
$judulmodulbesak = $modulx['lengkap'];
if ($_GET['plgmodul'] == 'directory' and isset($_GET['cari']))
{
$judulmodulbreadcumbs = "<li><a href=\"/".$slug."\">$judulmodul</a></li><li>Pencarian Direktori</li>";
}
else if ($_GET['plgmodul'] == 'documents' and isset($_GET['cari']))
{
$judulmodulbreadcumbs = "<li><a href=\"/".$slug."\">$judulmodul</a></li><li>Pencarian Dokumen</li>";
}
else
$judulmodulbreadcumbs = "<li>$judulmodul</li>";
}
}

?>
<!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="expires" content="0" />
	<meta name="robots" content="index,follow" />
	<meta name="resource-type" content="document" />
	<meta name="author" content="MRY" />
	<meta name="copyright" content="Copyright (c) 2015 by Jeramba" />
	<meta name="revisit-after" content="1 days" />
	<meta name="distribution" content="Global" />
	<meta name="generator" content="JerambaCMS - http://www.jeramba.com/" />
	<meta name="rating" content="General" />
	<meta name="medium" content="news" />
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>     
    <!-- Global CSS -->
    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/assets/plugins/flexslider/flexslider.css">
    <link rel="stylesheet" href="/assets/plugins/pretty-photo/css/prettyPhoto.css"> 
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="/assets/css/styles.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="css/html5shiv.js"></script>
      <script src="css/respond.min.js"></script>
    <![endif]-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-24707561-9', '3rdwavemedia.com');
      ga('send', 'pageview');
    
    </script>
<?php
//include "javascript/ddsmothmenu.php";
//include "javascript/waktusekarang.php";


$body = "onload=\"startclock();\"";

?>
