<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }
if ($modulhapus->rowCount() > 0)
{
$jumdata = $koneksi_db->prepare("SELECT id, folder, file FROM ".$namadepan."agenda WHERE id = ?");
$jumdata->execute(array($_GET['id']));
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
if ($jumdata->rowCount() > 0)
{
$rjumdata = $jumdata->fetch();
$koneksi_db->prepare("DELETE FROM ".$namadepan."agenda WHERE id = ?")->execute(array($_GET['id']));
if(file_exists("../userfiles/images/agenda/".$rjumdata['folder'].$rjumdata['file']))
unlink("../userfiles/images/agenda/".$rjumdata['folder'].$rjumdata['file']);
if(file_exists("../userfiles/images/agenda/".$rjumdata['folder']."besak/".$rjumdata['file']))
unlink("../userfiles/images/agenda/".$rjumdata['folder']."besak/".$rjumdata['file']);
if(file_exists("../userfiles/images/agenda/".$rjumdata['folder']."kecik/".$rjumdata['file']))
unlink("../userfiles/images/agenda/".$rjumdata['folder']."kecik/".$rjumdata['file']);

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