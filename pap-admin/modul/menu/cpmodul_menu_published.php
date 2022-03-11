<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modulubah->rowCount() > 0)
{
$jumdata = $dbh->prepare("SELECT id, published FROM ".$namadepan."pengumuman WHERE id = '$_GET[id]'");
$jumdata->execute();
$jumdata->setFetchMode(PDO::FETCH_ASSOC);

if ($jumdata->rowCount() > 0)
{
$rjumdata = $jumdata->fetch();
if ($rjumdata[published] == 'y')
{
$pubpengumuman = $dbh->prepare("UPDATE ".$namadepan."pengumuman SET published = 't', whoubah = '$_SESSION[sesi_user]' , whereubah = '$ipnyo', whenubah = now() WHERE id = '$_GET[id]'");
$pubpengumuman->execute();


}
else
{
$pubpengumuman = $dbh->prepare("UPDATE ".$namadepan."pengumuman SET published = 'y', whoubah = '$_SESSION[sesi_user]' , whereubah = '$ipnyo', whenubah = now() WHERE id = '$_GET[id]'");
$pubpengumuman->execute();


}
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