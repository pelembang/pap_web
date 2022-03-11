<?php
defined('_JCMS_') or header('Location: ../../');
global $namadepan, $dbh, $metatitle, $metadesc,  $judulmodul, $linktargeturl, $judulwebsite, $btsberita, $judulmodulbesak, $judulmodulbreadcumbs, $pathurl;
$namamodul = basename(dirname(__FILE__));
if (isset($_SESSION['sesi_user']) AND isset($_SESSION['sesi_pass']))
{
	$publishedyand = "";
		$publishedy = "";
		}
	else
	{
		$publishedyand = "`b`.`published` = 'y' AND";
$publishedy = "WHERE `b`.`published` = 'y'";

		
		
	}

	if (isset($_GET['bid']))
{
$modberita = $dbh->prepare("SELECT `b`.`id`, `b`.`judul`,  `b`.`isi`,`b`.`kutipan`, `b`.`whoentri`, substr(`b`.`whenentri`,1,4) tahun,substr(`b`.`whenentri`,6,2) bulan ,substr(`b`.`whenentri`,9,2) tanggal,substr(`b`.`whenentri`,12,8) waktu, `b`.`file`, `b`.`sumber`, `b`.`tempat` FROM `".$namadepan."berita` `b` where $publishedyand `b`.`id` = '$_GET[bid]'");
$modberita->execute();
$modberita->setFetchMode(PDO::FETCH_ASSOC);

if ($modberita->rowCount() > 0)
{
$rmodberita = $modberita->fetch();
$judul = $rmodberita[judul];
$metatitle = $judulmodul.$judulwebsite;
if(!isset($rmodberita['kutipan']))
	$rmodberita['kutipan'] = '';

$metadesc = strip_tags($rmodberita['kutipan']);

$oleh = $dbh->prepare("SELECT `nama` FROM `".$namadepan."syspemakai` WHERE `id` = '$rmodberita[whoentri]'");
$oleh->execute();
$oleh->setFetchMode(PDO::FETCH_ASSOC);
$roleh = $oleh->fetch();
if(!isset($rmodberita['whenentri']))
	$rmodberita['whenentri'] = '';
$oleh = $roleh[nama];
$waktu = $rmodberita[tanggal]." ".namabulan($rmodberita[bulan])." ".$rmodberita[tahun]." ".$rmodberita[waktu]." "._WIB_;
$isibloknyo .= '<article class="blog-post blog-post-detail tg-haslayout">
								
								
							</article>';


					if(empty($rmodberita[file]))
$file = "";
else
$file = '

									<img src="'.$pathurl.'/userfiles/images/'.$rmodberita[file].'" alt="'.$judul.'">
								


';
$sumber = $rmodberita[sumber];
if (empty($rmodberita[tempat]))
$tempat = "";
else
$tempat = "<b>$rmodberita[tempat] - </b>";
$kutipan = $rmodberita[kutipan];
$isi =  $rmodberita[isi];

}
else
header("Location: ".$pathurl."/kajian");
}
else
{

// paging mulai
$PAGE_DEFAULT = 1;
$PAGESIZE_DEFAULT = 9;
$PAGESIZE_LOWER_LIMIT = 9;
$PAGESIZE_UPPER_LIMIT = 100;
$page = $_GET[hal];
if (!isset($page)) $page = $PAGE_DEFAULT;
if ($page < 1 ) $page = 1;
if (!isset($pagesize)) $pagesize = $PAGESIZE_DEFAULT;
if ($pagesize < $PAGESIZE_LOWER_LIMIT)
$pagesize = $PAGESIZE_LOWER_LIMIT;
if ($pagesize > $PAGESIZE_UPPER_LIMIT)
$pagesize = $PAGESIZE_UPPER_LIMIT;

$sth = $dbh->prepare("SELECT count(`b`.`id`) FROM `".$namadepan."berita` `b`  WHERE `b`.`published` = 'y'");
$sth->execute();
$sth->setFetchMode(PDO::FETCH_ASSOC);
list($total_rows) = $sth->fetch();

$count = $pagesize;
$offset = ($page-1) * $pagesize;
$last_page      = ceil($total_rows/$pagesize);
if ($_GET[hal] > $last_page){
$page = $last_page;
$offset = ($page-1) * $pagesize;
}

$adjacent_pages_links = ($page > 6 ? "<li><a href=\"".$pathurl."/kajian/halaman/1\">1</a></li><li> <a>...</a> </li>" : "");
for ($i=$page-5; $i<$page; $i++) {
if ($i < 1) continue;
$adjacent_pages_links .= " ".
"<li><a href=\"".$pathurl."/kajian/halaman/$i\">$i</a></li>";
}
$adjacent_pages_links .= "<li class=\"active\"><a>$page</a></li>";
for ($i=$page+1; $i<($page+6); $i++) {
if ($i > $last_page) break;
$adjacent_pages_links .= " ".
"<li><a href=\"".$pathurl."/kajian/halaman/$i\">$i</a></li>";
}
$adjacent_pages_links .= ($page+5 < $last_page ? "<li> <a>...</a> </li><li><a href=\"".$pathurl."/kajian/$last_page\">$last_page</a></li>" : "");
$navigasi = '<ul class="pagination blog-pagination align-items-center justify-content-center mb-55" data-animate="fadeInUp" data-delay=".1">' .
($page == 1 ? "" : "<li><a href=\"".$pathurl."/kajian/halaman/1\"><<</a></li>").
($page == 1 ? "" : "<li><a href=\"".$pathurl."/kajian/halaman/".($page-1)."\"><</a></li>").
"<li>$adjacent_pages_links</li>".($page == $last_page ? "" : "<li><a href=\"".$pathurl."/kajian/halaman/".($page+1)."\">></a></li>").
($page == $last_page ? "" : "<li><a href=\"".$pathurl."/kajian/halaman/$last_page\">>></a></li>")."</ul>";
		

$modberita = $dbh->prepare("SELECT `b`.`id`, `b`.`file`,`b`.`tanggal`, `b`.`judul`, `b`.`whenentri`, `b`.`kutipan` FROM `".$namadepan."berita` `b`  WHERE `b`.`published` = 'y' ORDER BY `tanggal`   DESC LIMIT $offset,$count");
$modberita->execute();
$modberita->setFetchMode(PDO::FETCH_ASSOC);
$modberitalengkap = $dbh->prepare("SELECT `b`.`id` FROM `".$namadepan."berita` `b` WHERE `b`.`published` = 'y'");
$modberitalengkap->execute();
$modberitalengkap->setFetchMode(PDO::FETCH_ASSOC);
$totalberita = $modberitalengkap->rowCount();

$isibloknyo .= '';
	
if ($modberita->rowCount() > 0)
{
$urut = 1;
while($rmodberita = $modberita->fetch())
{
$judulberita = $rmodberita['judul'];

$kutipan = $rmodberita['kutipan'];
$tanggal = "<b>".substr($rmodberita['tanggal'],8,2)."</b> ".namabulansingkat(substr($rmodberita['tanggal'],5,2))."<b>".substr($rmodberita['tanggal'],0,4)."</b> ";
$id = $rmodberita['id'];
$judulid = $judulberita;
$gambarkecik = $rmodberita['file'];
if (empty($gambarkecik) || !file_exists("userfiles/images/$rmodberita[file]"))
	$gambarkecik = $pathurl."/images/berita.jpg";
else
	$gambarkecik = $pathurl."/userfiles/images/$rmodberita[file]";

$isibloknyo .= '<div class="tg-post">
									<div class="tg-post-img">
										<figure>
											<a href="'.$pathurl.'/kajian/'.$id.'/'.sanitize_title_with_dashes($judulid).'">
												<img src="'.$gambarkecik.'" alt="image description">
											</a>
										</figure>
										
									</div>
									<div class="tg-post-content tg-border-topleft">
										<h3><a href="'.$pathurl.'/kajian/'.$id.'/'.sanitize_title_with_dashes($judulid).'">'.$judulberita.'</a></h3>
										<div class="tg-post-meta">
											<span>'.$tanggal.'</span>
											</div>
										
									</div>
								</div>


';



$urut++;
}
//if ($last_page > 1)
//$isibloknyo .= _HALAMANPG_." $page "._DARIPG_." $last_page";

}
else
{
$isibloknyo .= "<p class=\"more-btn-holder\">Belum ada Informasi Promo MyRepublic Indonesia</p>\n";
}

$isibloknyo .= '</div>';
						if ($total_rows > $PAGESIZE_LOWER_LIMIT)
$isibloknyo .= $navigasi;

                      /*  <ul class="pagination blog-pagination align-items-center justify-content-center mb-55" data-animate="fadeInUp" data-delay=".1">
                            <li><a href="#"><img src="img/icons/left-arrow.svg" alt="" class="svg"></a></li>
                            <li class="active"><a href="#">01</a></li>
                            <li><a href="#">02</a></li>
                            <li><a href="#">03</a></li>
                            <li><a href="#">04</a></li>
                            <li><a href="#">05</a></li>
                            <li><a href="#"><img src="img/icons/right-arrow.svg" alt="" class="svg"></a></li>
                        </ul> */
                    $isibloknyo .= '</div>
                </div>
                
                
                <!-- End of Sidebar -->
            </div>
        </div>
    </section>';
}
?>
