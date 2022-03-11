<?php
defined('_JCMS_') or header('Location: ../../');
global $pathurl, $dbh;
$sth = $dbh->prepare("SELECT `waktu`, `waktuawal`, `waktuakhir`, `judul` FROM `".$namadepan."tulisanberjalan` WHERE `aktif` = 'y' ORDER BY `ordering` ASC");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
$harini =  date("Y-m-d");
if ($sth->rowCount() > 0)
{
echo "<div class=\"c-content-box\"><p><marquee scrollamount=\"2\" scrolldelay=\"1\" height=\"25\" id=\"runningtext\" onMouseOver=\"document.all.runningtext.stop()\" onMouseOut=\"document.all.runningtext.start()\">&nbsp;<img src=\"".$pathurl."/img/logokecik.png\" height=\"16\" width=\"16\" class=\"logomarquee\">&nbsp;\n";
while($rtls = $sth->fetch()) {

$tulisannyo = ($rtls['judul']);
if ($rtls['waktu'] == 'y')
{
if ($harini >= $rtls[waktuawal] AND  $harini <= $rtls[waktuakhir])
{
echo "<span><b>$tulisannyo</b></span>&nbsp;\n";
}
}
else
{
echo "<span><b>$tulisannyo</b></span>&nbsp;\n";
}
}
echo "</marquee></p></div>\n";
}
?>
