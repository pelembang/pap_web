<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }
$namamodul = basename(dirname(__FILE__));
$modulread = $koneksi_db->prepare("SELECT ".$namadepan."syshakakses.modul FROM ".$namadepan."modul, ".$namadepan."syshakakses WHERE ".$namadepan."modul.published = 'y' AND ".$namadepan."modul.end = 'y' AND ".$namadepan."modul.nama = ".$namadepan."syshakakses.modul AND ".$namadepan."syshakakses.kelompok = $rusercp[kelompok] AND ".$namadepan."syshakakses.aktif = 'y' AND ".$namadepan."modul.nama = '$_GET[cpmodul]'");
$modulread->execute();
$modulread->setFetchMode(PDO::FETCH_ASSOC);
if ($modulread->rowCount() > 0)
{


$modultambah = $koneksi_db->prepare("SELECT ".$namadepan."syshakakses.modul FROM ".$namadepan."modul, ".$namadepan."syshakakses WHERE ".$namadepan."modul.published = 'y' AND ".$namadepan."modul.end = 'y' AND ".$namadepan."modul.nama = ".$namadepan."syshakakses.modul AND ".$namadepan."syshakakses.kelompok = $rusercp[kelompok] AND ".$namadepan."syshakakses.aktif = 'y' AND ".$namadepan."modul.nama = '$_GET[cpmodul]' AND ".$namadepan."syshakakses.tambah = 'y'");
$modultambah->execute();
$modultambah->setFetchMode(PDO::FETCH_ASSOC);
$modulubah = $koneksi_db->prepare("SELECT ".$namadepan."syshakakses.modul FROM ".$namadepan."modul, ".$namadepan."syshakakses WHERE ".$namadepan."modul.published = 'y' AND ".$namadepan."modul.end = 'y' AND ".$namadepan."modul.nama = ".$namadepan."syshakakses.modul AND ".$namadepan."syshakakses.kelompok = $rusercp[kelompok] AND ".$namadepan."syshakakses.aktif = 'y' AND ".$namadepan."modul.nama = '$_GET[cpmodul]' AND ".$namadepan."syshakakses.ubah = 'y'");
$modulubah->execute();
$modulubah->setFetchMode(PDO::FETCH_ASSOC);
$modulhapus = $koneksi_db->prepare("SELECT ".$namadepan."syshakakses.modul FROM ".$namadepan."modul, ".$namadepan."syshakakses WHERE ".$namadepan."modul.published = 'y' AND ".$namadepan."modul.end = 'y' AND ".$namadepan."modul.nama = ".$namadepan."syshakakses.modul AND ".$namadepan."syshakakses.kelompok = $rusercp[kelompok] AND ".$namadepan."syshakakses.aktif = 'y' AND ".$namadepan."modul.nama = '$_GET[cpmodul]' AND ".$namadepan."syshakakses.hapus = 'y'");
$modulhapus->execute();
$modulhapus->setFetchMode(PDO::FETCH_ASSOC);
$nmbln = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

if (isset($_GET['aksi']))
{
if ($_GET['aksi'] == 'tambah')
{
include("modul/$namamodul/cpmodul_".$namamodul."_create.php");
}
else if ($_GET['aksi'] == 'ubah')
{
include("modul/$namamodul/cpmodul_".$namamodul."_update.php");
}
else if ($_GET['aksi'] == 'hapus')
{
include("modul/$namamodul/cpmodul_".$namamodul."_delete.php");
}
else if ($_GET['aksi'] == 'buatuser')
{
include("modul/$namamodul/cpmodul_".$namamodul."_buatuser.php");
}
else if ($_GET['aksi'] == 'ngurutke')
{
if ($koneksi_db->sql_numrows($modulubah) > 0)
{
$jumdata = $koneksi_db->sql_query("SELECT id, ordering FROM ".$namadepan."gambardepan WHERE id = '$_GET[id]'");
if ($koneksi_db->sql_numrows($jumdata) > 0)
{

$ordergambardepan1 = $koneksi_db->sql_query("UPDATE ".$namadepan."gambardepan set ordering = '$_GET[ordert]' WHERE id = '$_GET[id]'");
$ordergambardepan2 = $koneksi_db->sql_query("UPDATE ".$namadepan."gambardepan set ordering = '$_GET[order]' WHERE id = '$_GET[idt]'");
header ("Location: ?cpmodul=$namamodul");
}
else
{
header ("Location: ?cpmodul=$namamodul");
}
}
else
header ("Location: ?cpmodul=$namamodul");
}
else if ($_GET[aksi] == 'published')
{
if ($koneksi_db->sql_numrows($modulubah) > 0)
{
$jumdata = $koneksi_db->sql_query("SELECT id, aktif FROM ".$namadepan."syspemakai WHERE id = '$_GET[id]'");
if ($koneksi_db->sql_numrows($jumdata) > 0)
{
$rjumdata = $koneksi_db->sql_fetchrow($jumdata);
if ($rjumdata[aktif] == 'y')
{
$koneksi_db->sql_query("UPDATE ".$namadepan."syspemakai SET aktif = 't' WHERE id = '$_GET[id]'");
}
else
{
$koneksi_db->sql_query("UPDATE ".$namadepan."syspemakai SET aktif = 'y' WHERE id = '$_GET[id]'");
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
}
else
{
header ("Location: ?cpmodul=$namamodul");
}
}
else
{
include("modul/$namamodul/cpmodul_".$namamodul."_lists.php");
}
}
else
{
header ("Location: .");
}
?>
