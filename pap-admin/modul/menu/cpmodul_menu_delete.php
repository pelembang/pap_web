<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }
if ($modulhapus->rowCount() > 0)
{
$jumdata = $dbh->prepare("SELECT id,ordering FROM ".$namadepan."tulisanberjalan WHERE id = '$_GET[id]'");
$jumdata->execute();
$jumdata->setFetchMode(PDO::FETCH_ASSOC);

if ($jumdata->rowCount() > 0)
{
$rjumdata = $jumdata->fetch();
$orderbesak = $dbh->prepare("select id from ".$namadepan."tulisanberjalan where ordering > '$rjumdata[ordering]'");
$orderbesak->execute();
$orderbesak->setFetchMode(PDO::FETCH_ASSOC);

while ($robesak = $orderbesak->fetch())
{
$ubahorder = $dbh->prepare("update ".$namadepan."tulisanberjalan set ordering= '$rjumdata[ordering]' where id = '$robesak[id]'");
$ubahorder->execute();


$rjumdata[ordering]++;
}
$hpsgambardepan = $dbh->prepare("DELETE FROM ".$namadepan."tulisanberjalan WHERE id = '$_GET[id]'");
$hpsgambardepan->execute();


header ("Location: ?cpmodul=$namamodul");
}
else
{
header ("Location: ?cpmodul=$namamodul");
}
}
else
header ("Location: ?cpmodul=$namamodul");
?>