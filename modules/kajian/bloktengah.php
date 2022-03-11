<?php
defined('_JCMS_') or header('Location: ../../');
global $namadepan, $koneksi_db, $btsberita, $urlfotoberitakecik, $pathurl;
$sth = $dbh->prepare("SELECT `b`.`id`, `b`.`file`,`b`.`tanggal`, `b`.`judul`, `b`.`whenentri`, `b`.`kutipan` FROM `".$namadepan."berita` `b`  WHERE `b`.`published` = 'y' ORDER BY `tanggal`   DESC LIMIT $btsberita");
$sth2 = $dbh->prepare("SELECT `id` FROM `".$namadepan."berita` WHERE `published` = 'y'");
	$sth2->execute();
	$totalberita = $sth2->rowCount();
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	
if ($sth->rowCount() > 0)
{
$urut = 1;
while($rmodberita = $sth->fetch()) {	
	
$judulberita = $rmodberita['judul'];

$kutipan = $rmodberita['kutipan'];
$tanggal = namaharisingkat(date("N", strtotime($rmodberita['tanggal']))).", ".substr($rmodberita['tanggal'],8,2)." ".namabulansingkat(substr($rmodberita['tanggal'],5,2))." ".substr($rmodberita['tanggal'],0,4);
$id = $rmodberita['id'];
$gambarkecik = $rmodberita['file'];
if (empty($gambarkecik) || !file_exists("userfiles/images/$rmodberita[file]"))
	$gambarkecik = $pathurl."/images/berita.jpg";
else
	$gambarkecik = $pathurl."/userfiles/images/$rmodberita[file]";
blokberitatengah($judulberita, $kutipan, $tanggal, $gambarkecik, $topik, $id, sanitize_title_with_dashes($judulberita),$urut);

$urut++;
}



if ($totalberita > $btsberita)
{
echo '<div class="col-md-7 text-center text-md-start"><a href="'.$pathurl.'/kajian" class="button button-3d button-large">Kajian Lainnya</a></div>



';
}
}
else
{
echo "<p class=\"more-btn-holder\">"._DAKKATEKBERITA_."</p>\n";
}

?>

                    