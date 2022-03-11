<?php
defined('_JCMS_') or header('Location: ../../');
global $namadepan, $dbh, $metatitle, $metadesc,  $judulmodul, $linktargeturl, $judulwebsite, $btsberita, $judulmodulbesak, $judulmodulbreadcumbs, $pathurl, $bhs;
$namamodul = basename(dirname(__FILE__));

/// $bhs = $_GET['bhs'];
//setcookie('bhs', $bhs, time() + (86400 * 30), $pathurl);
/// setcookie('bhs', $bhs, 0, $pathurl);
/// $_COOKIE['bhs'] = $bhs;

///$isibloknyo = $bhs." ".$_GET['bhs']." ".$_COOKIE['bhs'];

$modul = $dbh->prepare("SELECT slug_".$bhs." slug, lengkap_".$bhs." lengkap FROM `".$namadepan."modul` WHERE nama = ?");
$modul->execute(array($namamodul));
$modul->setFetchMode(PDO::FETCH_ASSOC);
$rmod = $modul->fetch();
$mod = $rmod['slug'];
$modlengkp = $rmod['lengkap'];

$home = "";
$judul = $modlengkp;

 $oleh=""; $waktu=""; $file="";$sumber="";$kutipan=""; $kategori=""; $kategoriid=""; $katid="";




	if (isset($_GET['pdid']))
{
$modprodi = $dbh->prepare("SELECT p.id, p.nama_".$bhs." nama, p.akreditasi, p.singkatan, p.lama, p.pengantar_".$bhs." pengantar
, p.visimisi_".$bhs." visimisi, p.sejarah_".$bhs." sejarah, p.so, p.info_akreditasi infoakreditasi, p.dosen,
 p.mhs, p.alumni, p.kurikulum_".$bhs." kurikulum FROM ".$namadepan."prodi p where p.slug_".$bhs." = '$_GET[pdid]'");
$modprodi->execute();
$modprodi->setFetchMode(PDO::FETCH_ASSOC);

if ($modprodi->rowCount() > 0)
{
$rmodprodi = $modprodi->fetch();
$idprodi = $rmodprodi['id'];
$nama =$rmodprodi['nama'];
$akreditasi =$rmodprodi['akreditasi'];
$singkatan =$rmodprodi['singkatan'];
$lama =$rmodprodi['lama'];
$pengantar =$rmodprodi['pengantar'];
$visimisi =$rmodprodi['visimisi'];
$sejarah =$rmodprodi['sejarah'];
$so =$rmodprodi['so'];
$infoakreditasi =$rmodprodi['infoakreditasi'];
$dosen =$rmodprodi['dosen'];
$mhs =$rmodprodi['mhs'];
$alumni =$rmodprodi['alumni'];
$kurikulum =$rmodprodi['kurikulum'];

$modulpengumuman = $dbh->prepare("SELECT slug_".$bhs." slug, lengkap_".$bhs." lengkap FROM `".$namadepan."modul` WHERE nama = ?");
$modulpengumuman->execute(array($namamodul));
$modulpengumuman->setFetchMode(PDO::FETCH_ASSOC);
$rmodpengumuman = $modulpengumuman->fetch();
$modpengumumanx = $rmodpengumuman['slug'];

$modpengumuman = $dbh->prepare("SELECT `p`.`id`, `p`.`file`,`p`.`whenentri`, `p`.`judul_".$bhs."` judul, `p`.`whenentri` FROM `".$namadepan."pengumuman` `p`  WHERE `p`.`published` = 'y' and prodi = ".$idprodi." ORDER BY `whenentri`   DESC");
$modpengumuman->execute();
$modpengumuman->setFetchMode(PDO::FETCH_ASSOC);
$modpengumumanlengkap = $dbh->prepare("SELECT `p`.`id` FROM `".$namadepan."pengumuman` `p` WHERE `p`.`published` = 'y'");
$modpengumumanlengkap->execute();
$modpengumumanlengkap->setFetchMode(PDO::FETCH_ASSOC);
$totalpengumuman = $modpengumumanlengkap->rowCount();

$isibloknyo = '<div class="container">
             
<!-- blog grid -->';
	
if ($modpengumuman->rowCount() > 0)
{
$urut = 1;
$isibloknyo .= '<div id="masonry" class="dlab-blog-grid-3 row">';
while($rmodpengumuman = $modpengumuman->fetch())
{
$judulpengumuman = $rmodpengumuman['judul'];

$kutipan = $rmodpengumuman['kutipan'];
$tanggal = "<strong>".substr($rmodpengumuman['whenentri'],8,2)." ".namabulansingkat(substr($rmodpengumuman['whenentri'],5,2))."</strong> <span> ".substr($rmodpengumuman['whenentri'],0,4)."</span>";
$id = $rmodpengumuman['id'];
$judulid = $judulpengumuman;
$gambarkecik = $rmodpengumuman['file'];
if (empty($gambarkecik) || !file_exists("userfiles/images/$rmodpengumuman[file]"))
	$gambarkecik = $pathurl."/images/pengumuman.jpg";
else
	$gambarkecik = $pathurl."/userfiles/images/$rmodpengumuman[file]";

$isibloknyo .= '

	<div class="post card-container col-xl-6 col-lg-6 col-md-6 col-sm-6">
		<div class="blog-post blog-grid blog-rounded blog-effect1">
			
			<div class="dlab-info p-a20">
				<div class="dlab-post-meta">
					<ul>
						<li class="post-author"> <i class="la la-user-circle"></i> By <a href="javascript:void(0);">Reuben</a> </li>
						<li class="post-tag"> <a href="javascript:void(0);">Event</a> </li>
					</ul>
				</div>
				<div class="dlab-post-title">
					<h5 class="post-title text-truncate-2a"><a href="'.$pathurl.'/'.$bhs.'/'.$modpengumumanx.'/'.sanitize_title_with_dashes($judulid).'">'.$judulpengumuman.'</a></h5>
				</div>
			
				<div class="post-footer">
					<div class="dlab-post-meta">
						<ul>
							<li class="post-date"> <i class="la la-clock"></i> '.$tanggal.' </li>
						</ul>
					</div>
					
				</div>
			</div>
		</div>
	</div>

';




$urut++;
}
$isibloknyo .= '</div>';
//if ($last_page > 1)
//$isibloknyo .= _HALAMANPG_." $page "._DARIPG_." $last_page";

}
else
{
$isibloknyo .= '<div class="col-lg-12 col-md-12 col-sm-12 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
<div class="alert alert-warning no-bg text-center"> <strong>Mohon maaf,</strong> pengumuman belum ada. </div>
</div>';
}

$isibloknyo .= '</div>';

$pengumuman = $isibloknyo;
$metatitle = $judulmodul.$judulwebsite;
if(!isset($rmodprodi['kutipan']))
	$rmodprodi['kutipan'] = '';

$metadesc = strip_tags($rmodprodi['kutipan']);

$oleh = $dbh->prepare("SELECT `nama` FROM `".$namadepan."syspemakai` WHERE `id` = '$rmodprodi[whoentri]'");
$oleh->execute();
$oleh->setFetchMode(PDO::FETCH_ASSOC);
$roleh = $oleh->fetch();
if(!isset($rmodprodi['whenentri']))
	$rmodprodi['whenentri'] = '';
$oleh = $roleh['nama'];
$waktu = $rmodprodi['tanggal']." ".namabulan($rmodprodi['bulan'])." ".$rmodprodi['tahun']." ".$rmodprodi['waktu']." "._WIB_;


					if(empty($rmodprodi['file']))
$file = "";
else
$file = '

									<img src="'.$pathurl.'/userfiles/images/'.$rmodprodi['file'].'" alt="'.$judul.'">
								


';
$sumber = $rmodprodi['sumber'];
if (empty($rmodprodi['tempat']))
$tempat = "";
else
$tempat = "<b>".$rmodprodi['tempat']." - </b>";
$kutipan = $rmodprodi['kutipan'];
$isibloknyo =  $rmodprodi['isi'];

}
else
{
header("HTTP/1.0 404 Not Found");
header( 'Location: '.$pathurl.'/404' ) ;
exit;

}
}
else
{

$namamod = $dbh->prepare("SELECT lengkap_".$bhs." lengkap FROM `".$namadepan."modul` WHERE nama = ?");
$namamod->execute(array($namamodul));
$namamod->setFetchMode(PDO::FETCH_ASSOC);
$rnamamod = $namamod->fetch();



 $nama = $rnamamod['lengkap'];
 $akreditasi = "";
 $singkatan = "";
 $lama = "";
 $pengantar = "";
 $visimisi = "";
 $sejarah = "";
 $so = "";
 $infoakreditasi = "";
 $dosen = "";
 $mhs = "";
 $alumni = "";
 $kurikulum = "";
 $pengumuman = "";

// paging mulai
$PAGE_DEFAULT = 1;
$PAGESIZE_DEFAULT = 8;
$PAGESIZE_LOWER_LIMIT = 8;
$PAGESIZE_UPPER_LIMIT = 100;
$page = $_GET['hal'];
if (!isset($page)) $page = $PAGE_DEFAULT;
if ($page < 1 ) $page = 1;
if (!isset($pagesize)) $pagesize = $PAGESIZE_DEFAULT;
if ($pagesize < $PAGESIZE_LOWER_LIMIT)
$pagesize = $PAGESIZE_LOWER_LIMIT;
if ($pagesize > $PAGESIZE_UPPER_LIMIT)
$pagesize = $PAGESIZE_UPPER_LIMIT;

$sth = $dbh->prepare("SELECT count(`p`.`id`) FROM `".$namadepan."prodi` `p`  WHERE `p`.`published` = 'y'");
$sth->execute();
$sth->setFetchMode(PDO::FETCH_ASSOC);
list($total_rows) = $sth->fetch();

$count = $pagesize;
$offset = ($page-1) * $pagesize;
$last_page      = ceil($total_rows/$pagesize);
if ($_GET['hal'] > $last_page){
$page = $last_page;
$offset = ($page-1) * $pagesize;
}

$adjacent_pages_links = ($page > 6 ? "<li><a href=\"".$pathurl."/".$bhs."/".$mod."/halaman/1\">1</a></li><li> <a>...</a> </li>" : "");
for ($i=$page-5; $i<$page; $i++) {
if ($i < 1) continue;
$adjacent_pages_links .= " ".
"<li><a href=\"".$pathurl."/".$mod."/halaman/$i\">$i</a></li>";
}
$adjacent_pages_links .= "<li class=\"active\"><a>$page</a></li>";
for ($i=$page+1; $i<($page+6); $i++) {
if ($i > $last_page) break;
$adjacent_pages_links .= " ".
"<li><a href=\"".$pathurl."/".$mod."/halaman/$i\">$i</a></li>";
}
$adjacent_pages_links .= ($page+5 < $last_page ? "<li> <a>...</a> </li><li><a href=\"".$pathurl."/".$mod."/$last_page\">$last_page</a></li>" : "");
$navigasi = '<ul class="pagination blog-pagination align-items-center justify-content-center mb-55" data-animate="fadeInUp" data-delay=".1">' .
($page == 1 ? "" : "<li><a href=\"".$pathurl."/".$mod."/halaman/1\"><<</a></li>").
($page == 1 ? "" : "<li><a href=\"".$pathurl."/".$mod."/halaman/".($page-1)."\"><</a></li>").
"<li>$adjacent_pages_links</li>".($page == $last_page ? "" : "<li><a href=\"".$pathurl."/".$mod."/halaman/".($page+1)."\">></a></li>").
($page == $last_page ? "" : "<li><a href=\"".$pathurl."/".$mod."/halaman/$last_page\">>></a></li>")."</ul>";
		
 

$modprodi = $dbh->prepare("SELECT `p`.`id`, `p`.`file`,`p`.`whenentri`, `p`.`judul_".$bhs."` judul, `p`.`whenentri` FROM `".$namadepan."prodi` `p`  WHERE `p`.`published` = 'y' ORDER BY `whenentri`   DESC LIMIT $offset,$count");
$modprodi->execute();
$modprodi->setFetchMode(PDO::FETCH_ASSOC);
$modprodilengkap = $dbh->prepare("SELECT `p`.`id` FROM `".$namadepan."prodi` `p` WHERE `p`.`published` = 'y'");
$modprodilengkap->execute();
$modprodilengkap->setFetchMode(PDO::FETCH_ASSOC);
$totalprodi = $modprodilengkap->rowCount();

$isibloknyo .= '<div class="container">
             
<!-- blog grid -->';
	
if ($modprodi->rowCount() > 0)
{
$urut = 1;
$isibloknyo .= '<div id="masonry" class="dlab-blog-grid-3 row">';
while($rmodprodi = $modprodi->fetch())
{
$judulprodi = $rmodprodi['judul'];

$kutipan = $rmodprodi['kutipan'];
$tanggal = "<strong>".substr($rmodprodi['whenentri'],8,2)." ".namabulansingkat(substr($rmodprodi['whenentri'],5,2))."</strong> <span> ".substr($rmodprodi['whenentri'],0,4)."</span>";
$id = $rmodprodi['id'];
$judulid = $judulprodi;
$gambarkecik = $rmodprodi['file'];
if (empty($gambarkecik) || !file_exists("userfiles/images/$rmodprodi[file]"))
	$gambarkecik = $pathurl."/images/prodi.jpg";
else
	$gambarkecik = $pathurl."/userfiles/images/$rmodprodi[file]";

$isibloknyo .= '

	<div class="post card-container col-xl-3 col-lg-4 col-md-6 col-sm-6">
		<div class="blog-post blog-grid blog-rounded blog-effect1">
			<div class="dlab-post-media dlab-img-effect"> 
				<a href="'.$pathurl.'/'.$bhs.'/'.$mod.'/'.sanitize_title_with_dashes($judulid).'"><img src="'.$pathurl.'/images/blog/grid/pic2.jpg" alt=""></a> 
			</div>
			<div class="dlab-info p-a20">
				<div class="dlab-post-meta">
					<ul>
						<li class="post-author"> <i class="la la-user-circle"></i> By <a href="javascript:void(0);">Reuben</a> </li>
						<li class="post-tag"> <a href="javascript:void(0);">Event</a> </li>
					</ul>
				</div>
				<div class="dlab-post-title">
					<h5 class="post-title text-truncate-2a"><a href="'.$pathurl.'/'.$bhs.'/'.$mod.'/'.sanitize_title_with_dashes($judulid).'">'.$judulprodi.'</a></h5>
				</div>
			
				<div class="post-footer">
					<div class="dlab-post-meta">
						<ul>
							<li class="post-date"> <i class="la la-clock"></i> '.$tanggal.' </li>
						</ul>
					</div>
					
				</div>
			</div>
		</div>
	</div>

';




$urut++;
}
$isibloknyo .= '</div>';
//if ($last_page > 1)
//$isibloknyo .= _HALAMANPG_." $page "._DARIPG_." $last_page";

}
else
{
$isibloknyo .= '<div class="col-lg-12 col-md-12 col-sm-12 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
<div class="alert alert-warning no-bg text-center"> <strong>Mohon maaf,</strong> Prodi belum ada. </div>
</div>';
}

$isibloknyo .= '</div>';
						if ($total_rows > $PAGESIZE_LOWER_LIMIT)
$isibloknyo .= $navigasi;




                      /*  <!-- Pagination -->
<div class="pagination-bx rounded-sm primary clearfix col-md-12 text-center">
	<ul class="pagination">
		<li class="previous"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> Prev</a></li>
		<li class="active"><a href="javascript:void(0);">1</a></li>
		<li><a href="javascript:void(0);">2</a></li>
		<li><a href="javascript:void(0);">3</a></li>
		<li class="next"><a href="javascript:void(0);">Next <i class="ti-arrow-right"></i></a></li>
	</ul>
 
<!-- Pagination END -->
 */
                    $isibloknyo .= '</div>
                </div>
                
                
                <!-- End of Sidebar -->
            </div>
        </div>
    </section>';
}
$isi = $isibloknyo;
?>
