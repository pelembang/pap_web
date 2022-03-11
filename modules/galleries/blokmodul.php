<?php
defined('_JCMS_') or header('Location: ../../');
global $namadepan, $languange, $koneksi_db, $urlfotogalerikecik, $urlfotogaleri, $judulsubmodul, $pathurl, $dbh;
$namamodul = basename(dirname(__FILE__));
if (isset($_GET['fid']))
{
$queryfid = " and g.id = '$_GET[fid]' ";

$urlgaleri = $pathurl."/galeri-foto/".$_GET[fid]."/halaman/";

}
else
{
	$queryfid = "";
$urlgaleri = $pathurl."/galeri-foto/halaman/";	
}
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




$countberita = $dbh->prepare("select count(id) from ".$namadepan."fotogaleri g  where published = 'y' $queryfid");
$countberita->execute();
$countberita->setFetchMode(PDO::FETCH_ASSOC);
list($total_rows) = $countberita->fetch();

$count = $pagesize;
$offset = ($page-1) * $pagesize;
$last_page      = ceil($total_rows/$pagesize);
if ($_GET[hal] > $last_page){
$page = $last_page;
$offset = ($page-1) * $pagesize;
}

$adjacent_pages_links = ($page > 6 ? "<li><a href=\"".$urlgaleri."1\">1</a></li><li> <a>...</a> </li>" : "");
for ($i=$page-5; $i<$page; $i++) {
if ($i < 1) continue;
$adjacent_pages_links .= " ".
"<li><a href=\"".$urlgaleri."$i\">$i</a></li>";
}
$adjacent_pages_links .= "<li class=\"m-active\"><a>$page</a></li>";
for ($i=$page+1; $i<($page+6); $i++) {
if ($i > $last_page) break;
$adjacent_pages_links .= " ".
"<li><a href=\"".$urlgaleri."$i\">$i</a></li>";
}
$adjacent_pages_links .= ($page+5 < $last_page ? "<li> <a>...</a> </li><li><a href=\"".$pathurl."/galeri-foto/$last_page\">$last_page</a></li>" : "");
$navigasi = "<div><ul class=\"pagination\">" .
($page == 1 ? "" : "<li><a href=\"".$urlgaleri."1\"><<</a></li>").
($page == 1 ? "" : "<li><a href=\"".$urlgaleri."".($page-1)."\"><</a></li>").
"<li>$adjacent_pages_links</li>".($page == $last_page ? "" : "<li><a href=\"".$urlgaleri."".($page+1)."\">></a></li>").
($page == $last_page ? "" : "<li><a href=\"".$urlgaleri."$last_page\">>></a></li>")."</ul></div>";

$galeri = $dbh->prepare("SELECT `g`.`id`, `g`.`judul`, `g`.`ket`,`g`.`whoentri`,substr(`g`.`whenentri`,1,4) tahun, substr(`g`.`whenentri`,6,2) bulan,  substr(`g`.`whenentri`,9,2) tanggal FROM `".$namadepan."fotogaleri` g WHERE  `g`.`published` = 'y' $queryfid ORDER BY `g`.`ordering` ASC LIMIT $offset,$count");
$galeri->execute();
$galeri->setFetchMode(PDO::FETCH_ASSOC);

