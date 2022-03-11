<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }
if ($modulhapus->rowCount() > 0)
{
$jumdata = $koneksi_db->prepare("SELECT id, so, info_akreditasi FROM ".$namadepan."prodi WHERE id = ?");
$jumdata->execute(array($_GET['id']));
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
if ($jumdata->rowCount() > 0)
{
$rjumdata = $jumdata->fetch();
$koneksi_db->prepare("DELETE FROM ".$namadepan."prodi WHERE id = ?")->execute(array($_GET['id']));
if(file_exists("../userfiles/images/prodi/".$rjumdata['so']))
unlink("../userfiles/images/prodi/".$rjumdata['so']);
if(file_exists("../userfiles/images/prodi/".$rjumdata['info_akreditasi']))
unlink("../userfiles/images/prodi/".$rjumdata['info_akreditasi']);

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