<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }
if ($modulhapus->rowCount() > 0)
{
$jumdata = $koneksi_db->prepare("SELECT id FROM ".$namadepan."pengumuman WHERE id = ?");
$jumdata->execute(array($_GET['id']));
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
if ($jumdata->rowCount() > 0)
{
$rjumdata = $jumdata->fetch();
$koneksi_db->prepare("DELETE FROM ".$namadepan."pengumuman WHERE id = ?")->execute(array($_GET['id']));

$file = $koneksi_db->prepare("SELECT id, file, folder FROM ".$namadepan."pengumuman_file WHERE pengumuman = ?");
$file->execute(array($rjumdata['id']));
$file->setFetchMode(PDO::FETCH_ASSOC);
if ($file->rowCount() > 0)
{
while($rfile = $file->fetch()) {
if(file_exists("../userfiles/images/pengumuman/".$rfile['folder'].$rfile['file']))
unlink("../userfiles/images/pengumuman/".$rfile['folder'].$rfile['file']);
$koneksi_db->prepare("DELETE FROM ".$namadepan."pengumuman_file WHERE id = ?")->execute(array($rfile['id']));
}
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