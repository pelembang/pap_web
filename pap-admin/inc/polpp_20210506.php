<?php
include "inc/database.php";
function otentikasi($pemakai, $password)
{
global $koneksi_db, $namadepan;
$polpp = $koneksi_db->prepare("SELECT kode FROM `".$namadepan."syspemakai` WHERE `id` = ? AND `aktif` = ?");
$naktahube = md5($password);
$polpp->execute(array($_POST['pemakai'],'y'));
$polpp->setFetchMode(PDO::FETCH_ASSOC);
$satpolpp = $polpp->fetch();

if ($satpolpp['kode'] == $naktahube)
return TRUE;
else
return FALSE;
}
?>
