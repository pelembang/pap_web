<?php
defined('_JCMS_') or header('Location: ../../');
global $namadepan, $koneksi_db, $metatitle, $metadesc,  $judulmodul, $linktargeturl, $judulwebsite, $btsberita, $kategori, $katid, $kategoriid;
$namamodul = basename(dirname(__FILE__));

if (isset($_GET['bid']))
{
$modberita = $koneksi_db->sql_query("SELECT `b`.`id`, `b`.`judul`,  `b`.`isi`,`b`.`kutipan`, `b`.`whoentri`, substr(`b`.`whenentri`,1,4) tahun,substr(`b`.`whenentri`,6,2) bulan ,substr(`b`.`whenentri`,9,2) tanggal,substr(`b`.`whenentri`,12,8) waktu, `b`.`file`, `b`.`sumber`, `b`.`tempat`, `k`.`kategori`, `k`.`id` `katid` FROM `".$namadepan."berita` `b` ,`".$namadepan."beritakategori` `k`, `".$namadepan."kategoriberita` `kb` where `kb`.`berita` = `b`.`id` and `k`.`id` = `kb`.`kategori` and `b`.`published` = 'y' AND `b`.`id` = '$_GET[bid]'");
if ($koneksi_db->sql_numrows($modberita) > 0)
{
$rmodberita = $koneksi_db->sql_fetchrow($modberita);
$judul = $rmodberita[judul];
$metatitle = $judulmodul.$judulwebsite;
if(!isset($rmodberita['kutipan']))
	$rmodberita['kutipan'] = '';

$metadesc = strip_tags($rmodberita['kutipan']);

$oleh = $koneksi_db->sql_query("SELECT `nama` FROM `".$namadepan."syspemakai` WHERE `id` = '$rmodberita[whoentri]'");
$roleh = $koneksi_db->sql_fetchrow($oleh);
if(!isset($rmodberita['whenentri']))
	$rmodberita['whenentri'] = '';
$oleh = $roleh[nama];
$waktu = $rmodberita[tanggal]." ".namabulan($rmodberita[bulan])." ".$rmodberita[tahun]." ".$rmodberita[waktu]." "._WIB_;

$kategori = $rmodberita[kategori];
$katid = $rmodberita[katid];
$kategoriid = sanitize_title_with_dashes($rmodberita[kategori]);
if(empty($rmodberita[file]))
$file = "";
else
$file = '<div class="post-image">
												<img src="/assets/images/news/besak/'.$rmodberita[file].'" alt="">
											</div>';
$sumber = $rmodberita[sumber];
if (empty($rmodberita[tempat]))
$tempat = "";
else
$tempat = "<b>$rmodberita[tempat] - </b>";
$kutipan = stripslashes("$rmodberita[kutipan]\n");
$isiberita =  stripslashes("$rmodberita[isi]\n");
$isibloknyo .= '<!-- POST DETAIL PAGE : begin -->
								<div class="post-page post-detail-page">

									<!-- POST : begin -->
									<div class="post">
										<div class="post-inner c-content-box m-no-padding">

											<!-- POST IMAGE : begin -->
											'.$file.'
											<!-- POST IMAGE : end -->

											<!-- POST CORE : begin -->
											<div class="post-core">

												<!-- POST CONTENT : begin -->
												<div class="post-content">
													<div class="post-content-inner">

														<p>'.$tempat.$kutipan.'</p>
														'.$isiberita.'

													</div>
												</div>
												<!-- POST CONTENT : end -->

											</div>
											<!-- POST CORE : end -->

											<!-- POST FOOTER : begin -->
											<div class="post-footer">
												<div class="post-footer-inner">

													<!-- POST INFO : begin -->
													<div class="post-info">
														<i class="ico tp tp-clock2"></i>

														<!-- POST DATE : begin -->
														<span class="post-date">
															'.$waktu.' oleh : '.$oleh.'
														</span>
														<!-- POST DATE : end -->

														

													</div>
													<!-- POST INFO : end -->

													<!-- POST TAGS : begin -->
													<div class="post-tags">
														
														<i class="ico tp tp-tags"></i><a href="#">'.$kategori.'</a>
													</div>
													<!-- POST TAGS : end -->

												</div>
											</div>
											<!-- POST FOOTER : end -->

										</div>
									</div>
									<!-- POST : end -->

									

								</div>
								<!-- POST DETAIL PAGE : end -->
';


if (empty($rmodberita[sumber]))
$sumber = "";
else
$sumber = "<b>Sumber : </b> $rmodberita[sumber]";
}
else
header("Location: /berita");
}
else
{
$judul = "Berita";
$brt = $koneksi_db->sql_query("SELECT b.`judul`, b.`kutipan`, b.`id`, b.`file`, substr(b.`whenentri`,1,4) tahun,substr(b.`whenentri`,6,2) bulan ,substr(b.`whenentri`,9,2) tanggal,substr(b.`whenentri`,12,8) waktu,`k`.`kategori`  FROM `".$namadepan."berita` b, `".$namadepan."beritakategori` `k`, `".$namadepan."kategoriberita` `kb` where `kb`.`berita` = `b`.`id` and `k`.`id` = `kb`.`kategori` and b.`published` = 'y' ORDER BY b.`tanggal` DESC ");
$isibloknyo .=  '<!-- POST LIST PAGE : begin -->
								<div class="post-page post-list-page">';

while($rbrt = $koneksi_db->sql_fetchrow($brt))
{
if (empty($rbrt[file]))
$filenyo = "/gbr/berita.jpg";
else
$filenyo = "/assets/images/news/kecik/$rbrt[file]";
	


											$isibloknyo .= '<!-- POST : begin -->
									<article class="post">
										<div class="post-inner c-content-box m-no-padding">

											<!-- POST IMAGE : begin -->
											<div class="post-image">
												<a href="post-detail.html"><img src="'.$filenyo.'" alt=""></a>
											</div>
											<!-- POST IMAGE : end -->

											<!-- POST CORE : begin -->
											<div class="post-core">

												<!-- POST TITLE : begin -->
												<h2 class="post-title"><a href="/berita/'.$rbrt[id].'/'.sanitize_title_with_dashes($rbrt[judul]).'">'.$rbrt[judul].'</a></h2>
												<!-- POST TITLE : end -->

												<!-- POST CONTENT : begin -->
												<div class="post-content">
													<div class="post-content-inner">
														<p>'.$rbrt[kutipan].'</p>
													</div>
												</div>
												<!-- POST CONTENT : end -->

											</div>
											<!-- POST CORE : end -->

											<!-- POST FOOTER : begin -->
											<div class="post-footer">
												<div class="post-footer-inner">

													<!-- POST INFO : begin -->
													<div class="post-info">
														<i class="ico tp tp-clock2"></i>

														<!-- POST DATE : begin -->
														<span class="post-date">
															'.$rbrt[tanggal].' '.namabulan($rbrt[bulan]).' '.$rbrt[tahun].' '.$rbrt[waktu].' WIB Kategori : <a href="#">'.$rbrt[kategori].'</a>
														</span>
														<!-- POST DATE : end -->

													</div>
													<!-- POST INFO : end -->

												</div>
											</div>
											<!-- POST FOOTER : end -->

										</div>
									</article>
									<!-- POST : end -->


								
';

	

	
	



	}
	$isibloknyo .= '</div>
								<!-- POST LIST PAGE : end -->';

}
?>
