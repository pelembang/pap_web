<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }
if ($modulhapus->rowCount() > 0)
{
$jumdata = $koneksi_db->prepare("SELECT id FROM ".$namadepan."pengelola WHERE id = ?");
$jumdata->execute(array($_GET['id']));
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
if ($jumdata->rowCount() > 0)
{
$rjumdata = $jumdata->fetch();
$koneksi_db->prepare("DELETE FROM ".$namadepan."pengelola WHERE id = ?")->execute(array($_GET['id']));
if(file_exists("../userfiles/images/pengelola/".$rjumdata['id'].".jpg"))
unlink("../userfiles/images/pengelola/".$rjumdata['id'].".jpg");

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