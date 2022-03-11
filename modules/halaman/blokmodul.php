<?php
defined('_JCMS_') or header('Location: ../../');
global $namadepan, $judulwebsite, $linktargeturl, $metatitle, $metadesc, $koneksi_db, $judulmodul,$pathurl,$dbh, $bhs;
$namamodul = basename(dirname(__FILE__));
$home = _BERANDA_;
if (isset($_SESSION['sesi_user']) AND isset($_SESSION['sesi_pass']))
{
	$publishedyand = "";
		$publishedy = "";
		}
	else
	{
		$publishedyand = "`published` = 'y' AND";
$publishedy = "WHERE `published` = 'y'";

		
		
	}
	$hid = $_GET['hid'];
if (isset($_GET['hid']))
{
$modhal= $dbh->prepare("SELECT `judul_".$bhs."` judul, `isi_".$bhs."` isi, permalink_".$bhs." judulid , `whoentri`, `whenentri` FROM `".$namadepan."halaman` WHERE $publishedyand `permalink_".$bhs."` = '$hid'");
$modhal->execute();
$modhal->setFetchMode(PDO::FETCH_ASSOC);

if ($modhal->rowCount() > 0)
{

$rmodhal = $modhal->fetch();
$judulhall = $rmodhal['judulid'];
$judul = $rmodhal['judul'];
$judulmodul = "$rmodhal[judul] - ";
$metatitle = $judulmodul.$judulwebsite;
$metadesc = $metatitle;



if(!isset($rmodhal['whenentri']))
	$rmodhal['whenentri'] = '';

$waktu = baliktgljam($rmodhal['whenentri'])." "._WIB_;


$paging = explode("<!-- pagebreak -->", $rmodhal['isi']);
$jpaging = count($paging);
if (!isset($navigasi))
	$navigasi = "";

if (!isset($_GET['hal']))
	$_GET['hal'] = '';
if ($_GET['hal'] > 0 AND $_GET['hal'] < $jpaging)
{
$hl = $_GET['hal'] - 1;
$hll = $hl + 1;
$hlsb = $hll - 1;
$hlsd = $hll + 1;

if ($hll == 1)
$navigasi .= "["._AWALPG_."] ["._SBLMPG_."] "._HALAMANPG_." $hll / $jpaging [<a href=\"?plgmodul=$namamodul&hal=$hlsd&judul=$judulhall\">"._SLNPG_."</a>] [<a href=\"?plgmodul=$namamodul&hal=$jpaging&judul=$judulhall\">"._AKHIRPG_."</a>]";
else
$navigasi .= "[<a href=\"?plgmodul=$namamodul&hal=1&judul=$judulhall\">"._AWALPG_."</a>] [<a href=\"?plgmodul=$namamodul&hal=$hlsb&judul=$judulhall\">"._SBLMPG_."</a>] "._HALAMANPG_." $hll / $jpaging [<a href=\"?plgmodul=$namamodul&hal=$hlsd&judul=$judulhall\">"._SLNPG_."</a>] [<a href=\"?plgmodul=$namamodul&hal=$jpaging&judul=$judulhall\">"._AKHIRPG_."</a>]";
}
else if ($_GET['hal'] >= $jpaging)
{
$hl = $jpaging - 1;
$hll = $hl + 1;
$hlsb = $hll - 1;
$navigasi .= "[<a href=\"?plgmodul=$namamodul&hal=1&judul=$judulhall\">"._AWALPG_."</a>] [<a href=\"?plgmodul=$namamodul&hal=$hlsb&judul=$judulhall\">"._SBLMPG_."</a>] "._HALAMANPG_." $hll / $jpaging ["._SLNPG_."] ["._AKHIRPG_."]";
}
else if ($jpaging == 1)
{
$hl = 0;
$navigasi .= "";
}
else
{
$hl = 0;
$hll = 1;
$hlsd = $hll + 1;
$navigasi .= "["._AWALPG_."] ["._SBLMPG_."] "._HALAMANPG_." $hll / $jpaging [<a href=\"?plgmodul=$namamodul&hal=$hlsd&judul=$judulhall\">"._SLNPG_."</a>] [<a href=\"?plgmodul=$namamodul&hal=$jpaging&judul=$judulhall\">"._AKHIRPG_."</a>]";
}
$isibloknyo .= "<p align=\"right\">$navigasi</p>\n";
$isibloknyo .= "<div class=\"c-content-box\">$paging[$hl]</div>";
$isibloknyo .= "<p align=\"right\">$navigasi</p>\n";
}
else
{
header("Location: $pathurl/");
}
}
else
{
header("Location: ../");
}
?>
