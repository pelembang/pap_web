<?php
defined('_JCMS_') or header('Location: ../');

$sth = $dbh->prepare("select label,value from ".$namadepan."datamaster where kat = ? order by urut asc");
	$sth->execute(array('pengaturan'));
	$sth->setFetchMode(PDO::FETCH_ASSOC);


while($ptr = $sth->fetch())
{
$valptr = $ptr['value'];
$labptr = $ptr['label'];
$pengaturan[$labptr] = $valptr;
}


$languange = $pengaturan['bahasa'];
$urlweb = $pengaturan['url'];

$btsberita = 3;
$btsagenda = 5;
$btsgaleri = 5;
$btspengumuman = 5;



$jbksmarquee = 6;

?>