if ($galeri->rowCount() > 0)
{
	

if (isset($_GET['fid']))
{
	$rgaleri = $galeri->fetch();
	$urlgaleri = $pathurl."/galeri-foto/".$rgaleri[id]."/".sanitize_title_with_dashes($rgaleri[judul])."/halaman/";
// paging mulai
$PAGE_DEFAULT = 1;
$PAGESIZE_DEFAULT = 9;
$PAGESIZE_LOWER_LIMIT = 9;
$PAGESIZE_UPPER_LIMIT = 100;
$page = $_GET[half];
if (!isset($page)) $page = $PAGE_DEFAULT;
if ($page < 1 ) $page = 1;
if (!isset($pagesize)) $pagesize = $PAGESIZE_DEFAULT;
if ($pagesize < $PAGESIZE_LOWER_LIMIT)
$pagesize = $PAGESIZE_LOWER_LIMIT;
if ($pagesize > $PAGESIZE_UPPER_LIMIT)
$pagesize = $PAGESIZE_UPPER_LIMIT;

$countberita = $dbh->prepare("select count(id) from ".$namadepan."foto where galeri = '$_GET[fid]'");
$countberita->execute();
$countberita->setFetchMode(PDO::FETCH_ASSOC);


list($total_rows) = $countberita->fetch();

$count = $pagesize;
$offset = ($page-1) * $pagesize;
$last_page      = ceil($total_rows/$pagesize);
if ($_GET[half] > $last_page){
$page = $last_page;
$offset = ($page-1) * $pagesize;
}

$adjacent_pages_links = ($page > 6 ? "<li><a href=\"".$urlgaleri."1\">1</a></li><li> <a>...</a> </li>" : "");
for ($i=$page-5; $i<$page; $i++) {
if ($i < 1) continue;
$adjacent_pages_links .= " ".
"<li><a href=\"".$urlgaleri."$i\">$i</a></li>";
}
$adjacent_pages_links .= "<li class=\"m-active\"><a>$page</a></li>";
for ($i=$page+1; $i<($page+6); $i++) {
if ($i > $last_page) break;
$adjacent_pages_links .= " ".
"<li><a href=\"".$urlgaleri."$i\">$i</a></li>";
}
$adjacent_pages_links .= ($page+5 < $last_page ? "<li> <a>...</a> </li><li><a href=\"".$pathurl."/galeri_foto/$last_page\">$last_page</a></li>" : "");
$navigasi = "<div><ul class=\"pagination\">" .
($page == 1 ? "" : "<li><a href=\"".$urlgaleri."1\"><<</a></li>").
($page == 1 ? "" : "<li><a href=\"".$urlgaleri."".($page-1)."\"><</a></li>").
"<li>$adjacent_pages_links</li>".($page == $last_page ? "" : "<li><a href=\"".$urlgaleri."".($page+1)."\">></a></li>").
($page == $last_page ? "" : "<li><a href=\"".$urlgaleri."$last_page\">>></a></li>")."</ul></div>";


$foto = $dbh->prepare("SELECT `".$namadepan."foto`.`id`,  `".$namadepan."foto`.`ket`, `".$namadepan."foto`.`file`, `".$namadepan."fotogaleri`.`judul` FROM `".$namadepan."foto`,`".$namadepan."fotogaleri` WHERE `".$namadepan."foto`.`galeri` = `".$namadepan."fotogaleri`.`id` and `".$namadepan."foto`.`galeri` = '$_GET[fid]' ORDER BY `".$namadepan."foto`.`whenentri` ASC LIMIT $offset,$count");
$foto->execute();
$foto->setFetchMode(PDO::FETCH_ASSOC);
$isibloknyo .= '<section id="news">
 <div class="container">
                <div class="row">
                    <!-- Main Title -->
                    
                </div>
                <div class="row">
				
				';	
                            
                               
if ($foto->rowCount() > 0)
{


$oleh = $dbh->prepare("SELECT `nama` FROM `".$namadepan."syspemakai` WHERE `id` = '$rgaleri[whoentri]'");
$oleh->execute();
$oleh->setFetchMode(PDO::FETCH_ASSOC);
$roleh = $oleh->fetch();

while($rfoto = $foto->fetch())
{
if(file_exists("userfiles/images/$rfoto[file]"))
	$fotonyo = $pathurl."/userfiles/images/$rfoto[file]";
else
	$fotonyo = $pathurl."/images/galerifoto.jpg";

$isibloknyo .= '
									
									<div class="col-xs-12 col-md-4 col-sm-6">
                        <div class="blog-post">
                            <div class="crop">
                                
								<a href="#" title="'.$rfoto[ket].'" class="popupgaleri" data-keterangan=""><img src="'.$fotonyo.'" title="'.$rfoto[ket].'" alt="'.$rfoto[ket].'" class="img-responsive"></a>
                            </div>
                            <div class="content-box">
                                
                                <div class="post-inner">';
							
								
								$jum = $dbh->prepare("select count(id) jumlah from ".$namadepan."foto where galeri = '$rgaleri[id]'");	
                            	$jum->execute();
								$jum->setFetchMode(PDO::FETCH_ASSOC);
								$jl = $jum->fetch();
								$isibloknyo .=	'
								
								
                                    
                                    <h5>'.$rfoto[ket].'</h5>
                                    
                                </div>
                            </div>
                        </div>
                    </div>';

                                                        	
}


}
else
{
$isibloknyo .= "<p align=\"center\"><b>Foto belum ada.</b></p>\n";
}
$isibloknyo .= '	<div class="tags-social tg-haslayout">
								<div class="tags pull-left">
									
									<ul class="tg-tags">
										<li><a href="'.$pathurl.'/galeri-foto">Kembali</a></li>
										
									</ul>
								</div>
								
							</div>
					
					';

if ($last_page > 1)
$isibloknyo .= _HALAMANPG_." $page "._DARIPG_." $last_page";
						if ($total_rows > $PAGESIZE_LOWER_LIMIT)
$isibloknyo .= $navigasi;
$isibloknyo .= '</div>
                    </div>
                </div>
            </div>
        </section>';	
}
else
{
$isibloknyo .= '<section id="news">
 <div class="container">
                <div class="row">
                    <!-- Main Title -->
                    
                </div>
                <div class="row">
				
				 ';	



while($rgaleri = $galeri->fetch())
{

$filefoto = $dbh->prepare("select `file` from ".$namadepan."foto where galeri = '$rgaleri[id]' order by rand()");
$filefoto->execute();
$filefoto->setFetchMode(PDO::FETCH_ASSOC);


$fifot = $filefoto->fetch();


if(file_exists("userfiles/images/$fifot[file]"))
	$filethumb = $pathurl."/userfiles/images/$fifot[file]";
else
	$filethumb = $pathurl."/images/galerifoto.jpg";
//}
$isibloknyo .= '
									
									<div class="col-xs-12 col-md-4 col-sm-6">
                        <div class="blog-post">
                            <div class="crop">
                                
								<a href="'.$pathurl.'/galeri-foto/'.$rgaleri[id].'/'.sanitize_title_with_dashes($rgaleri[judul]).'" title="'.$rgaleri[judul].'"><img src="'.$filethumb.'" alt="'.$rgaleri[judul].'" class="img-responsive"></a>
                            </div>
                            <div class="content-box">
                                
                                <div class="post-inner">';
								
								
								$jum = $dbh->prepare("select count(id) jumlah from ".$namadepan."foto where galeri = '$rgaleri[id]'");	
                            	$jum->execute();
								$jum->setFetchMode(PDO::FETCH_ASSOC);
								$jl = $jum->fetch();
								$isibloknyo .=	'
								
								
                                    <h3>'.$rgaleri[judul].' ('.$jl[jumlah].')</h3>
                                    <h5>'.$rgaleri[ket].'</h5>
                                    
                                </div>
                            </div>
                        </div>
                    </div>';
					
			
								
                                    	
                                    	
                


}

$isibloknyo .= '</div>
                    
                ';
				
				if ($last_page > 1)
$isibloknyo .= _HALAMANPG_." $page "._DARIPG_." $last_page";
						if ($total_rows > $PAGESIZE_LOWER_LIMIT)
$isibloknyo .= $navigasi;
            
			
        $isibloknyo .= '</div></div></div></section>';	

	

}
$isibloknyo .= '                
                                </div>';



}
else
{
	
$isibloknyo .= "<p align=\"center\"><b>"._ERRORGAL_."</b></p>\n";
}
?>
